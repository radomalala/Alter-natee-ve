<header>
    <!-- fixed-header-area-start -->
{{--
    <div class="fixed-header-area" id="sticky-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-md-2">
                    <!-- logo-start -->
                    <div class="logo home-page-sticky-logo">
                        <a href="{!! URL::to('/') !!}"><img src="{!! URL::to('/') !!}/images/logo.png" alt="logo"/></a>

                    </div>
                    <!-- logo-end -->
                </div>
                <div class="col-lg-8 col-md-7">
                    <!-- mean-menu-area-start -->
                    <div class="mean-menu-area">
                        <div class="mean-menu text-center">
                            <nav>
                                <ul>
                                    <li><a href="{!! url('/') !!}">{!! trans('common/label.home') !!}</a>

                                    </li>
                                    <li><a href="{!! url("search")."?q=" !!}">{!! trans('common/label.catalogue') !!}</a>

                                    </li>
                                    <li><a href="{!! URL::to('/ask-product') !!}">{!! trans('common/label.ask_a_product') !!}</a>

                                    </li>
                                    <li class="static"><a href="{!! URL::to('blog-list') !!}">{!! trans('common/label.blog') !!}</a>
                                    </li>
                                    <li><a href="{!! URL::to('/') !!}/contact-us">{!! trans('common/label.foundation') !!}</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <!-- mean-menu-area-end -->
                </div>
                <div class="col-lg-2 col-md-3">
                    <!-- mini-cart-total-start -->
                    @include('front.layout.cart-recent')
                    <!-- mini-cart-end -->
                </div>
            </div>
        </div>
    </div>
--}}
    <!-- fixed-header-area-end -->

   <!-- header-top-area-start -->

    <div class="header-info alert alert-danger fade in alert-dismissable text-center">
        <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
        <strong>{!! trans('common/label.header_info_msg_1') !!}</strong> {!! trans('common/label.header_info_msg_2') !!}<a href="{!! url('contact-us') !!}">{!! trans('common/label.header_msg_link') !!}</a>
    </div>

