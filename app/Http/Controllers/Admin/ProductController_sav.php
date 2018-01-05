<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\ProductRequest;
use App\Interfaces\BrandRepositoryInterface;
use App\Interfaces\CategoryRepositoryInterface;
use App\Interfaces\LanguageInterface;
use App\Interfaces\ProductRepositoryInterface;
use App\Interfaces\TagRepositoryInterface;
use App\Libraries\AmazonSearch;
use App\Libraries\CommissionJunction;
use App\Models\AffiliateProduct;
use App\Models\Brand;
use App\Product;
use App\ProductImage;
use App\Repositories\AttributeSetRepository;
use App\Service\UploadService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rules\In;
use Yajra\Datatables\Facades\Datatables;

class ProductController extends Controller
{
	protected $product_repository;
	protected $category_repository;
	protected $upload_service;
	protected $attribute_set_repository;
	protected $language_repository;
	protected $brand_repository;
	protected $commission_junction;
	protected $amazon_search;
	protected $tag_repository;
	const CACHE_TIME_FOR_PRODUCT = 1440;

	public function __construct(ProductRepositoryInterface $product_repo, CategoryRepositoryInterface $category_repo,
								UploadService $uploadservice,AttributeSetRepository $attribute_set_repo,
	LanguageInterface $language,
								BrandRepositoryInterface $brand_repo,
								CommissionJunction $commission_junction,
	AmazonSearch $amazon_search,
	TagRepositoryInterface $tag_repo
)
	{
		$this->product_repository = $product_repo;
		$this->category_repository = $category_repo;
		$this->upload_service = $uploadservice;
		$this->attribute_set_repository = $attribute_set_repo;
		$this->language_repository = $language;
		$this->brand_repository = $brand_repo;
		$this->commission_junction = $commission_junction;
		$this->amazon_search = $amazon_search;
		$this->tag_repository = $tag_repo;
	}

	public function index()
	{
		return view('admin.product.list');
	}

	public function getData()
	{
		$data_tables = Datatables::collection($this->product_repository->getAll());

		$data_tables->EditColumn('product_name', function ($product) {
			return  $product->english->product_name;
		})->EditColumn('serial_number', function ($product) {
			return $product->sku;
		})->EditColumn('original_price', function ($product) {
			return format_price($product->original_price);
		})->EditColumn('best_price', function ($product) {
			return format_price($product->best_price);
		})->EditColumn('created_by', function ($product) {
			return (count($product->admin) > 0) ? $product->admin->first_name.' '.$product->admin->last_name: '';
		})->EditColumn('status', function ($product) {
			return ($product->is_active=='1') ? '<span class="badge bg-green">Active</span>': '<span class="badge bg-light-blue">Inactive</span>';
		})->EditColumn('action', function ($product) {
			return view("admin.product.action", ['product' => $product]);
		});
		return $data_tables->rawColumns(['status','action'])->make(true);
	}

	public function attributes(Request $request)
	{
		$attribute_set_id = $request->get('attribute_set_id');
		$product_id = $request->get('product_id');
		$attribute_set = $this->product_repository->getAttributesBySetId($attribute_set_id);
		if($product_id > 0){
			$product_attributes = $this->product_repository->getAttributesByProductId($product_id);
		}else{
			$product_attributes = [];
		}
		return view('admin.product.attributes',compact('attribute_set','product_attributes'));
	}

	public function create()
	{
		Session::forget('product_images');
		$categories = $this->category_repository->getTreeData();
		$attribute_sets = $this->attribute_set_repository->getAll();
		$product = false;
		$images = [];
		$brands = $this->brand_repository->lists();
		$tags = $this->tag_repository->getAll();
		return view('admin.product.form', compact('categories', 'product','images','attribute_sets','brands','tags'));
	}

