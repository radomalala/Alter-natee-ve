<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Interfaces\ProductRepositoryInterface;
use Illuminate\Support\Facades\Input;

class AutocompleteController extends Controller
{
    //
    protected $product_repository;

    public function __construct(ProductRepositoryInterface $product_interface)
    {
    	$this->product_repository = $product_interface;
    }

    public function productName(Request $request)
    {
    	
    	$product_json = array('product_name' => '', 'brand_name' => '', 'img' => '');
        $product_names = [];
        $all_product = [];

    	$categorie_id = Input::get('category');
        if($categorie_id != 0){
		   $all_product = $this->product_repository->getProductByCategory($categorie_id, []);
        }else{
           $all_product = $this->product_repository->getAll();
        }
		foreach ($all_product as $product) {
			$product_json['product_name'] = $product->getByLanguageId(app('language')->language_id)->product_name;
            $product_json['brand_name'] =  $product->brand['brand_name'];
            $product_json['img'] = 'upload/product/thumb/'.$product->images;
    	    $product_names[] = $product_json;
        }

		return response()->json($product_names);
    }
}
