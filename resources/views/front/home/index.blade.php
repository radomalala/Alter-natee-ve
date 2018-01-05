@extends('front.layout.master')

@section('content')

        <!-- header-area-end -->
<!-- section-element-area-start -->
<div class="section-element-area pt-20">
    <div class="container">
        <div class="row">
        @include('notification')
        <!-- left-menu-start -->
            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                <div class="left-menu-area">
                    <div class="menu-title">
                        <h3><a href="#"><i class="pe-7s-menu"></i>{!! trans("common/label.all_categories")!!}</a>
                        </h3>
                    </div>
                    <div class="left-menu">
                        <nav>
                            <ul>
                                @foreach($categories as $category)
                                    @if($category->getByLanguage(app('language')->language_id))
                                        <li><a href="{!! url(LaravelLocalization::getCurrentLocale().'/'.$category->url->target_url) !!}"><i
                                                        class="pe-7s-phone size"></i>
                                                {!!$category->getByLanguage(app('language')->language_id)->category_name
                                                !!}
                                            </a>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
            <!-- left-menu-end -->
            <!-- slider-area-start -->
            <div class="col-lg-6 col-md-6 col-sm-8 col-xs-12">
                <div class="slider-area">
                    <div id="slider">
                        @foreach($banners as $banner)
                            <a href="{!! $banner->url !!}">
                            <img src="{!! $banner->getBannerImage(app('language')->language_code) !!}" alt="{!! $banner->alt !!}"/>
                            </a>
                        @endforeach
                    </div>

                    <div class="nivo-html-caption" id="caption1">
                        <h3 class="wow fadeInDownBig" data-wow-delay="0.7s">Apple Watch</h3>
                        <h4 class="wow lightSpeedIn" data-wow-delay="1s">Available online now</h4>
                        <a href="#" class="wow fadeInDownBig" data-wow-delay="0.9s">SHOP NOW</a>
                    </div>
                    <div class="nivo-html-caption" id="caption2">
                        <h3 class="wow fadeInDownBig right" data-wow-delay="0.7s">Smart Keyboard</h3>
                        <h4 class="wow lightSpeedIn right" data-wow-delay="1s">FOR IPAD PRO</h4>
                        <a href="#" class="wow fadeInDownBig right" data-wow-delay="0.9s">SHOP NOW</a>
                    </div>
                </div>
            </div>
            <!-- slider-area-end -->
            <!-- right-banner-area-start -->
            <div class="col-lg-3 col-md-3 hidden-sm hidden-xs">
                <div class="right-banner-area">
                    <div class="row">
                        @foreach($sub_banners as $sub_banner)
                            <div class="col-lg-12">
                                <!-- single-banner-start -->
                                <div class="single-banner mb-30">
                                    <a href="{!! $banner->url !!}"><img src="{!! $sub_banner->getBannerImage(app('language')->language_code) !!}"></a>
                                </div>
                                <!-- single-banner-end -->
                            </div>
                        @endforeach


                    </div>
                </div>
            </div>
            <!-- right-banner-area-end -->
        </div>
    </div>
