@extends('front.layout.master')

@section('content')

    <?php
     $merchant_count = 0;
    foreach ($order->orderItems as $item){
        $merchant_count+=getMerchantCount($item);
    }
    ?>

    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-offset-3 mr-t-20">
                <div class="entry-header text-center mb-20">
                    <p><strong>{!! trans('common/label.thank_you_order') !!}</strong></p>
                </div>
                <div class="entry-content text-center order-confirm-text">
                    <p class="">{!! $merchant_count." ".trans('common/label.confirmation_text_1') !!}</p>
                    <p class="second-text">{!! trans('common/label.confirmation_text_2') !!} <a class="order-link" href="{!! url('customer/request') !!}">{!! trans('common/label.confirmation_link_text') !!}</a></p>
                    <a href="{!! url(LaravelLocalization::getCurrentLocale().'/') !!}">{!! trans('common/label.return_to_home') !!}</a>
                </div>
            </div>
        </div>
        <div class="service-area-2 ptb-50">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
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
                    <div class="col-lg-4 col-md-4 hidden-sm col-xs-12">
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
@stop