<?php

namespace App\Http\Controllers\Front;

use App\Interfaces\OrderRepositoryInterface;
use App\Order\Processor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class CheckoutController extends Controller
{
	protected $order_processor;
	protected $cart;
	protected $order_repository;
	public function __construct(Processor $processor,OrderRepositoryInterface $order_repo)
	{
		$this->order_processor = $processor;
		$this->cart = app('cart');
		$this->order_repository = $order_repo;
	}

	public function storeOrderInfo(Request $request)
	{
		$this->cart->setCustomer(Auth::user());
		try {
			$order = $this->order_processor->placeOrder($this->cart, $request->all());
			$this->cart->clear();
			return redirect("checkout/order-confirmed")->with('order_id',$order->order_id);
		} catch (OrderException $e) {
			dd($e->getMessage());
			flash()->error($e->getMessage());
			return redirect("cart");
		}
	}

	public function confirmOrder(Request $request)
	{
		$order_id = $request->session()->get('order_id');
		if(empty($order_id)){
			return redirect('/');
		}
		$order = $this->order_repository->byId($order_id);
		return view('front.cart.order_confirm',compact('order_id','order'));
	}
}
