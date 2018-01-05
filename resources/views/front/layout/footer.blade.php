<!-- footer-area-start -->
<footer>
    <!-- footer-top-area-start -->
    <div class="footer-top-area ptb-10">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <!-- single-footer-area-start -->
                    <div class="single-footer">
                        <div class="footer-img mb-50 pt-10 footer-logo">
                            <img style="max-width: 120%;" src="{!! url('/') !!}/images/logo_footer.png" alt="logo2" />
                        </div>
                        <div class="footer-menu">
                            <ul>
                                <span><b>{!! trans("common/label.customers")!!}</b></span>
                                <li> <a href="{!! url(LaravelLocalization::getCurrentLocale().'/how-it-work') !!}">{!! trans("common/label.how_it_work")!!}</a>
                                </li>
                                <li> <a href="{!! url(LaravelLocalization::getCurrentLocale().'/ask-a-product') !!}">{!! trans("common/label.ask_a_product")!!}</a>
                                </li>
                                <li> <a href="{!! url(LaravelLocalization::getCurrentLocale().'/') !!}/faq">{!! trans("common/label.faq")!!}</a>
                                </li>
                                <li><a data-toggle="modal" data-target="#myModal" href="#">{!! trans("common/label.register_login")!!}</a></li>
                            
                            </ul>
                        </div>
                    </div>
                    <!-- single-footer-area-end -->
                </div>
                <div class="col-lg-6 col-md-6 hidden-sm col-xs-12 mt-52 second-footer">
                    <!-- single-footer-area-start -->
                    <div class="single-footer">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-xs-12">
                                <div class="footer-menu">
                                    <span><b>{!! trans("common/label.merchants")!!}</b></span>
                                    <ul>
                                        <li>
                                            <a href="{!! url(LaravelLocalization::getCurrentLocale().'/make-money-with-us') !!}">{!! trans("common/label.make_money")!!}</a>
                                        </li>
                                        <li>
                                            <a href="{!! url(LaravelLocalization::getCurrentLocale().'/knowledge-center') !!}">{!! trans("common/label.knowledge_center")!!}</a>
                                        </li>
                                        <li>
                                            <a href="{!! url(LaravelLocalization::getCurrentLocale().'/business-faq') !!}">{!! trans("common/label.business_faq")!!}</a>
                                        </li>
                                        <li>
                                            <a href="{!! url(LaravelLocalization::getCurrentLocale().'/merchant/login') !!}">{!! trans("common/label.register_your_shop")!!}</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-xs-12">
                                <div class="footer-menu">
                                    <span class="top-link">
                                            <a href="{!! url(LaravelLocalization::getCurrentLocale().'/fondation') !!}">{!! trans("common/label.foundation")!!}</a>
                                     </span>
                                    <ul>
                                        <li>
                                            <a href="{!! url(LaravelLocalization::getCurrentLocale().'/blog-list') !!}">{!! trans("common/label.blog")!!}</a>
                                        </li>
                                        <li>
                                            <a href="{!! url(LaravelLocalization::getCurrentLocale().'/news-media') !!}">{!! trans("common/label.media")!!}</a>
                                        </li>
                                        <li>
                                            <a href="{!! url(LaravelLocalization::getCurrentLocale().'/investors') !!}">{!! trans("common/label.investor")!!}</a>
                                        </li>
                                        <li>
                                            <a href="{!! url(LaravelLocalization::getCurrentLocale().'/contact-us') !!}">{!! trans("common/label.contact_us")!!}</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 " style="margin-top:14px !important;">
                    <div class="single-footer">
                        <div class="footer-icon block2">
                            <a href="#" data-toggle="tooltip" title='{!! trans("common/label.share_on_facebook")!!}'><i class="fa fa-facebook"></i></a>
                            <a href="#" data-toggle="tooltip" title='{!! trans("common/label.share_on_twitter")!!}'><i  class="fa fa-twitter"></i></a>
                            <a href="#" data-toggle="tooltip" title='{!! trans("common/label.email_to_friend")!!}'><i class="fa fa-envelope-o"></i></a>
                            <a href="#" data-toggle="tooltip" title='{!! trans("common/label.pin_on_pintrest")!!}'><i class="fa fa-pinterest"></i></a>
                            <a href="#" data-toggle="tooltip" title='{!! trans("common/label.share_on_google")!!}'><i class="fa fa-google-plus"></i></a>
                        </div>
                        <div class="footer-title">
                            <h3>{!! trans("common/label.newsletter")!!}</h3>
                            <p>{!! trans("common/label.newsletter_text")!!}</p>
                        </div>
                        <div class="footer-box">
                            <form action="{!! url(LaravelLocalization::getCurrentLocale().'/subscribe') !!}" method="post">
                                <input type="text" name="email" class="required email" placeholder='{!! trans("common/label.enter_email_here")!!}'/>
                                <button type="submit" id="subscribe"><i class="fa fa-long-arrow-right"></i></button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- footer-top-area-end -->
    <!-- footer-bottom-area-start -->

    <div class="footer-bottom-area ptb-footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-5 col-sm-6 col-xs-12">
                    <!-- single-footer-area-start -->
                    <div class="copy-right">
                        <p>© 2017 <a href="#">ALTERNATEEVE</a>- {!! trans("common/label.all_right_reserved")!!}</p>
                    </div>
                    <!-- single-footer-area-end -->
                </div>
                <div class="col-lg-6 col-md-7 col-sm-6 col-xs-12">
                    <!-- single-footer-area-start -->
                    <div class="footer-bottom-menu text-right">
                        <nav>
                            <ul>
                                <li><a href="{!! url(LaravelLocalization::getCurrentLocale().'/about-us') !!}">{!! trans("common/label.about_us")!!}</a></li>
                                <li><a href="{!! url(LaravelLocalization::getCurrentLocale().'/terms-conditions') !!}">{!! trans("common/label.terms_conditions")!!}</a></li>
                                <li><a href="{!! url(LaravelLocalization::getCurrentLocale().'/privacy-cookies') !!}">{!! trans("common/label.privacy_cookies")!!}</a></li>
                            </ul>
                        </nav>
                    </div>
                    <!-- single-footer-area-end -->
                </div>
            </div>
        </div>
    </div>
    <!-- footer-bottom-area-end -->
     <!-- the last popup of localization -->
        <div id="dialog-position2" class="hide">
           <a href="#" onclick="$('#language').trigger('click');">{!! (app('language')->language_code == 'fr') ? 'EN' : 'FR' !!}</a>
           <a id="fermer-dialog2" href="#"><i  class="fa fa-times"></i></a>
          <h3>{!! trans('product.welcome') !!}</h3>
       
          <h4 class="validateTips">{!! trans('product.welcome_alternateeve') !!}</h4>
          <p>{!! trans('product.zip_code') !!}</p>
             <?php 
                    $distance = '';
                    $radius = getRadiusData(); 
                    $distance = Cookie::has('distance') ? Cookie::get('distance') : '';
            ?>  
           <form id="search-store" action="" method="post">
                <fieldset>
                    <div class="row">
                        <div class="form-group dialog col-lg-offset-2 col-lg-3 col-md-offset-2 col-sm-offset-2 col-md-3 col-xs-offset-1 col-xs-4">
                          <select class="form-control" name="filtre" id="distance2">
                              @foreach($radius as $index=>$value)
                                    <option {!! ($distance == $index) ? "selected" : "" !!} value="{!! $index !!}">{!! $value !!}</option>
                              @endforeach
                          </select>
                        </div> 
                        <label class="col-lg-3 col-sm-3 col-md-3 col-xs-3" for="sel1">{!! trans('product.around') !!}:</label>
                        <div class="form-group col-lg-3 col-sm-3 col-md-3 col-xs-4">
                          <input type="text" class="form-control" value="{!! Cookie::has('zip_code') ? Cookie::get('zip_code') : '' !!}" id="postal_code2" placeholder="{!! trans('product.postal_code') !!}" name="zip">
                          <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                        </div>
                    </div> 
                </fieldset>
            </form>
        </div>
   

    <!--  end of the last popup of localization -->