<!-- Modif STIAN start -->
<div class="header-top-area ptb-15">
        <div class="container" id="header-height">
            <div class="row">
                <!-- header-top-left-start -->
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    @if(Cookie::has('zip_code') && Cookie::has('distance'))
                        <p class="area" style="color: #333;"> {!! trans('product.shopping_area') !!} : <strong>{!! Cookie::get('distance') !!} km {!! trans('product.around') !!} {!! Cookie::get('zip_code') !!}</strong></p> 
                    @endif
                </div>
                <!-- header-top-left-end -->
                <!-- header-top-right-start -->
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="header-account text-right">
                        <ul>
                            <a href="#" id="change-location" style="color: #333;"><i class="fa fa-location-arrow "></i>&nbsp;&nbsp;{!! trans('product.change_location') !!}</a>  
                        </ul>
                    </div>
                </div>
                <!-- header-top-right-end -->
            </div>
        </div>
    </div>
                            
    </div>
    <!-- header-top-area-end -->
    <!-- header-mid-area-start --> 
    <div class="container">
            <div class="row">
                <!-- header-top-left-start -->
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <!-- social-icon-start -->
<!--                     <div class="social-icon">
                        {!! Form::open(array('url' =>'search' ,'method'=>'GET','id' =>'language_form','class'=>'language-convert')) !!}
                       
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                <img src="{!! URL::to('/') !!}/images/icone_language.png" alt=""/>
                            </div>
                            <div class="container-language col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" id="language" value="{!! (app('language')->language_code == 'fr') ? 'en' : 'fr' !!}" type="button">{!! (app('language')->language_code == 'fr') ? 'EN' : 'FR' !!}</button>
                                </span>
                            </div>
                        </div>
                        {{-- {!! Form::select('language', ['en' => 'English', 'fr' => 'French'],(app('language')) ? app('language')->language_code : null,['class'=>'form-control required','id'=>'language']) !!} --}}
                        {!! Form::close() !!}
                    </div> -->
                    <!-- social-icon-end -->
                </div>
                <!-- header-top-left-end -->
                <!-- header-top-right-start -->
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="header-account text-right">
                        <ul>

                            <li>
                             <a href="#" onclick="$('#language').trigger('click');">{!! (app('language')->language_code == 'fr') ? 'EN' : 'FR' !!}</a>
                                    {!! Form::open(array('url' =>'search' ,'method'=>'GET','id' =>'language_form','class'=>'language-convert')) !!}
                                        <div class="ol-lg-6 col-md-6 col-sm-6 col-xs-6 hidden">

                                            <span class="input-group-btn">
                                                <button class="btn btn-link" id="language" value="{!! (app('language')->language_code == 'fr') ? 'en' : 'fr' !!}" type="button">{!! (app('language')->language_code == 'fr') ? 'EN' : 'FR' !!}</button>
                                            </span>
                                        </div>
                                    {{-- {!! Form::select('language', ['en' => 'English', 'fr' => 'French'],(app('language')) ? app('language')->language_code : null,['class'=>'form-control required','id'=>'language']) !!} --}}
                                    {!! Form::close() !!}
                                <!-- <a href="{!! url(LaravelLocalization::getCurrentLocale().'/wishlist') !!}" title="Wishlist">
                                    <i class="pe-7s-like"></i>{!! trans("common/label.wishlist")!!}
                                </a> -->
                            </li>

                            <?php 
                               // $name = ($is_user_login) ? Auth::user()->first_name : trans('common/label.your_account')
                                $name = ($is_user_login) ? Auth::user()->first_name .' '. Auth::user()->last_name : trans('common/label.connexionLabel')  
                            ?> 
                            @if($is_user_login)

                                <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">{!! $name !!}
                                    <!-- <img class="img-circle" width="35" src="{!! URL::to('/') !!}/images/sign_in_image.png"> -->                  
                                <!--     <b class="fa fa-user"></b>                  
                                    <b class="caret"></b> -->
                                </a>
                                <ul class="dropdown-menu">
                                    @if(!$is_user_login || Auth::user()->role_id==1)
                                        <!-- <li><a href="{!! url(LaravelLocalization::getCurrentLocale().'/customer') !!}">{!! trans('common/label.your_account') !!}</a></li> -->
                                        <li><a href="{!! url(LaravelLocalization::getCurrentLocale().'/customer') !!}">{!! trans('common/label.your_account') !!}</a></li>
                                        <li><a href="{!! url(LaravelLocalization::getCurrentLocale().'/customer/request') !!}">{!! trans('common/label.your_orders') !!}</a></li>
                                        @if($is_user_login)
                                            <li><a href="{!! url(LaravelLocalization::getCurrentLocale().'/logout') !!}">{!! trans('common/label.sign_out')!!}</a></li>
                                        @else
                                            <li><a href="{!! url(LaravelLocalization::getCurrentLocale().'/login') !!}">{!! trans('common/label.sign_in') !!}</a></li>
                                        @endif
                                    @else
                                        <li><a href="{!! url(LaravelLocalization::getCurrentLocale().'/merchant') !!}">{!! trans('common/label.shop_account') !!}</a></li>
                                        <li><a href="{!! url(LaravelLocalization::getCurrentLocale().'/merchant/request') !!}">{!! trans('common/label.order_request') !!}</a></li>
                                        <li><a href="{!! url(LaravelLocalization::getCurrentLocale().'/merchant') !!}">{!! trans('common/label.finance') !!}</a></li>
                                        @if($is_user_login)
                                            <li><a href="{!! url(LaravelLocalization::getCurrentLocale().'/logout') !!}">{!! trans('common/label.sign_out')!!}</a></li>
                                        @else
                                            <li><a href="{!! url(LaravelLocalization::getCurrentLocale().'/login') !!}">{!! trans('common/label.sign_in') !!}</a></li>
                                        @endif
                                    @endif
                                </ul>
                                </li>

                            @else
                                <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">{!! $name !!}
                                    <!-- <img class="img-circle" width="35" src="{!! URL::to('/') !!}/images/sign_in_image.png"> -->                  
                                <!--     <b class="fa fa-user"></b>                  
                                    <b class="caret"></b> -->
                                </a>
                                <ul class="dropdown-menu">
                                    @if(!$is_user_login || Auth::user()->role_id==1)
                                        <!-- <li><a href="{!! url(LaravelLocalization::getCurrentLocale().'/customer') !!}">{!! trans('common/label.your_account') !!}</a></li> -->
                                        <li><a href="{!! url(LaravelLocalization::getCurrentLocale().'/customer') !!}">{!! trans('common/label.your_account') !!}</a></li>
                                        <li><a href="{!! url(LaravelLocalization::getCurrentLocale().'/customer/request') !!}">{!! trans('common/label.your_orders') !!}</a></li>
                                        @if($is_user_login)
                                            <li><a href="{!! url(LaravelLocalization::getCurrentLocale().'/logout') !!}">{!! trans('common/label.sign_out')!!}</a></li>
                                        @else
                                            <li><a href="{!! url(LaravelLocalization::getCurrentLocale().'/login') !!}">{!! trans('common/label.sign_in') !!}</a></li>
                                        @endif
                                    @else
                                        <li><a href="{!! url(LaravelLocalization::getCurrentLocale().'/merchant') !!}">{!! trans('common/label.shop_account') !!}</a></li>
                                        <li><a href="{!! url(LaravelLocalization::getCurrentLocale().'/merchant/request') !!}">{!! trans('common/label.order_request') !!}</a></li>
                                        <li><a href="{!! url(LaravelLocalization::getCurrentLocale().'/merchant') !!}">{!! trans('common/label.finance') !!}</a></li>
                                        @if($is_user_login)
                                            <li><a href="{!! url(LaravelLocalization::getCurrentLocale().'/logout') !!}">{!! trans('common/label.sign_out')!!}</a></li>
                                        @else
                                            <li><a href="{!! url(LaravelLocalization::getCurrentLocale().'/login') !!}">{!! trans('common/label.sign_in') !!}</a></li>
                                        @endif
                                    @endif
                                </ul>
                                </li>
                            @endif

                            <li>
                                @include('front.layout.cart-recent')
                            </li>

                           
                            <!-- li><a href="{!! url(LaravelLocalization::getCurrentLocale().'/wishlist') !!}" title="Wishlist"><i
                                            class="pe-7s-like"></i>{!! trans("common/label.wishlist")!!}</a></li -->

                        </ul>
                    </div>
                </div>
                <!-- header-top-right-end -->
            </div>
        </div>
    <!-- header-top-area-end -->
    <!-- header-mid-area-start -->

