@extends('front.layout.master')

@section('content')
    <div id="googleMap" class="mr-t-20"></div>
    <div class="contact-area ptb-25">
        <div class="container">
            <div class="row contact-us-content">
                @include('notification')
                <div class="col-lg-12 contact-header">
                    <div class="section-title mb-30">
                        <h2>{!! trans('contact.title') !!}</h2>
                        <span style="margin-left:30px ;">
                            <a href="#" class="btn btn-facebook"><span><i class="fa fa-facebook"></i></span></a>
                            <a href="#" class="btn btn-linkedin"><span><i class="fa fa-linkedin"></i></span></a>
                            <a href="#" class="btn btn-google"><span><i class="fa fa-google"></i></span></a>
                            <a href="#" class="btn btn-facebook"><span><i class="fa fa-twitter"></i></span></a>
                            </span>
                        <p>Lorem ipsum dolor sit amet, Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat consectetuer adipiscing elit, sed diam nonummy nibh euismod tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</p>

                    </div>
                </div>
                <!-- BEGIN FORM-->
                <form action="{!! url(LaravelLocalization::getCurrentLocale().'/contact-us') !!}" class="default-form" role="form" method="post">
                    <div class="form-group">
                        <label for="name">{!! trans('contact.name') !!}</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="form-group">
                        <label for="email">{!! trans('contact.email') !!} <span class="require">*</span></label>
                        <input type="text" class="form-control" id="email" name="email">
                    </div>
                    <div class="form-group">
                        <label for="email">{!! trans('contact.subject') !!}<span class="require">*</span></label>
                        <select name="subject">
                            <option value="{!! trans('contact.general_request') !!}">{!! trans('contact.general_request') !!}</option>
                            <option value="{!! trans('contact.error_product_page') !!}">{!! trans('contact.error_product_page') !!}</option>
                            <option value="{!! trans('contact.best_price_founded') !!}">{!! trans('contact.best_price_founded') !!}</option>
                            <option value="{!! trans('contact.support') !!}">{!! trans('contact.support') !!}</option>
                            <option value="{!! trans('contact.press') !!}">{!! trans('contact.press') !!}</option>
                            <option value="{!! trans('contact.investors') !!}">{!! trans('contact.investors') !!}</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="message">{!! trans('contact.message') !!}</label>
                        <textarea class="form-control" rows="8" id="message" name="message"></textarea>
                    </div>
                    <div class="padding-top-20">
                        <button type="submit" class="btn btn-primary">{!! trans('contact.send') !!}</button>
                    </div>
                </form>
                <!-- END FORM-->


            </div>
        </div>
    </div>
@stop

@section('additional-script')
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBTB5QAfpeKIFx-LnjVnVV1mIVWQUjZ0TU&libraries=places"  type="text/javascript"></script>
@stop
@section('footer-script')
    <script type="text/javascript">
        /* Google Map js */
        function initialize() {
            var map = new google.maps.Map(document.getElementById('googleMap'), {
                center: {lat: 45.5015, lng: -73.5684},
                zoom: 15
            });

            var infowindow = new google.maps.InfoWindow();
            var service = new google.maps.places.PlacesService(map);

            service.getDetails({
                placeId: 'ChIJqc7gmEQayUwRON6JKxG6eLc'
            }, function (place, status) {
                if (status === google.maps.places.PlacesServiceStatus.OK) {
                    var marker = new google.maps.Marker({
                        map: map,
                        position: place.geometry.location
                    });
                    google.maps.event.addListener(marker, 'click', function () {
                        infowindow.setContent('<div><strong>' + place.name + '</strong><br>' +
                                place.formatted_address + '</div>');
                        infowindow.open(map, this);
                    });
                }
            });
        }
        google.maps.event.addDomListener(window, 'load', initialize);
    </script>

@stop
