@extends('front.layout.master')
@section('content')
    <?php
    $product_translation = $product->getByLanguageId(app('language')->language_id);
    ?>
    <div class="product-area ptb-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    @include('notification')
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="row">
                        <div class="product-big-image col-xs-12 col-sm-6 col-lg-7 col-md-6">
                            {{--<div class="icon-sale-label sale-left">Sale</div>--}}
                            {{--<div class="large-image"> <a data-toggle="modal" data-target="#mymodal" data-placement="top" title="Quick View"  href="#" > <img class="main-image" src="{!! url($product->getDefaultImagePath()) !!}" alt="products"> </a> </div>--}}

                               {{-- <div class="buttons">
                                    <span class="zoom-in"><i class="fa fa-plus" aria-hidden="true"></i>
                                    </span>
                                    <span class="zoom-out"><i class="fa fa-minus" aria-hidden="true"></i>
                                    </span>
                                    <span class="reset"><i class="fa fa-refresh" aria-hidden="true"></i></span>
                                </div>--}}
                            <section id="auto-contain">
                                <div class="parent">
                                    <div class="panzoom">
                                        {{--<a data-toggle="modal" data-target="#mymodal" data-placement="top" title="Quick View"  href="#" >--}}
                                           {{-- <img class="main-image" src="{!! url($product->getDefaultCdnImagesPath()) !!}" alt="products" width="600" height="500">--}}
                                        <img class="main-image" src="{!! url($product->getDefaultCdnImagesPath()) !!}" alt="{!! $product_translation->product_name !!}" width="600" height="500">
                                        {{--</a>--}}
                                    </div>
                                </div>
                                <div class="buttons">
                                    <span class="zoom-in"><i class="fa fa-plus" aria-hidden="true"></i>
                                    </span>
                                    <span class="zoom-out"><i class="fa fa-minus" aria-hidden="true"></i>
                                    </span>
                                    <span class="reset"><i class="fa fa-refresh" aria-hidden="true"></i></span>
                                    <a data-toggle="modal" data-target="#mymodal" data-placement="top" title="Quick View"  href="#" >Click For Full Screen</a>
                                </div>
                            </section>

                            <div class="flexslider flexslider-thumb">
                                <ul class="previews-list slides">
                                    @foreach($product->images as $product_image)
                                         <li class="{!! (count($product->images)==2)?'fixed-width':'' !!}">
                                             <a class="thumb-image" href='{!! $product->getCdnImagesPath($product_image) !!}'>
                                          <img data-image="{!! url($product->getCdnImagesPath($product_image)) !!}" src="{!! url($product->thumbCdn($product_image)) !!}" alt = "{!! $product_image->alt !!}" title="{!! $product_image->title !!}"/>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="modal-area">
                                <!-- single-modal-start -->
                                <div class="modal fade" id="mymodal" tabindex="-1" role="dialog" aria-hidden="myModalLabel">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <img class="main-image" src="{!! $product->getDefaultCdnImagesPath() !!}" alt="products">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end: more-images -->

                        </div>
                        <div class="col-lg-4 col-lg-offset-1 col-md-4 col-md-offset-2 col-sm-12 col-xs-12">
                            <div class="product-info">
                                {!! Form::open(['url' => Url(LaravelLocalization::getCurrentLocale()."/cart/add"), 'class' => '','id' =>'product_form']) !!}
                                <div style="width:35%;" class="mb-30 mr-l-20">
                                    <img src="{!! ($product->brand->parent_id==null) ? $product->brand->getCdnImagePath() : $product->brand->parent->getCdnImagePath() !!}">
                                </div>
                                <h2 class="mr-l-15">{!! $product_translation->product_name !!}</h2>
                                <div class="col-lg-12 price">
                                    @if($product->original_price != $product->best_price)
                                                        <span class="new-price fs-25">{!! format_price($product->best_price) !!}</span>
                                                         <span class="old-price fs-25">&nbsp;<del>{!! format_price($product->original_price) !!}</del></span>
                                                        <span class="old-price percentage ml-10 fs-25">{!! getRebate($product->best_price,$product->original_price) !!} OFF</span>
                                                    @else
                                                        <span class="price-exact fs-25">{!! format_price($product->original_price) !!}</span>
                                                    @endif
                                </div>
                                <!-- start attribute -->
                                <div class="row">
                                    <div class="col-lg-12 ptb-20 vcenter mr-l-20">
                                        @foreach($attribute_value as $attribute)
                                            <div class="color-box">
                                                <label class="color-label"><b>{!! $attribute['name'] !!}</b></label>
                                            </div>
                                            <div class="color-box">

                                                @if($attribute['type']==1)
                                                    <div class="color"> 
                                                        <ul class="color-attribute"> 
                                                            <?php $selected_color = ''; ?>
                                                            @foreach($attribute['options'] as $index=>$options)
                                                                @if(in_array($options->attribute_option_id,$attribute_option_id))
                                                                    <?php
                                                                    $product_attribute_option = $product->getProductAttributeOption($options->attribute_option_id);
                                                                    $selected_color =  ($selected_color=='' && $index==0)? $product_attribute_option->product_attribute_option_id:$selected_color;
                                                                    ?>
                                                                    <li class="{!! ($index==0)?'active':'' !!}">
                                                                        {!! Html::image($options->swatch(), $options->getByLanguageid(app('language')->language_id)->option_name,
                                                                        array( 'class' => "size16 attr-element",'id' => "brd",
                                                                        'title' => $options->getByLanguageid(app('language')->language_id)->option_name,
                                                                        'data-product_attribute_option_id'=>$product_attribute_option->product_attribute_option_id,
                                                                        'data-attribute_id'=>$options->attribute_id
                                                                        )) !!}
                                                                    </li>
                                                                @endif
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                    <input type="hidden" name="attrs[]" value="{!! $selected_color !!}" id="color_attribute_id">
                                                @endif
                                                @if($attribute['type']==2)
                                                    <?php
                                                        $class = (isset($attr_options[$attribute['id']]) && count($attr_options[$attribute['id']])>1) ? "" : "attribute-select-box" ?>
                                                    <select name="attrs[]" data-placeholder="Choose an option…"
                                                            style="width:250px; height:40px;"
                                                            class="form-control-product chosen-select {!! $class !!}" tabindex="1">
                                                        @foreach($attribute['options'] as $options)
                                                            @if(in_array($options->attribute_option_id,$attribute_option_id))
                                                                <?php
                                                                $product_attribute_option = $product->getProductAttributeOption($options->attribute_option_id);
                                                                ?>
                                                                <option value="{!! $product_attribute_option->product_attribute_option_id !!}">{!! $options->getByLanguageid(app('language')->language_id)->option_name !!}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                @endif
                                            </div>
                                        @endforeach
                                             
                                    </div>
                                    <!-- end attribute -->

                                </div>
                                <div class="clear"></div>
                                    <div class="col-md-7 ">
                                        <!-- input type="hidden" name="qty" value="1" readonly -->
                                        <input type="hidden" name="product_id" value="{!! $product->product_id !!}" readonly>
                                        <input type="hidden" name="radius" id="radius" value="" readonly>
                                        <input type="hidden" name="postal_code" id="postal_code" value="" readonly>
                                    </div>
                                <div class="quantity row">
                                     <label for="quantity" class="ml-15 col-lg-3">{!! trans('product.quantity'); !!}</label>
                                     <input type="text" class="form-control-product-input col-lg-2" id="qty" name="qty" value="1">
                                </div>
                                <!-- start other information -->
                                <div class="other-information">
                                    <div class="col-md-12">

                                        <!-- a href="javascript://" class="btn btn-block btn-primary btn-lg" id="buy_locally">{!! trans('product.buy_it_locally_txt')." (".getPrice($product->best_price).")" !!}</a -->

                                        <div class="buying-area hide" id="buying_area">
                                            {!! Form::hidden('product_id',$product->product_id, ['class' => 'form-control ','id'=>'product-id','placeholder'=>""]) !!}
                                            <?php $radius_data = getRadiusData() ?>
                                            <label>{!! trans('product.choose_buying_area') !!}</label>
                                            <div class="input-group text-center availibily-section">
                                                      <select name="requested_distance" class="form-control" id="distance">
                                                          @foreach($radius_data as $index=>$radius)
                                                              <option value="{!! $index !!}">{!! $radius !!}</option>
                                                          @endforeach
                                                      </select>
                                                <span class="input-group-addon">{!! trans('product.around') !!}</span>
                                                <input type="text" name="zip_code" class="required form-control-product" id="zip_code" value="" placeholder="{!! trans('product.postal_code') !!}">
                                            </div>
                                            <a href="#" class="btn btn-sm btn-default" id="check-product">{!! trans('product.check_retailer_availability') !!}</a>
                                        </div>

                                        <!-- div class="buying-lable" id="buying_label">
                                            <span>{!! trans('product.buy_it_below') !!}</span><br>
                                            <span>{!! trans('product.on_internet') !!}</span>
                                        </div -->

                                        <div class="add-cart mb-40" id="add-cart">
                                            <!-- <p> {!! trans('product.product_available_with_selected_area') !!}</p> -->
                                            <button type="submit" class="btn btn-default add-to-cart" id="add-to-cart">{!! trans("product.add_to_cart")!!}</button>
                                           <!-- <button class="btn btn-default add-to-cart" href="{!! url(LaravelLocalization::getCurrentLocale().'/wishlist/'.$product->product_id) !!}">{!! trans("common/label.wishlist")!!}</button> -->
                                        </div>

                                        <div class="product-not-avail hide" id="product-not-avail">
                                            <p> {!! trans('product.product_not_available_with_selected_area') !!}</p>
                                            <p>{!! trans('product.buy_with_ecommerce') !!}</p>
                                        </div>
                                        
                                        <!-- <a href="javascript://" class="btn btn-block btn-primary btn-lg" id="see_best_price">{!! trans('product.see_best_prices') !!}</a> -->
                                    </div>
                                </div>
                                <!-- end other information -->

                                @if(count($affiliate_products)>0)
                                 <?php
                                    $total_products = round(count($affiliate_products)/2);
                                    ?>
                                <div class="col-sm-12 affiliate-container mr-t-10 mr-b-10 hide">
                                    <div class="col-sm-6 affiliate-section">
                                    @foreach($affiliate_products as $index=>$affiliate_product)
                                        @if($index<$total_products)
                                            <div class="col-sm-4 product-row">
                                                <?php
                                                $img_src = null;
                                                $epartner_repo = App::make(\App\Repositories\EpartnerRepository::class);
                                                $epartner = $epartner_repo->getByName($affiliate_product->advertiser_name);
                                                if(!empty($epartner)){
                                                    $img_src = \App\Models\EpartnerMedia::IMAGE_PATH.'/'.$epartner->image;
                                                }
                                                ?>
                                                <div class="col-xs-4 no-padding">
                                                @if($img_src!=null)
                                                    <div class="product-image">
                                                    <img class="" src="{!! url($img_src) !!}">
                                                    </div>
                                                @endif
                                                </div>
                                                <div class="col-xs-4 no-padding text-center product-price">
                                                    <span class="">
                                                        {!!  format_price($affiliate_product->price) !!}
                                                    </span>
                                                </div>
                                                    <div class="col-xs-4 no-padding">
                                                <span class="affiliate-product-link pull-right">
                                                    <a target="_blank" class="btn btn-default default-btn" href="{!! $affiliate_product->product_url !!}">{!! trans('product.see_it') !!}</a>
                                                </span>
                                                    </div>
                                            </div>
                                        @endif
                                    @endforeach
                                    </div>

                                    <div class="col-sm-6 affiliate-section">
                                        @foreach($affiliate_products as $index=>$affiliate_product)
                                            @if($index>=$total_products)
                                                <div class="col-sm-4 product-row">
                                                    <?php
                                                    $img_src = null;
                                                    $epartner_repo = App::make(\App\Repositories\EpartnerRepository::class);
                                                    $epartner = $epartner_repo->getByName($affiliate_product->advertiser_name);
                                                    if(!empty($epartner)){
                                                        $img_src = \App\Models\EpartnerMedia::IMAGE_PATH.'/'.$epartner->image;
                                                    }
                                                    ?>
                                                    <div class="col-xs-4 no-padding">
                                                        @if($img_src!=null)
                                                            <div class="product-image">
                                                            <img class="" src="{!! url($img_src) !!}">
                                                                </div>
                                                        @endif
                                                    </div>
                                                    <div class="col-xs-4 no-padding text-center product-price">
                                                    <span class="">
                                                        {!!  format_price($affiliate_product->price) !!}
                                                    </span>
                                                    </div>
                                                    <div class="col-xs-4 no-padding">
                                                <span class="affiliate-product-link pull-right">
                                                    <a target="_blank" class="btn btn-default default-btn" href="{!! $affiliate_product->product_url !!}">{!! trans('product.see_it') !!}</a>
                                                </span>
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    <div class="col-sm-4 price-alert">
                                        <div class="col-xs-4 no-padding">
                                            <span><i class="fa fa-bell-o" style="color: #59b210; margin-right: 10px" aria-hidden="true"></i><a href="#"> {!! trans('product.lowest_price_alert') !!}</a></span>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                @endif

                                {!! Form::close() !!}
                            </div>
                        </div>

                        <div class="product-overview-tab">
                            <div class="container" >
                                <div class="row" >
                                    <div class="col-xs-12" id="tab-container">
                                        <div class="product-tab-inner">
                                            <ul id="product-detail-tab" class="nav nav-tabs product-tabs row">
                                                <li class="active"><a href="#description"
                                                                      data-toggle="tab">{!!
                                                        trans("product.description")!!} </a></li>
                                                <li><a href="#reviews" data-toggle="tab">{!!
                                                        trans("product.reviews")!!}</a></li>
                                                <li><a href="#video-press" data-toggle="tab">{!!
                                                        trans("product.video-press")!!}</a></li>
                                            </ul>
                                            <div id="productTabContent" class="tab-content">
                                                <div class="tab-pane fade in active product_description" id="description">
                                                    <div class="std more">
                                                        {!! $product_translation->description !!}
                                                    </div>
                                                    <div class="product-tabs-content-inner clearfix">
                                                        @foreach($attribute_value as $attribute)
                                                            <?php
                                                            $attribute_option['option_name'] = [];
                                                            ?>
                                                            @foreach($attribute['options'] as $options)
                                                                @if(in_array($options->attribute_option_id,$attribute_option_id))
                                                                    <?php
                                                                    $attribute_option['attribute_name'] = $attribute['name'];
                                                                    $attribute_option['option_name'][] = $options->getByLanguageid(app('language')->language_id)->option_name;
                                                                    ?>
                                                                @endif
                                                            @endforeach

                                                            @if(!empty($attribute_option) && count($attribute_option)>0)
                                                                <p><span><b>{!! $attribute_option['attribute_name'] !!}</b>
                                                                                    :</span> {!! implode(',',$attribute_option['option_name']) !!}
                                                                </p>
                                                            @endif

                                                        @endforeach
                                                    </div>
                                                </div>

                                                <div class="tab-pane fade" id="video-press">
                                                    <div class="std">
                                                        <div class="product-tabs-content-inner clearfix">
                                                            @foreach($product->video as $video)
                                                                <div class="row">
                                                                @if(videoType($video->video_url)=='youtube')
                                                                  <div class="col-md-6 mr-b-15">
                                                                    <p><strong>{!! $video->video_title !!}</strong></p>
                                                                    <?php $video_key = parse_youtube($video->video_url);?>
                                                                    <div class="embed-responsive embed-responsive-16by9">
                                                                      <iframe class="embed-responsive-item"  src="https://www.youtube.com/embed/{!! $video_key !!}"></iframe>
                                                                    </div>
                                                                  </div>
                                                                @else
                                                                  <div class="col-md-6">
                                                                      <p class="press-title"><strong>{!! $video->video_title !!}</strong><a class="video-link" href="{!! $video->video_url !!}" target="_blank"> {!! trans('product.click_here') !!}</a></p>
                                                                  </div>
                                                                @endif
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>

                                                <div id="reviews" class="tab-pane fade">
                                                    <div class="std">
                                                        <div class="reviews-area">
                                                            <h3>{!! trans("product.reviews")!!}</h3>

                                                            <div class="review-list ptb-20">
                                                                @foreach($reviews as $review)
                                                                    <div class="stars">
                                                                        @for($i=1;$i<=$review->rating;$i++)
                                                                            <a title="1" class="star fullStar"></a>
                                                                        @endfor
                                                                    </div>
                                                                    <p>{!! $review->review !!}</p>
                                                                @endforeach
                                                            </div>
                                                            @if(\Illuminate\Support\Facades\Auth::check())
                                                                <p>{!! trans("product.review_text")!!}
                                                                    “{!! $product_translation->product_name !!}” </p>
                                                                <div id="review-success"
                                                                     class=""></div>
                                                                <div id="review-error" class=""></div>
                                                                {!! Form::open(array('url' => 'submit-review','id' =>'review_form','class'=>'')) !!}

                                                                <div class="rating-area mb-10">
                                                                    <h4>Your Rating</h4>
                                                                    <div class="rating-container">
                                                                        <input type="radio" name="example" class="rating" value="1" />
                                                                        <input type="radio" name="example" class="rating" value="2" />
                                                                        <input type="radio" name="example" class="rating" value="3" />
                                                                        <input type="radio" name="example" class="rating" value="4" />
                                                                        <input type="radio" name="example" class="rating" value="5" />
                                                                    </div>
                                                                </div>
                                                                {!! Form::hidden('rating_product_id',$product->product_id, ['class' => 'form-control ','id'=>'url_key','placeholder'=>""]) !!}
                                                                <div class="comment-form mb-10">
                                                                    <label>{!!
                                                                        trans("product.review_comment")!!}</label>
                                                                <textarea name="comment" class="required" id="comment" cols="20"
                                                                          rows="7"></textarea>

                                                                </div>
                                                                <div class="comment-form-author mb-10">
                                                                    <label>{!! trans("product.name")!!}</label>
                                                                    <input type="text" readonly name="user_name"
                                                                           value="{!! \Illuminate\Support\Facades\Auth::user()->first_name." ".\Illuminate\Support\Facades\Auth::user()->last_name !!}">
                                                                </div>
                                                                <div class="comment-form-email mb-10">
                                                                    <label>{!! trans("product.email")!!}</label>
                                                                    <input type="text" readonly name="email_address"
                                                                           value="{!! \Illuminate\Support\Facades\Auth::user()->email !!}">
                                                                </div>
                                                                <button type="submit" class="submit-review">submit
                                                                </button>
                                                                {!! Form::close() !!}
                                                            @else
                                                                {!! trans("product.review_login_message")!!} <a
                                                                        href="{!! URL::to('login') !!}">{!!
                                                                    trans("product.review_click_here")!!}</a>
                                                            @endif

                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                                                    
                        <div class="share-community mr-l-15">
                            <p style="line-height: 0;">{!! trans('product.find_better_deal') !!} <a href="{!! url('contact-us') !!}">{!! trans('product.share_with_us') !!}</a></p>
                        </div>

                        @if(!empty($related_products))
                        <div class="related-products-area ptb-50">
                            <div class="col-lg-12">
                                <div class="section-title mb-30">
                                    <h2>{!! trans("product.related_products")!!}</h2>
                                </div>
                            </div>
                            <div class="related-products-active">
                                @foreach($related_products as $related_product)
                                 <?php $related_product_translation = $related_product->getByLanguageId(app('language')->language_id); ?>

                                    <div class="col-lg-12">
                                    <!-- single-product-start -->
                                    <div class="product-wrapper">
                                        <div class="product-img-connexe product-pic">
                                            <a href="{!! $related_product->url->target_url !!}">
                                                <img src="{!! url($related_product->getDefaultCdnImagesPath()) !!}" alt="{!! $related_product_translation->product_name !!}"
                                                     class=""/>
                                            </a>
                                        </div>
                                        <div class="product-content mt-20">
                                            <span>{!! 
                                                    (isset($related_product->brand)) ? ($related_product->brand->parent_id==null) ? $related_product->brand->brand_name : $related_product->brand->parent->brand_name : "" !!}</span>

                                            <h4><a href="{!! $related_product->url->target_url !!}">{!! $related_product_translation->product_name !!}</a></h4>
                                            @if($related_product->original_price != $related_product->best_price)
                                                <span class="old-price">({!! getPercentage($related_product->original_price,$related_product->best_price) !!})</span>
                                                <span class="old-price"><del>{!! format_price($related_product->original_price) !!}</del></span>
                                                <span class="new-price">{!! format_price($related_product->best_price) !!}</span>
                                            @else
                                                <span class="old-price">{!! format_price($related_product->original_price) !!}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <!-- single-product-end -->
                                </div>
                                @endforeach
                            </div>
                        </div>
                        @endif

                        <div class="service-area-2 pb-50">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-4 col-md-4 hidden-sm col-xs-12">
                                        <!-- single-area-start -->
                                        <div class="single-service">
                                            <div class="service-icon">
                                                <a href="#"><i class="pe-7s-plane"></i></a>
                                            </div>
                                            <div class="service-text">
                                                <h3>{{trans("common/label.always_best_price")}}</h3>
                                                <span>{{trans("common/label.always_best_price_text")}}</span>
                                            </div>
                                        </div>
                                        <!-- single-area-end -->
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                        <!-- single-area-start -->
                                        <div class="single-service">
                                            <div class="service-icon">
                                                <a href="#"><i class="pe-7s-headphones"></i></a>
                                            </div>
                                            <div class="service-text">
                                                <h3>{{trans("common/label.professional_services")}}</h3>
                                                <span>{{trans("common/label.professional_services_text")}}</span>
                                            </div>
                                        </div>
                                        <!-- single-area-end -->
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                        <!-- single-area-start -->
                                        <div class="single-service">
                                            <div class="service-icon">
                                                <a href="#"><i class="pe-7s-refresh-2"></i></a>
                                            </div>
                                            <div class="service-text">
                                                <h3>{{trans("common/label.help_your_community")}}</h3>
                                                <span>{{trans("common/label.help_your_community_text")}}</span>
                                            </div>
                                        </div>
                                        <!-- single-area-end -->
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
