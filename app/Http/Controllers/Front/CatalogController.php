<?php
namespace App\Http\Controllers\Front;

use App\AttributeOption;
use App\Interfaces\CategoryRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Interfaces\ProductRepositoryInterface;
use App\Interfaces\StoreRepositoryInterface;
use App\Category;
use App\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;

class CatalogController extends Controller
{
    //
    protected $category_repository;
    protected $q = '';

    public function __construct(CategoryRepositoryInterface $category_repository, ProductRepositoryInterface $product_repository, StoreRepositoryInterface $store_repo)
    {
        $this->category_repository = $category_repository;
        $this->product_repository = $product_repository;
        $this->store_repository = $store_repo;
    }

    public function index($category_id)
    {
        $category = $this->category_repository->getById($category_id);
        $category_id=(Input::has('category'))?Input::get('category'):$category_id;

        $select_visualisation = (Input::has('vp'))?Input::get('vp'):'news';
        $products = $this->product_repository->getByCategory($category_id,Input::all(), 48, $select_visualisation);
        $all_products = $this->product_repository->getByCategory($category_id,[], 48, $select_visualisation);
        $categories = $this->category_repository->getTreeData();
        $product_tags = $product_brands = [];
        $product_ids = [];

        foreach ($all_products as $product) {
            $product_ids[] = $product->product_id;
            if (count($product->tags) > 0) {
                foreach ($product->tags as $tag) {
                    $product_tags[$tag->tag_id] = $tag->tag;
                }
            }
            if (count($product->brand) > 0) {
                $brand_id = $product->brand->parent_id==null ? $product->brand->brand_id : $product->brand->parent->brand_id;
                $product_brands[$brand_id] = (!empty($product->brand->parent->brand_name)) ? $product->brand->parent->brand_name : $product->brand->brand_name;
            }
        }
        $attribute['color'] = $attribute['size'] = [];
        $attributes = $this->product_repository->getAttributeByProducts($product_ids);
        $attribute = $this->getAttribute($attributes);
        $title_name=(app('language')->language_code=='en')?'english_':'french_';
        return view('front.catalog.index', compact('products', 'category', 'category_id', 'product_brands', 'product_tags', 'categories','title_name'))->with('colors', (!empty($attribute['color']))?$attribute['color']:[])->with('sizes', (!empty($attribute['size']))?$attribute['size']:[]);
    }


    public function search(Request $request)     
    {
        $language_id=app('language')->language_id;

        $product_ids = [];
        $products = [];
        $all_products = [];
        $category_id = Input::get('category');                      
        $brand_ids = [];

        if(Cookie::has('zip_code') || Cookie::has('distance')){
            $zip_code = Cookie::get('zip_code');
            $zip_code = str_replace(' ', '+', $zip_code);
            $zip_code = str_replace('%', '+', $zip_code);
            $requested_distance = intval(Cookie::get('distance'));
            $responses = [];
            $stores = $this->store_repository->getAll();

            foreach ($stores as $store) {
                $responses[] = $store->store_name;

                $address1 = str_replace(' ', '+', $store->address1);
                $address2 = str_replace(' ', '+', $store->address2);
                $city = str_replace(' ', '+', $store->city);
                $country_name = str_replace(' ', '+', $store->country->name);
                $zip = $store->sip;
                $files = 'https://maps.googleapis.com/maps/api/distancematrix/json?units=imperial&origins='.$zip_code.'&destinations='.$address1.','.$city.','.$zip.'&sensor=false';

                $result = file_get_contents($files);
                $output = json_decode($result, true);
                if($output['status'] != "INVALID_REQUEST"){
                    if($output['rows'][0]['elements'][0]['status'] != "NOT_FOUND"){

                        $distances = $output['rows'][0]['elements'][0]['distance']['text'];
                        $distances = str_replace(',', '', $distances);
                        $distance = intval($distances);

                        if($distance < $requested_distance){
                           foreach ($store->brands as $brand) {
                              $brand_ids[] = (string) $brand->brand_id;
                           }

                        }

                    }
                }
            }

            $brands_param = [];

            If(Input::has('brand'))
                $brands_param = explode(',', Input::get('brand'));
            else
                $brands_param = $brand_ids;

            Input::merge(['brand_store' => implode(',', $brands_param)]);

            $products = $this->product_repository->getByCategory(Input::all());
            $all_products = $this->product_repository->getProductByCategory(Input::all());
        }else{
                
            $products = $this->product_repository->getByCategory(Input::all());
            $all_products = $this->product_repository->getProductByCategory(Input::all());
        }
        $products->appends(\Input::except('q'))->render();
        $categories = $this->category_repository->getTreeData();
        $product_tags = $product_brands = [];
        $products_name = [];

        foreach ($all_products as $product) {
            $product_ids[] = $product->product_id;
            $products_name[] = $product->sku;
            if (count($product->tags) > 0) {
                 foreach ($product->tags as $tag) {
                    $product_tags[$tag->tag_id] = $tag->tag;
                }
            }
            if (count($product->brand) > 0) {
                 $brand_id = $product->brand->parent_id==null ? $product->brand->brand_id : $product->brand->parent->brand_id;
                $product_brands[$brand_id] = ($product->brand->parent_id==null) ? $product->brand->brand_name : $product->brand->parent->brand_name;
            }
        }

        $attributes['color'] = $attribute['size'] = [];

        $attributes = $this->product_repository->getAttributeByProducts(array_unique($product_ids));
        $attribute = $this->getAttribute($attributes);
        $title_name=(app('language')->language_code=='en')?'english_':'french_';
        return view('front.catalog.search', compact('products', 'category_id', 'product_brands', 'product_tags', 'categories','title_name'))->with('colors', (!empty($attribute['color'])) ? $attribute['color'] : [])->with('sizes', (!empty($attribute['size'])) ? $attribute['size'] : [])->withCookie(cookie('coupon', "je suis la cookie", 3600));
    }

    public function getAttribute($attributes)
    {
        $attribute_options = [];
        foreach ($attributes as $attribute) {
            $options = $attribute->option->getByLanguageid(app('language')->language_id);
            if(empty($options)){
                continue;
            }
            if ($attribute->attribute->type == AttributeOption::COLOR) {
                $attribute_options['color'][$attribute->attribute_option_id] = ['name' => $options->option_name, 'color_code' => $attribute->option->swatch()];
            }
            if ($attribute->attribute->type == AttributeOption::SIZE) {
                $attribute_options['size'][$attribute->attribute_id]['name'] = $attribute->attribute->getByLanguageid(app('language')->language_id)->attribute_name;
                $attribute_options['size'][$attribute->attribute_id]['options'][$attribute->attribute_option_id] = $attribute->option->getByLanguageid(app('language')->language_id)->attribute_translation_num."/§/".$attribute->option->getByLanguageid(app('language')->language_id)->option_name;
            }
        }
        //dd($attribute_options);
        return $attribute_options;
    }

    public function addInfoCookie(Request $request)
    {
        $num_of_minutes = 60 * 24 * 7 * 4 * 6; // one week
        $zip = Input::get('zip_code');
        $distance = Input::get('distance');
        Cookie::queue(Cookie::make('zip_code', $zip, $num_of_minutes));
        Cookie::queue(Cookie::make('distance', $distance, $num_of_minutes));
        return response()->json(['test' => "value"]);
    }

    //------------- save latest category selected in session
    public function saveLatestCategory(Request $request)
    {
        $category = Input::get('selected_category');
        Session::put('selected_category', $category);
        return response()->json(['success', true]);
    }

}
