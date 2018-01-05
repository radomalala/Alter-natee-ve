<?php
namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Interfaces\OrderItemRepositoryInterface;
use App\Interfaces\OrderRepositoryInterface;
use App\Interfaces\StoreRepositoryInterface;
use App\Interfaces\UserRepositoryInterface;
use App\Models\OrderItem;
use App\User;
use App\UserAddress;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Request;
use Input;

class CustomerController extends Controller
{

    protected $user_repository;
    protected $store_repository;
	protected $order_item_repository;

    public function __construct(UserRepositoryInterface $user_repository, OrderRepositoryInterface $order_repository, StoreRepositoryInterface $store_repository, OrderItemRepositoryInterface $order_item_repo)
    {
        $this->user_repository = $user_repository;
        $this->order_repository = $order_repository;
        $this->store_repository = $store_repository;
		$this->order_item_repository = $order_item_repo;
    }
    public function index(){
        $user_id = Auth::id();
        $customer = $this->user_repository->getById($user_id);
        return view('front.customer.index',compact('customer'));
    }

    public function completedOrders()
    {
        $user_id = Auth::id();
        $completed_orders = $this->order_repository->completedOrders($user_id);
        return view('front.customer.orders.completed',compact('completed_orders'));
    }

    public function onGoingOrders()
    {
        $user_id = Auth::id();
        $pending_orders = $this->order_repository->onGoingOrders($user_id);
        return view('front.customer.orders.pending',compact('pending_orders'));
    }

    public function postManageAccount(Request $request)
    {
        $user = Auth::user();
        $user->first_name=\Input::get('first_name');
        $user->last_name=\Input::get('last_name');
        $user->email=\Input::get('email');
		$user->phone_number = Input::get('phone');
		$user->radius = Input::get('radius');
        if ($user->save(User::$manage_account_rules)) {
        	if(Input::has('zip')){
				$user_address = ($user->address != null && count($user->address) > 0) ?  $user->address : new UserAddress();
				$user_address->first_name = Input::get('first_name');
				$user_address->last_name = Input::get('last_name');
				$user_address->phone = Input::get('phone');
				$user_address->zip = Input::get('zip');
				$user->address()->save($user_address);
			}
            \Session::flash('message.success', 'Account updated successfully.');
            return \Redirect::to("customer");
        } else {
            \Session::flash('message.arrayErrors', $user->errors()->all());
            return \Redirect::to('customer')->withInput($request->all());
        }
    }

    public function postResetPassword()
    {
        $user = Auth::user();
        $user->password=Hash::make(Input::get('password'));
        $user->save();
        \Session::flash('message.success', 'Password updated successfully.');
        flash()->success('Password updated successfully.');
        return \Redirect::to("customer");
    }

    public function getPendingOrders()
    {
        $users = User::find(Auth::id())->store()->get();
        $brands_id = [];
        foreach ($users->first()->brands as $brand) {
            if (!empty($brand->products)) {
                $brands_id[] = $brand->brand_id;
            }
        }
        $pending_orders = $this->order_repository->getOrders($brands_id);
        return view('front.customer.orders.pending', compact('pending_orders'));
    }




}