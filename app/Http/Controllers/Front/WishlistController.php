<?php

namespace App\Http\Controllers\Front;

use App\Models\Wishlist;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WishlistController extends Controller
{
	protected $model;
    public function __construct(Wishlist $wishlist)
	{
		$this->model = $wishlist;
	}

	public function index()
	{
		$products = $this->model->where('user_id',\Auth::user()->user_id)->get();
		return view('front.wishlist.list',compact('products'));
	}

	public function store($id,Request $request)
	{
		$this->model->user_id = \Auth::user()->user_id;
		$this->model->product_id = $id;
		$this->model->save();
		flash()->success(trans('product.wishlist_success'));
		return redirect()->back();
	}

	public function remove($id)
	{
		$this->model->destroy($id);
		flash()->success(trans('product.wishlist_remove'));
		return redirect()->to('wishlist');
	}
}
