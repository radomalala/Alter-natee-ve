@extends('front.layout.master')

@section('content')

    <div class="">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{!! url(LaravelLocalization::getCurrentLocale().'/') !!}">{!! trans('cart.home') !!}</a></li>
                <li class="breadcrumb-item active">{!! trans('cart.shopping_cart') !!}</li>
            </ol>

            <div class="row">
                <div class="col-lg-12">
                    @include('notification')
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12">
                    {!! Form::open(['url' => Url(LaravelLocalization::getCurrentLocale()."/cart/update"), 'class' => '','id' =>'cart_form']) !!}
                    <div class="table-content table-responsive">
                            <table>
                                <thead>
                                <tr>
                                    <th class="product-thumbnail">{!! trans('cart.product') !!}</th>
                                    <th class="product-name">{!! trans('cart.description') !!}</th>
                                    <th class="product-price">{!! trans('cart.best_price') !!}</th>
                                    <th class="product-price">{!! trans('cart.rebate') !!}</th>
                                    <th class="product-quantity">{!! trans('cart.quantity') !!}</th>
                                    <th class="product-remove">{!! trans('cart.remove') !!}</th>
                                    <th class="product-subtotal">{!! trans('cart.total') !!}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(count($cart->items())>0)
                                @foreach($cart->items() as $item_id=>$item)
                                <tr>
                                    <td class="product-thumbnail">
                                        <a href="{!! url(LaravelLocalization::getCurrentLocale().'/'.$item->getUrl()) !!}"><img src="{!! URL::to('/').'/'.\App\Product::PRODUCT_IMAGE_PATH.$item->getImage() !!}" alt="{!! $item->getImageAlt() !!}"></a>
                                    </td>
                                    <td class="product-name">
                                        <a href="{!! url(LaravelLocalization::getCurrentLocale().'/'.$item->getUrl()) !!}"><b>{!! $item->getName() !!}</b></a>
                                        <p>
                                            @foreach($item->getAttributes() as $attribute)
                                                {!! $attribute->getLabel().':'.$attribute->getName() !!}
                                            @endforeach
                                        </p>
                                    </td>
                                    <td class="product-price">
                                        <span class="amount">{!! format_price($item->getBestPrice()) !!}</span>
                                        <p>{!! trans('cart.standard_price') !!}: {!! format_price($item->getOriginalPrice()) !!}</p>
                                    </td>
                                    <td class="product-price">
                                        <span class="amount">{!! format_price($item->getRebate()) !!}</span>
                                        <p>{!! trans('cart.is') !!}: {!! $item->getRebatePercentage() !!}</p>
                                    </td>
                                    <td class="product-quantity">
                                        <input type="number" name="qty[{!! $item_id !!}]" class="number" value="{!! $item->getQuantity() !!}">
                                    </td>
                                    <td class="product-remove">
                                        <a href="{!! url(LaravelLocalization::getCurrentLocale()."/cart/remove/$item_id") !!}"><i class="fa fa-times"></i></a>
                                    </td>
                                    <td class="product-subtotal">
                                        {!! format_price($item->gettotal()) !!}
                                    </td>
                                </tr>
                                @endforeach
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td>{!! trans('cart.total_rebate') !!}</td>
                                    <td><b>{!! format_price($cart->totalRebate()) !!}</b></td>
                                    <td colspan="2" >{!! trans('cart.total_cost') !!}</td>

                                    <td><b>{!! format_price($cart->total()) !!}</b></td>
                                </tr>
                                @else
                                    <tr>
                                        <td colspan="7">
                                           {!! trans('cart.no_item') !!}
                                        </td>
                                    </tr>
                                @endif
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-md-8 col-sm-7 col-xs-12">
                                <div class="buttons-cart">
                                    <input type="submit" value="{!! trans('cart.update_cart') !!}" name="update_cart">
                                    <a href="{!! url(LaravelLocalization::getCurrentLocale().'/') !!}">{!! trans('cart.continue_shopping') !!}</a>
                                </div>

                            </div>
                            <div class="col-md-4 col-sm-5 col-xs-12 mb-30">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="payment_type" value="1"> {!! trans('cart.payment_label') !!}
                                    </label>
                                </div>                                <div class="cart_totals">
                                    <div class="wc-proceed-to-checkout">
                                        <a href="javascript://" class="checkout-btn">{!! trans('cart.proceed_to_checkout') !!}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@stop

@section('footer-script')
    <script type="application/javascript" language="javascript">
        $(document).ready(function () {
            $(".checkout-btn").on('click',function () {
                $("#cart_form").attr('action',base_url+language_code+'/checkout');
                $("#cart_form").submit();
            });
        });
    </script>
@stop