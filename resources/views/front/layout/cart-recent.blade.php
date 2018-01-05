@if($cart_count > 0)
    <div class="cart-total text-right">
    <ul class="cart-menu">
        <li>
            
        <a href="#">
            <i class="fa fa-shopping-cart"></i>
        </a>
    
            <div class="shopping-cart">

                @foreach($recent_items as $item_id=>$item)
                <div class="cart-list">
                    <div class="cart-img">
                        <a href="#" title="{!! $item->getName() !!}"><img
                                    src="{!! URL::to('/').'/'.\App\Product::PRODUCT_IMAGE_PATH.$item->getImage() !!}"
                                    alt="{!! $item->getImageAlt() !!}"/></a>
                    </div>
                    <div class="cart-info">
                        <h4><a href="#">{!! $item->getName() !!}</a></h4>

                        <div class="cart-price">
                            <span>{!! $item->getQuantity() !!} x<span class="price">{!! format_price($item->getTotal()) !!}</span> </span>
                        </div>
                    </div>
                    <div class="pro-del">
                        <a href="{!! url("cart/remove/$item_id") !!}"><i class=" pe-7s-close-circle"></i></a>
                    </div>
                </div>
                @endforeach
                <div class="mini-cart-total">
                    <span>{!! trans('cart.subtotal') !!}</span>
                    <span class="total-price">{!! format_price($cart_total) !!}</span>
                </div>
                <div class="cart-button">
                    <a href="{!! URL::to('/') !!}/cart" title="Cart">{{trans("common/label.view_cart")}}</a>
                </div>
            </div>
        </li>
        <li><a href="#"><span class="product-number"><span class="sell">{!! $cart_count !!}</span> {!! trans('cart.items') !!} -</span></a></li>
        <li><a href="#"><span class="cart-count">{!! format_price($cart_total) !!}</span></a></li>
    </ul>
</div>

@else
<div class="cart-total text-right">
    <ul class="cart-menu">
        <li>
            <a href="#">
                <i class="fa fa-shopping-cart"></i>
            </a>
    
            <div class="shopping-cart">

                @foreach($recent_items as $item_id=>$item)
                <div class="cart-list">
                    <div class="cart-img">
                        <a href="#" title="{!! $item->getName() !!}"><img
                                    src="{!! URL::to('/').'/'.\App\Product::PRODUCT_IMAGE_PATH.$item->getImage() !!}"
                                    alt="{!! $item->getImageAlt() !!}"/></a>
                    </div>
                    <div class="cart-info">
                        <h4><a href="#">{!! $item->getName() !!}</a></h4>

                        <div class="cart-price">
                            <span>{!! $item->getQuantity() !!} x<span class="price">{!! format_price($item->getTotal()) !!}</span> </span>
                        </div>
                    </div>
                    <div class="pro-del">
                        <a href="{!! url("cart/remove/$item_id") !!}"><i class=" pe-7s-close-circle"></i></a>
                    </div>
                </div>
                @endforeach
                <div class="mini-cart-total">
                    <span>{!! trans('cart.subtotal') !!}</span>
                    <span class="total-price">{!! format_price($cart_total) !!}</span>
                </div>
                <div class="cart-button">
                    <a href="{!! URL::to('/') !!}/cart" title="Cart">{{trans("common/label.view_cart")}}</a>
                </div>
            </div>
        </li>
    </ul>
</div>

@endif