	public function store(ProductRequest $product_request)
	{
		$product = $this->product_repository->save($product_request->all());
		if ($product_request->get('searchproduct')) {
			$this->saveAffiliateProduct($product->product_id, $product_request->all());
		}
		$this->product_repository->updateBestPrice($product->product_id);
		flash()->success(config('message.product.add-success'));
//		return redirect()->route('product');
		$product->load('url');
		return response()->json($product);

	}

	public function ImageUpload($name){
		$image_name = "";
		if (Input::File($name)) {
			$file = Input::file($name);
			try{
				$image_name = $this->upload_service->upload($file, 'upload/affiliate');
			}catch(Exception $e){
				flash()->error($e->getMessage());
				return Redirect::back();
			}

		}
		return $image_name;
	}

	public function deleteAffiliateProduct($affiliate_product)
	{
		return AffiliateProduct::whereIn('affiliate_product_id', $affiliate_product)->delete();
	}

	public function edit($product_id)
	{
		Session::forget('product_images');
		$product = $this->product_repository->getById($product_id);
		$categories = $this->category_repository->getTreeData();
		$attribute_sets = $this->attribute_set_repository->getAll();
		$product_videos=$this->product_repository->getProductVideo($product_id);
		$images = [];
		if (count($product->images) > 0) {
			foreach ($product->images as $index => $image) {
				$images[$index]['name'] = $image->image_name;
				$images[$index]['size'] = file_exists(Product::PRODUCT_IMAGE_PATH . $image->image_name) ? filesize(Product::PRODUCT_IMAGE_PATH . $image->image_name):'';
			}
		}
		$brands = $this->brand_repository->lists();
		$affiliate_product=AffiliateProduct::where('product_id',$product_id)->get();
		$tags = $this->tag_repository->getAll();
		return view('admin.product.form', compact('product', 'categories', 'images','attribute_sets','product_videos','languages','brands','affiliate_product','tags'));
	}

	public function update($product_id, ProductRequest $product_request)
	{
		$product = $this->product_repository->updateById($product_id, $product_request->all());
		//update affiliate product
		if ($product_request->get('searchproduct')) {
			$this->saveAffiliateProduct($product_id, $product_request->all());
		}
		$this->product_repository->updateBestPrice($product_id);
		flash()->success(config('message.product.update-success'));
//		return redirect()->route('product');
		$product->load('url');
		return response()->json($product);
	}

	public function saveAffiliateProduct($product_id, $input)
	{
		$affiliate_product = $input['searchproduct'];
		$unselected_affiliate = [];
		foreach ($affiliate_product as $index => $product) {
			$affiliate = New AffiliateProduct();
			if (isset($product['select']) && $product['select'] == 1 && empty($product['affiliate_product_id'])) {

				$affiliate->product_id = $product_id;
				$affiliate->product_name = $product['name'];
				$affiliate->product_description = $product['description'];
				if(strpos($product['price'],"CDN$")!==false){
					$affiliate->price = str_replace(',','',str_replace('CDN$', "", $product['price']));
				} else{
					$affiliate->price = str_replace(',','',str_replace('$', "", $product['price']));
				}
				$affiliate->product_url = $product['url'];
				$affiliate->product_image = $product['product_image'];
				$affiliate->advertiser_name = $product['advertiser_name'];
				$affiliate->save();
			}
			if (!empty($product['affiliate_product_id']) && !isset($product['select'])) {
				$unselected_affiliate[] = $product['affiliate_product_id'];
			}
			}

		$this->deleteAffiliateProduct($unselected_affiliate);
		}

	public function uploadImage(Request $request)
	{
		$product_images = Session::has('product_images') ? Session::get('product_images') : [];
		$image_name = "";
		if ($request->hasFile('file')) {
			$file = $request->file('file');
			$image_name = $this->upload_service->upload($file, Product::PRODUCT_IMAGE_PATH,false);
		}
		$img = \Image::make(public_path().'/'.Product::PRODUCT_IMAGE_PATH.$image_name);
		$img->heighten(675)->save(Product::PRODUCT_IMAGE_PATH.$image_name);
		$thumb_path = public_path(Product::PRODUCT_IMAGE_PATH.'thumb');
		if(!\File::isDirectory($thumb_path)){
			\File::makeDirectory($thumb_path);
		}
		$img->fit(130,145)->save($thumb_path.'/'.$image_name);

		$product_images[] = $image_name;
		Session::put('product_images', $product_images);
		return response()->json(['success' => true, 'image_name' => $image_name]);
	}