</footer>
<!-- footer-area-end -->
<!-- all js here -->

@if($local_dev == "non")
<!-- jquery latest version -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<!-- bootstrap js -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js "></script>
<!-- jquery-ui js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.0/jquery-ui.min.js"></script>
<!-- owl.carousel js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js"></script>
<!-- jquery.magnific-popup.min.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
<!-- jquery.nivo.slider.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-nivoslider/3.2/jquery.nivo.slider.min.js"></script>
<!-- chosen.jquery.min.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.6.2/chosen.jquery.min.js"></script>
<!-- jquery.elevateZoom-3.0.8.min.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/elevatezoom/3.0.8/jquery.elevatezoom.min.js"></script>
@else
<!-- jquery latest version -->
<script src="{!! URL::to('/') !!}/frontend/js/vendor/jquery-1.12.0.min.js"></script>
<!-- bootstrap js -->
<script src="{!! URL::to('/') !!}/frontend/js/bootstrap.min.js"></script>
<!-- jquery-ui js -->
<script src="{!! URL::to('/') !!}/frontend/js/jquery-ui.min.js"></script>
<!-- owl.carousel js -->
<script src="{!! URL::to('/') !!}/frontend/js/owl.carousel.min.js"></script>
<!-- jquery.magnific-popup.min.js -->
<script src="{!! URL::to('/') !!}/frontend/js/jquery.magnific-popup.min.js"></script>
<!-- jquery.nivo.slider.js -->
<script src="{!! URL::to('/') !!}/frontend/js/jquery.nivo.slider.js"></script>
<!-- chosen.jquery.min.js -->
<script src="{!! URL::to('/') !!}/frontend/js/chosen.jquery.min.js"></script>
<!-- jquery.elevateZoom-3.0.8.min.js -->
<script src="{!! URL::to('/') !!}/frontend/js/jquery.elevateZoom-3.0.8.min.js"></script>
@endif