<!-- Modif STIAN start -->

    <div class="mean-menu-area ptb-30">
        <div class="container">
            <div class="row">
                <!-- header-search-end -->
                <!-- logo-start -->
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="logo text-center home-page-logo">
                        <a href="{!! URL::to('/') !!}"><img style="max-width: 180%;" src="{!! URL::to('/') !!}/images/logo.png" alt="logo"/></a>

                        <!-- div style="width: 282px;"><span class="logo-txt-g">Achetez localemenet</span> <span
                                    class="logo-txt-o">au meilleur prix d'internet</span></div -->
                    </div>
                </div>
                <!-- logo-end -->
                <!-- mini-cart-total-start -->
               <!--  @include('front.layout.cart-recent') -->
                <!-- mini-cart-end -->
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                    <div class="row col-lg-6" style="margin-left: 49.6%;">
                        {!! Form::open(array('url' => 'search','method' => 'GET','id' => 'form-search')) !!}
                            <div class="input-group my-group"> 

                                {!! Form::select('category-search', (app('language')->language_id == 1) ? $categories_search['en'] : $categories_search['fr'], null, ['class' => "selectpicker form-control", 'id' => 'selected-category', 'data-live-search' => 'true' ]) !!}

                                {!! Form::text('q', null, ['placeholder' => "search here", "class" => "form-control", "id" => "search-input"]) !!}

                                <span class="input-group-btn">
                                    <button class="btn btn-default-search" style="margin-left: -2px;" type="submit"><i class="pe-7s-search"></i></button>
                                </span>

                            </div>
                         
                        {!! Form::close() !!}                        
                        
                    </div>

                </div>
                
            </div>
        </div>
    </div>

  
    <!-- header-mid-area-end -->
    <!-- mean-menu-area-start -->
    <div class="mean-menu-area hidden-sm hidden-xs">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="mean-menu text-center">
                        <nav>
                            <ul>
                                <li><a href="{!! url(LaravelLocalization::getCurrentLocale().'/') !!}">{!! trans('common/label.home') !!}</a>

                                </li>
                                <li><a href="{!! url(LaravelLocalization::getCurrentLocale()."/search")."?q=" !!}">{!! trans('common/label.catalogue') !!}</a>

                                </li>
                                <li><a href="{!! url(LaravelLocalization::getCurrentLocale().'/ask-product') !!}">{!! trans('common/label.ask_a_product') !!}</a>

                                </li>
                                <li class="static"><a href="{!! url(LaravelLocalization::getCurrentLocale().'/blog-list') !!}">{!! trans('common/label.blog') !!}</a>

                                </li>
                                <li><a href="{!! url(LaravelLocalization::getCurrentLocale().'/fondation') !!}">{!! trans('common/label.foundation') !!}</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- mobile-menu-area-start -->
    <div class="mobile-menu-area hidden-md hidden-lg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="mobile-menu">
                        <nav id="mobile-menu-active">
                            <ul id="nav">
                                <li><a href="{!! url(LaravelLocalization::getCurrentLocale().'/') !!}">{!! trans('common/label.home') !!}</a>

                                </li>
                                <li><a href="{!! url(LaravelLocalization::getCurrentLocale()."/search")."?q=" !!}">{!! trans('common/label.catalogue') !!}</a>

                                </li>
                                <li><a href="{!! url(LaravelLocalization::getCurrentLocale().'/ask-product') !!}">{!! trans('common/label.ask_a_product') !!}</a>

                                </li>
                                <li class="static"><a href="{!! url(LaravelLocalization::getCurrentLocale().'/blog-list') !!}">{!! trans('common/label.blog') !!}</a>

                                </li>
                                <li><a href="{!! url(LaravelLocalization::getCurrentLocale().'/fondation') !!}">{!! trans('common/label.foundation') !!}</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- mobile-menu-area-end -->
</header>