	public function removeImage(Request $request)
	{
		$product_images = Session::pull('product_images', []);
		$product_image_id = $request->get('product_image_id');
		if(!empty($product_image_id)){
			ProductImage::destroy($product_image_id);
		}
		if (($key = array_search($request->get('image_name'), $product_images)) !== false) {
			unset($product_images[$key]);
		}
		return response()->json(['success' => true]);
	}

	public function destroy($product_id)
	{
		if ($this->product_repository->deleteById($product_id)) {
			flash()->success(config('message.product.delete-success'));
		} else {
			flash()->error(config('message.product.delete-error'));
		}
		return redirect()->route('product');
	}

	public function searchProduct(Request $request)
	{
		$keyword = $request->get('keyword');
		$products = [];
		$sort_by = \Cache::get('sort_by');
		if (\Cache::has('product_search_' . $keyword)) {
			$products = \Cache::get('product_search_' . $keyword);
		} else {
			$returnXML = $this->commission_junction->get($keyword);
			$results = $this->amazon_search->get($keyword);
			if (!empty($results['Items']['Item'])) {
				if(!empty($results['Items']['TotalResults']) && $results['Items']['TotalResults']=='1'){
					$items = array($results['Items']['Item']);
				} else {
					$items = $results['Items']['Item'];
				}
				foreach ($items as $key => $result) {
					$description = '';
					if (isset($result['ItemAttributes']['Feature']) && is_array($result['ItemAttributes']['Feature'])) {
						foreach ($result['ItemAttributes']['Feature'] as $feature) {
							$description .= $feature;
						}
					} else {
						$description .= (!empty($result['ItemAttributes']['Feature'])) ? $result['ItemAttributes']['Feature'] : '';
					}
					$products[$key]['name'] = !empty($result['ItemAttributes']['Title'])?$result['ItemAttributes']['Title'] : '';
					$products[$key]['sort_order'] = $key;
					$products[$key]['description'] = $description;
					$products[$key]['price'] = getProductPrice($result);;
					$products[$key]['sort_price'] = trim(str_replace('CDN$', '', $products[$key]['price']));
					$products[$key]['DetailPageURL'] = $result['DetailPageURL'];
					$products[$key]['image_url'] = (!empty($result['MediumImage']['URL'])) ? $result['MediumImage']['URL'] : '';
					$products[$key]['advertiser_name'] = 'amazon.ca';
				}
			}
			$index = (count($products) > 0) ? count($products) - 1 : 0;
			if (!empty($returnXML['products']['product'])) {
				foreach ($returnXML['products']['product'] as $key => $product) {
					$products[$index]['image_url'] = (!empty($product['image-url'])) ? $product['image-url'] : '';
					$products[$index]['DetailPageURL'] = $product['buy-url'];
					$products[$index]['description'] = $product['description'];
					$products[$index]['price'] = format_price($product['price']);
					$products[$index]['sort_price'] = $product['price'];
					$products[$index]['name'] = $product['name'];
					$products[$index]['advertiser_name'] = $product['advertiser-name'];
					$index++;
				}
			}
			\Cache::put('product_search_' . $keyword, $products, self::CACHE_TIME_FOR_PRODUCT);
		}

		return view('admin.product.search')->with('products', $products);
	}

	public function removeTag(Request $request)
	{
		$tag_id = $request->get('tag');
		$status = $this->tag_repository->removeById($tag_id);
		return response()->json($status);
	}
}