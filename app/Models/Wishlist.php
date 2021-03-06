<?php

namespace App\Models;

use App\Product;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
	/**
	 * @var string
	 */
	protected $table = 'wishlists';
	/**
	 * @var string
	 */
	protected $primaryKey = 'wishlist_id';

	public function product()
	{
		return $this->hasOne(Product::class,'product_id','product_id');
	}

	public function customer()
	{
		return $this->hasOne(User::class,'user_id','user_id');
	}
}