<!-- meanmenu js -->
<script src="{!! URL::to('/') !!}/frontend/js/jquery.meanmenu.js"></script>

{!! Html::script('js/jquery.validate.min.js') !!}
<!-- wow js -->
<script src="{!! URL::to('/') !!}/frontend/js/wow.min.js"></script>
<!-- jquery.mixitup.min.js -->
<script src="{!! URL::to('/') !!}/frontend/js/jquery.mixitup.min.js"></script>

<!-- jquery.countdown.min.js -->
<script src="{!! URL::to('/') !!}/frontend/js/jquery.countdown.min.js"></script>
<!-- autocomplete -->
<script src="{!! URL::to('/') !!}/frontend/js/jquery.easy-autocomplete.min.js"></script>
<!-- plugins js -->
<script src="{!! URL::to('/') !!}/frontend/js/plugins.js"></script>
<!-- main js -->
<script src="{!! URL::to('/') !!}/frontend/js/main.js"></script>
<!-- jquery cookie -->
<script src="{!! URL::to('/') !!}/frontend/js/jquery.cookie.js"></script>

{!! Html::script('frontend/js/validation.js') !!}
@if(isset($language) && app('language')->language_code==\App\Models\Language::FRENCH_CODE)
    {!! Html::script('frontend/js/validation_message_fr.js') !!}
@endif
{!! Html::script('frontend/js/product_detail.js') !!}
{!! Html::script('frontend/js/catalog.js') !!}
{!! Html::script('frontend/js/my_account.js') !!}
{!! Html::script('frontend/js/cloud-zoom.js') !!}
{!! Html::script('frontend/js/jquery.flexslider.js') !!}
{!! Html::script('frontend/js/jquery.rating.js') !!}
{!! Html::script('frontend/js/owl.carousel.min.js') !!}
{!! Html::script('frontend/js/loadingoverlay.min.js') !!}
{!! Html::script('frontend/js/jquery.panzoom.js') !!}
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
{!! Html::script('frontend/js/product_search.js') !!}
{!! Html::script('frontend/js/order.js') !!}
{!! Html::script('frontend/js/search-local-product.js') !!}
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>


<script type="text/javascript" async src="//assets.pinterest.com/js/pinit.js"></script>
<script>
    var $section = $('#auto-contain');
    $section.find('.panzoom').panzoom({
        $zoomIn: $section.find(".zoom-in"),
        $zoomOut: $section.find(".zoom-out"),
        $zoomRange: $section.find(".zoom-range"),
        $reset: $section.find(".reset"),
//        startTransform: 'scale(1.1)',
        increment: 0.1,
        minScale: 0.5,
        contain: 'automatic'
    });
    jQuery("#latest-news-slider .slider-items").owlCarousel({
        autoplay: !0,
        items: 3,
        itemsDesktop: [1024, 3],
        itemsDesktopSmall: [900, 2],
        itemsTablet: [640, 2],
        itemsMobile: [480, 1],
        navigation: !0,
        navigationText: ['<a class="flex-prev"></a>', '<a class="flex-next"></a>'],
        slideSpeed: 500,
        pagination: !1
    });
</script>