</div>
<!-- new-product-area-start -->
<div class="new-product-area ptb-50">
    <div class="container">
        <div class="row">
            @if(!empty($special_products['trending']) && count($special_products['trending'])>0)
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="section-title mb-30">
                        <h2>{{trans("common/label.trending")}}</h2>
                    </div>
                    <!-- single-product-start -->
                    @foreach($special_products['trending'] as $product)
                        <?php $product_translation=$product->getByLanguageId(app('language')->language_id);?>
                        <div class="product-wrapper mb-30">
                            <div class="product-img home-product">
                                <a href="{!! url(LaravelLocalization::getCurrentLocale().'/'.$product->url->target_url) !!}" alt={!! $product->images[0]->alt !!}
                                   title="{!! $product->images[0]->image_name!!}">
                                    <img src="{!! URL::to('https://db-alternateeve-csi7douue.stackpathdns.com/upload/product/'.$product->images[0]->image_name) !!}"
                                         class="primary"/>
                                </a>
                            </div>
                            <div class="product-content">
                                <span>{!! ($product->brand->parent_id==null) ? $product->brand->brand_name : $product->brand->parent->brand_name !!}</span>
                                <h4><a href="{!! url(LaravelLocalization::getCurrentLocale().'/'.$product->url->target_url) !!}" title="{!!
                                        $product_translation->product_name !!}">{!!
                                        $product_translation->product_name !!}</a></h4>

                                {{--<div class="product-rating">
                                    <a href="#"><i class="fa fa-star-o"></i></a>
                                    <a href="#"><i class="fa fa-star-o"></i></a>
                                    <a href="#"><i class="fa fa-star-o"></i></a>
                                    <a href="#"><i class="fa fa-star-o"></i></a>
                                    <a href="#"><i class="fa fa-star-o"></i></a>
                                </div>--}}
                                @if($product->original_price != $product->best_price)
                                    <span class="old-price">({!! getPercentage($product->original_price,$product->best_price) !!})</span>
                                    <span class="old-price"><del> {!!$product->original_price !!} </del></span>
                                    <span class="new-price">{!! $product->best_price !!}</span>
                                @else
                                    <span class="old-price">{!! format_price($product->original_price) !!}</span>
                                @endif

                                {{--<div class="product-cart">
                                    <a href="#" data-toggle="modal" data-target="#mymodal" title="Quick View"><i
                                                class="pe-7s-search"></i></a>
                                    <a href="#" data-toggle="tooltip" title="Wishlist"><i
                                                class="pe-7s-like"></i></a>
                                </div>--}}
                            </div>
                        </div>
                        @endforeach
                </div>
            @endif
            @if(!empty($special_products['best_sale']) && count($special_products['best_sale'])>0)
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="section-title mb-30">
                        <h2>{{trans("common/label.best_sale")}}</h2>
                    </div>
                    <!-- single-product-start -->
                    @foreach($special_products['best_sale'] as $product)
                        <?php $product_translation=$product->getByLanguageId(app('language')->language_id);?>
                        <div class="product-wrapper mb-30">
                            <div class="product-img home-product">
                                <a href="{!! url(LaravelLocalization::getCurrentLocale().'/'.$product->url->target_url) !!}"
                                   title="{!! $product->images[0]->image_name !!}">
                                    <img src="{!! URL::to('https://db-alternateeve-csi7douue.stackpathdns.com/upload/product/'.$product->images[0]->image_name) !!}"
                                         alt="{!! $product->images[0]->alt !!}"
                                         class="primary"/>
                                </a>
                            </div>
                            <div class="product-content">
                                <span>{!! ($product->brand->parent_id==null) ? $product->brand->brand_name : $product->brand->parent->brand_name !!}</span>
                                <h4><a href="{!! url(LaravelLocalization::getCurrentLocale().'/'.$product->url->target_url) !!}" title="{!!
                                        $product_translation->product_name !!}">{!!
                                        $product_translation->product_name !!}</a></h4>

                               {{-- <div class="product-rating">
                                    <a href="#"><i class="fa fa-star-o"></i></a>
                                    <a href="#"><i class="fa fa-star-o"></i></a>
                                    <a href="#"><i class="fa fa-star-o"></i></a>
                                    <a href="#"><i class="fa fa-star-o"></i></a>
                                    <a href="#"><i class="fa fa-star-o"></i></a>
                                </div>--}}
                            @if($product->original_price != $product->best_price)
                                <span class="old-price">({!! getPercentage($product->original_price,$product->best_price) !!})</span>
                                <span class="old-price"><del>{!!$product->original_price !!} </del></span>
                                <span class="new-price">{!! $product->best_price !!}</span>
                            @else
                                <span class="old-price">{!! format_price($product->original_price) !!}</span>
                            @endif

                                {{--<div class="product-cart">
                                    <a href="#" data-toggle="modal" data-target="#mymodal" title="Quick View"><i
                                                class="pe-7s-search"></i></a>
                                    <a href="#" data-toggle="tooltip" title="Wishlist"><i
                                                class="pe-7s-like"></i></a>
                                </div>--}}
                            </div>
                        </div>
                        @endforeach
                </div>
            @endif
            @if(!empty($special_products['top_sale']) && count($special_products['top_sale'])>0)
                <div class="col-lg-4 col-md-4 hidden-sm hidden-xs">
                    <div class="section-title mb-30">
                        <h2>{{trans("common/label.top_rate")}}</h2>
                    </div>
                    <!-- single-product-start -->
                    @foreach($special_products['top_sale'] as $product)
                        <?php $product_translation=$product->getByLanguageId(app('language')->language_id);?>
                        <div class="product-wrapper mb-30">
                            <div class="product-img home-product">
                                <a href="{!! url(LaravelLocalization::getCurrentLocale().'/'.$product->url->target_url) !!}"
                                   title="{!! $product_translation->product_name !!}">
                                    <img src="{!! URL::to('https://db-alternateeve-csi7douue.stackpathdns.com/upload/product/'.$product->images[0]->image_name) !!}"
                                         alt="{!! $product->images[0]->alt !!}"
                                         class="primary"/>
                                </a>
                            </div>
                            <div class="product-content">
                                <span>{!! ($product->brand->parent_id==null) ? $product->brand->brand_name : $product->brand->parent->brand_name !!}</span>
                                <h4><a href="{!! url(LaravelLocalization::getCurrentLocale().'/'.$product->url->target_url) !!}"
                                       title="{!! $product_translation->product_name !!}">{!! $product_translation->product_name !!}</a></h4>

                                {{--<div class="product-rating">
                                    <a href="#"><i class="fa fa-star-o"></i></a>
                                    <a href="#"><i class="fa fa-star-o"></i></a>
                                    <a href="#"><i class="fa fa-star-o"></i></a>
                                    <a href="#"><i class="fa fa-star-o"></i></a>
                                    <a href="#"><i class="fa fa-star-o"></i></a>
                                </div>--}}
                                @if($product->original_price != $product->best_price)
                                    <span class="old-price">({!! getPercentage($product->original_price,$product->best_price) !!})</span>
                                    <span class="old-price"><del>{!! $product->original_price !!}</del></span>
                                    <span class="new-price">{!! $product->best_price !!}</span>
                                @else
                                    <span class="new-price">{!! $product->best_price !!}</span>
                                @endif
                                {{--<div class="product-cart">
                                    <a href="#" data-toggle="modal" data-target="#mymodal" title="Quick View"><i
                                                class="pe-7s-search"></i></a>
                                    <a href="#" data-toggle="tooltip" title="Wishlist"><i
                                                class="pe-7s-like"></i></a>
                                </div>--}}
                            </div>
                        </div>
                        @endforeach
                </div>
            @endif
        </div>
    </div>
