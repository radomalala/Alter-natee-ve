@extends('front.layout.master')
@section('content')
    <section class="order-detail-container ptb-30">
        <div class="container">
            <div class="col-xs-12">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab_1" data-toggle="tab">{!! trans('order.to_respond') !!}</a></li>
                    <li><a href="#tab_2" data-toggle="tab">{!! trans('order.waiting') !!}</a></li>
                    <li><a href="#tab_3" data-toggle="tab">{!! trans('order.earned') !!}</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tab_1">
                        <section class="content">
                            <div class="row">
                                <div class="col-md-12">
                                    <table width="100%" class="merchant-order-list bdr-btm">
                                        <tbody>
                                        @if(count($pending_items)>0)
                                            @foreach($pending_items as $index=>$item)
                                            {!! Form::open(['url' =>url(LaravelLocalization::getCurrentLocale().'/response-to-customer'), 'id'=>'product_search_form_'.$index, 'method' => 'post','class'=>' form-inline','autocomplete'=>'off']) !!}
                                            <tr>
                                                <td width="30%">
                                                    <strong>{!! ($item->brand->parent_id==null) ? $item->brand->brand_name : $item->brand->parent->brand_name !!}</strong><br>
                                                    <a href="{!! (!empty($item->product)>0 && !empty($item->product->url)) ? url($item->product->url->target_url): "#" !!}">{!! $item->product_name !!}</a>
                                                    @foreach($item->attributes as $index=>$attribute)
                                                        <br/>{!! $attribute->attribute_label !!}
                                                        : {!! $attribute->attribute_selected_value !!}
                                                    @endforeach
                                                    <br/>{!! trans('order.price') !!}: {!! format_price($item->price) !!}
                                                    <br/>
                                                    <a href="{!! !empty($item->product_url)?url($item->product_url) :'#' !!}">{!! trans('order.equalize_link') !!}</a><br>
                                                    @if($item->order->payment_type=='1')
                                                        {!! trans('order.payment_type') !!}
                                                    @endif

                                                </td>
                                                <td width="30%">
                                                    <div class="col-md-10">
                                                    <div class="funkyradio">
                                                        <div class="funkyradio-info">
                                                            <input type="radio" name="available_option_{!! $item->order_item_id !!}" id="radio1_{!! $item->order_item_id !!}" value="1" />
                                                            <label for="radio1_{!! $item->order_item_id !!}">{!! trans('order.available_now') !!}</label>
                                                        </div>
                                                        <div class="funkyradio-info">
                                                            <input type="radio" name="available_option_{!! $item->order_item_id !!}" id="radio2_{!! $item->order_item_id !!}" value="2"/>
                                                            <label for="radio2_{!! $item->order_item_id !!}">{!! trans('order.available_in') !!}
                                                                <select class="available_hours" name="available_hours">
                                                                    @foreach(getAvailableHours() as $key=>$val)
                                                                    <option value="{!! $val !!}">{!! $key !!}</option>
                                                                    @endforeach
                                                                </select>
                                                            </label>
                                                        </div>
                                                        <div class="funkyradio-info">
                                                            <input type="radio" name="available_option_{!! $item->order_item_id !!}" id="radio3_{!! $item->order_item_id !!}" value="3" />
                                                            <label for="radio3_{!! $item->order_item_id !!}">{!! trans('order.not_available') !!}</label>
                                                        </div>
                                                        <div class="funkyradio-info">
                                                            <input type="radio" name="available_option_{!! $item->order_item_id !!}" id="radio4_{!! $item->order_item_id !!}" value="4"/>
                                                            <label for="radio4_{!! $item->order_item_id !!}">{!! trans('order.price_problem') !!}</label>
                                                        </div>
                                                        <div class="funkyradio-info">
                                                            <input type="radio" name="available_option_{!! $item->order_item_id !!}" id="radio5_{!! $item->order_item_id !!}" value="5"/>
                                                            <label for="radio5_{!! $item->order_item_id !!}">{!! trans('order.replacement_product') !!}</label>
                                                        </div>

                                                    </div>
                                                    </div>
                                                </td>
                                                <td width="30%">
                                                        <input type="hidden" name="item_request_id"
                                                               value="{!! $item->order_item_request_id  !!}">
                                                        <input type="hidden" name="item_id"
                                                               value="{!! $item->order_item_id  !!}">
                                                        <input type="hidden" name="customer_id"
                                                               value="{!! $item->order->user_id  !!}">
                                                        <label>{!! trans('order.client_message') !!}</label>
                                                        {!!Form::textarea('response',null,['class'=>"form-control",'placeholder'=>'','size' => '50x3']) !!}
                                                        <br>
                                                        <label>{!! trans('order.product_replacement_label') !!}</label><br>
                                                        {!!Form::text('product_name', null,['class'=>"form-control request-product-name",'placeholder'=>'Product name'])  !!}
                                                        {!!Form::text('product_link', null,['class'=>"form-control request-product-link",'placeholder'=>'Product link'])  !!}
                                                        <br/>
                                                        <button type="submit"
                                                                class="btn btn-default default-btn response-to-customer mb-10 pull-right"
                                                                data-index="{!! $index !!}"
                                                                id="response-to-customer">{!! trans('order.send_offer') !!}
                                                        </button>
                                                </td>
                                            </tr>
                                            {!! Form::close() !!}
                                        @endforeach
                                        @else
                                            {!! trans('order.no_records_found') !!}
                                        @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </section>
                    </div>
                    <div class="tab-pane" id="tab_2">
                        <section class="content" id="image_content">
                            <table width="100%" class="table bdr-btm">
                                <tbody>

                                @if(count($waiting_items)>0)
                                    @foreach($waiting_items as $index=>$item)
                                    <tr>
                                        <td width="30%" class="vertical-align">
                                            <strong>{!! ($item->brand->parent_id==null) ? $item->brand->brand_name : $item->brand->parent->brand_name !!}</strong><br>
                                            <a href="{!! (!empty($item->product)>0 && !empty($item->product->url)) ? url($item->product->url->target_url): "#" !!}">{!! $item->product_name !!}</a>
                                            @foreach($item->attributes as $index=>$attribute)
                                                <br/>{!! $attribute->attribute_label !!}
                                                : {!! $attribute->attribute_selected_value !!}
                                            @endforeach
                                            <br/>{!! trans('order.price') !!}: {!! format_price($item->price) !!}
                                            <br/>
                                            <a href="{!! !empty($item->product_url)?url($item->product_url) :'#' !!}">{!! trans('order.equalize_link') !!}</a><br>
                                            @if($item->order->payment_type=='1')
                                                {!! trans('order.payment_type') !!}
                                            @endif

                                        </td>
                                        <td width="40%" class="vertical-align">
                                         <?php
                                            $available_type = !empty($item->itemRequest->first()->available_type) ? \App\Models\OrderItemRequest::AVAILABLE_TYPE[$item->itemRequest->first()->available_type]:'';
                                            echo trans('order.'.$available_type).'<br>';
                                            if($item->itemRequest->first()->available_type=='2'){
                                                echo $item->itemRequest->first()->available_time;
                                            } else if($item->itemRequest->first()->available_type=='5'){
                                                echo trans('order.product_name').":".$item->itemRequest->first()->product_name.'<br>';
                                                echo trans('order.product_link').":".$item->itemRequest->first()->product_link.'<br>';
                                            }
                                         ?>
                                        </td>
                                        <td width="30%" class="vertical-align">{!! trans('order.answered_the') !!}:
                                            @if(!empty($item->itemRequest->first()->created_date))
                                                {!! Carbon\Carbon::parse($item->itemRequest->first()->created_date)->format('d/m/Y')  !!}
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                @else
                                    {!! trans('order.no_records_found') !!}
                                @endif
                                </tbody>
                            </table>
                        </section>
                    </div>
                    <div class="tab-pane" id="tab_3">
                        <section class="content" id="image_content">
                            <table class="table bdr-btm">
                                <tbody>
                                @if(count($earned_items)>0)
                                    @foreach($earned_items as $index=>$item)
                                    <tr>
                                        <td width="35%" class="vertical-align">
                                            <strong>{!! ($item->brand->parent_id==null) ? $item->brand->brand_name : $item->brand->parent->brand_name !!}</strong><br>
                                            <a href="{!! (!empty($item->product)>0 && !empty($item->product->url)) ? url($item->product->url->target_url): "#" !!}">{!! $item->product_name !!}</a>
                                            @foreach($item->attributes as $index=>$attribute)
                                                <br/>{!! $attribute->attribute_label !!}
                                                : {!! $attribute->attribute_selected_value !!}
                                            @endforeach
                                            <br/>{!! trans('order.price') !!}: {!! format_price($item->price) !!}
                                            <br/>
                                            <a href="{!! !empty($item->product_url)?url($item->product_url) :'#' !!}">{!! trans('order.equalize_link') !!}</a><br>
                                            @if($item->order->payment_type=='1')
                                                {!! trans('order.payment_type') !!}
                                            @endif

                                        </td>
                                        <td width="35%" class="vertical-align">
                                            <?php
                                            $available_type = !empty($item->itemRequest->first()->available_type) ? \App\Models\OrderItemRequest::AVAILABLE_TYPE[$item->itemRequest->first()->available_type]:'';
                                            echo trans('order.'.$available_type).'<br>';
                                            if($item->itemRequest->first()->available_type=='2'){
                                                echo $item->itemRequest->first()->available_time.'<br>';;
                                            } else if($item->itemRequest->first()->available_type=='5'){
                                                echo trans('order.product_name').":".$item->itemRequest->first()->product_name.'<br>';
                                                echo trans('order.product_link').":".$item->itemRequest->first()->product_link.'<br>';
                                            }
                                            ?>
                                            {!! trans('order.answered_the') !!}:
                                            @if(!empty($item->itemRequest->first()->created_date))
                                                {!! Carbon\Carbon::parse($item->itemRequest->first()->created_date)->format('d/m/Y')  !!}
                                            @endif
                                        </td>
                                        <td width="30%" class="vertical-align">
                                            <button type="submit"
                                                    class="btn btn-default default-btn coupon-code-btn"
                                                    id="coupon-code">{!! trans('order.coupon_see') !!}
                                            </button>
                                            <div class="coupon-code mt-20">{!! $item->coupon->coupon_code !!}</div>
                                            <br/>
                                            <div class="">
                                                {!! trans('order.the_confirmed') !!}
                                                : {!! Carbon\Carbon::parse($item->itemRequest->first()->created_date)->format('d/m/Y')  !!}
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                @else
                                    {!! trans('order.no_records_found') !!}
                                @endif
                                </tbody>
                            </table>
                        </section>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </section>
@stop
@section('footer-script')
    <script>
        $(function () {
            $.fn.orderDetail();
        })
    </script>
@stop