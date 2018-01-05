@extends('front.layout.master')

@section('content')
    <div class="account-area ptb-50">
        <div class="container">
            <div class="row">
                @include('notification')
                <div class="register-area">
                    {!! Form::open(['url' => url(LaravelLocalization::getCurrentLocale().'/register'), 'id'=>'account_form', 'method' => 'post', 'role' => 'form','class'=>'form-horizontal','autocomplete'=>'off']) !!}

                    <input type="hidden" name="role_id" value="{!! $role_id !!}">
                    <div class="col-md-12 {!! ($role_id==2) ? "hidden": "" !!}" style="text-align: center">
                        <b style="font-size: 18px;">{!! trans('common/label.shopping_preference') !!} *</b><br/><br/>

                        <div class="social-left">
                            <span class="mr-lft-5px">{!! trans("common/label.store_product_info")!!}:</span>
                            <?php $radius = getRadiusData(); ?>
                            <select name="radius" class="mr-lft-5px radius-input">
                                @foreach($radius as $index=>$value)
                                    <option value="{!! $index !!}">{!! $value !!}</option>
                                @endforeach
                            </select>
                            <span class="label-text mr-lft-5px">{!! trans("common/label.around")!!}</span>
                            <span class="mr-lft-5px">
                                <input type="text" name="zip_code" class="radius-input required" placeholder="{!! trans("common/label.postal_code")!!}">
                            </span>
                        </div>
                    </div>
                    <div class="col-md-12">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 mg-18">
                    <div class="section-title mb-20">
                        <h2>
                            @if($role_id==1)
                                {!! trans('form.member_registration') !!}
                            @else
                                {!! trans('form.merchant_registration') !!}
                            @endif
                        </h2>
                    </div>
                    <!-- register-area-start -->
                    <div class="register-area">
                        <div class="">
                            <label for="username">{!! trans("form.first_name")!!} <span>*</span></label>
                            {{Form::text('first_name', '',['class'=>'required'])}}
                        </div>
                        <div class="">
                            <label for="username">{!! trans("form.last_name")!!} <span>*</span></label>
                            {{Form::text('last_name', '',['class'=>'required'])}}
                        </div>

                        <div class="">
                            <label for="username">{!! trans("form.email_address")!!} <span>*</span></label>
                            {{Form::text('email', '',['class'=>'required'])}}
                        </div>
                        <div class="">
                            <label for="phone_number">{!! trans("form.phone_number")." ".trans('form.for_phone')!!} </label>
                            {{Form::text('phone_number', '',['class'=>''])}}
                        </div>

                        <div class="">
                            <label for="password">{!! trans("form.password")!!}<span>*</span></label>
                            {{Form::password('password',['class'=>'required', 'id'=>"password"])}}
                        </div>
                        <div class="">
                            <label for="password">{!! trans("form.confirm_password")!!}<span>*</span></label>
                            {{Form::password('confirm_password', ['class'=>'required', 'id'=>"password"])}}
                        </div>
                        <input type="hidden" name="is_active" value="1">
                        <button type="submit">{!! trans("form.submit_button")!!}</button>
                    </div>
                    <!-- register-area-end -->
                </div>

                {!! Form::close() !!}
                <div class="col-lg-5 col-md-6 col-sm-6 col-xs-12 social-media">
                    <!-- register-area-start -->
                    <div class="register-area ptb-50">
                        <p><a href="{{ url(LaravelLocalization::getCurrentLocale().'/auth/facebook')}}" class="btn btn-facebook"><span><i
                                            class="fa fa-facebook"></i></span><span class="mr-lft-5px">{!! trans("common/label.sign_in_facebook")!!}</span></a>
                        </p>

                        <p><a href="{{ url(LaravelLocalization::getCurrentLocale().'/auth/google')}}" class="btn btn-google"><span><i
                                            class="fa fa-google"></i></span><span
                                        class="mr-lft-5px">{!! trans("common/label.sign_in_google")!!}</span></a></p>

                        <p><a href="{{ url(LaravelLocalization::getCurrentLocale().'/auth/twitter')}}" class="btn btn-twitter"><span><i
                                            class="fa fa-twitter"></i></span><span class="mr-lft-5px">{!! trans("common/label.sign_in_twitter")!!}</span></a>
                        </p>
                    </div>
                    <!-- register-area-end -->
                </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@stop