</div>
<!-- service-area-2-start -->
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
<!-- service-area-2-end -->
<div class="brand-area ptb-50">
    <div class="container-fluid">
        <div class="row col-lg-12 col-sm-12 col-md-12 col-xs-12 ml-4">
            <div class="brand-active owl-carousel owl-centered">
                @foreach($brands as $brand)
                    @if(!empty($brand->brand_image) && file_exists(public_path().\App\Models\Brand::BRAND_IMAGE_PATH . $brand->brand_image))
                        <div class="col-lg-10">
                            <div class="single-brand">
                                <img class="lazyOwl" style="width: 140px;" data-src="{!! $brand->getImagePath() !!}" alt="{!! $brand->brand_name !!}"/>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</div>



@if(!empty($blog_posts))
<div class="container">
    <div id="latest-news" class="news">
        <div class="page-header">
            <h2>{!! trans("common/label.latest_news")!!}</h2>
        </div>

        <div class="slider-items-products">
            <div id="latest-news-slider" class="product-flexslider hidden-buttons">
                <div class="slider-items slider-width-col6">
                    @foreach($blog_posts as $category)
                        @foreach($category->posts as $post)
                            <div class="item">
                                <div class="jtv-single-blog">
                                    <div class="blog-image"><a href="{!! url(LaravelLocalization::getCurrentLocale().'/'.$post->url->request_url) !!}">
                                            <img src="{!! $post->getCdnImagethumb() !!}" alt="Blog"> </a>
                                    </div>
                                    <div class="blog-content">
                                        <div class="title-desc"><a href="{!! url(LaravelLocalization::getCurrentLocale().'/'.$post->url->request_url) !!}">
                                                <h4>{!! $post->byLanguage(app('language')->language_id,'title') !!}</h4>
                                            </a>
                                            {!! strip_tags(str_limit($post->byLanguage(app('language')->language_id,'article'),200,'...')) !!}
                                        </div>
                                        <div class="blog-info"><span class="author-name"> <i class="fa fa-user"></i>{!! trans('blog.by') !!} <a
                                                        href="#">{!! $post->admin->first_name.' '.$post->admin->last_name !!}</a> </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>
 <!-- the popup of localization -->
  @if(!Cookie::has('zip_code'))
        <div id="dialog-position">
           <a href="#" onclick="$('#language').trigger('click');">{!! (app('language')->language_code == 'fr') ? 'EN' : 'FR' !!}</a>
           <a id="fermer-dialog" href="#"><i  class="fa fa-times"></i></a>
          <h3>{!! trans('product.welcome') !!}</h3>
       
          <h4 class="validateTips">{!! trans('product.welcome_alternateeve') !!}</h4>
          <p>{!! trans('product.zip_code') !!}</p>
           <form id="search-store" action="search_store" method="post">
                <fieldset>
                    <div class="row">
                        <div class="form-group dialog col-lg-offset-2 col-lg-3 col-md-offset-2 col-sm-offset-2 col-md-3 col-xs-offset-1 col-xs-4">
                          <select class="form-control" name="filtre" id="distance">
                            <option value="5">5 Km</option>
                            <option value="10">10 Km</option>
                            <option value="15">15 Km</option>
                            <option value="35">35 Km</option>
                            <option value="50">50 Km</option>
                            <option value="100">100 Km</option>
                          </select>
                        </div> 
                        <label class="col-lg-3 col-sm-3 col-md-3 col-xs-3" for="sel1">{!! trans('product.around') !!}:</label>
                        <div class="form-group col-lg-3 col-sm-3 col-md-3 col-xs-4">
                          <input type="text" class="form-control" id="postal_code" placeholder="{!! trans('product.postal_code') !!}" name="zip">
                          <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                        </div>
                    </div> 
                </fieldset>
            </form>
        </div>
    @endif
    <!--  end of the popup of localization --> 
@endif
@stop