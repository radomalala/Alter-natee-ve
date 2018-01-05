@extends('front.layout.master')

@section('content')
    <div class="account-area mt-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    @include('notification')
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="login-area">
                        <div class="section-title mb-20">
                            <h2>{!! trans("merchant.merchant_login")!!}</h2>
                        </div>
                        <p></p>
                        {!! Form::open(['url' => url(LaravelLocalization::getCurrentLocale().'/merchant/login'), 'id'=>'login_form', 'method' => 'post', 'role' => 'form' ,'class'=>'form-horizontal','autocomplete'=>'off']) !!}
                        <div class="">
                            <label for="username">{!! trans("form.email_address")!!} <span>*</span></label>
                            {{ Form::text('email', '',['class'=>"required"]) }}
                        </div>
                        <div class="">
                            <label for="password">{!! trans("form.password")!!}<span>*</span></label>
                            {{ Form::password('password',['class'=>"required"]) }}
                        </div>

                        <div class="checkbox mg-18">
                            <label for="rememberme">
                                <input type="checkbox" name='memoty'>
                                {!! trans("form.remember")!!}
                            </label>
                        </div>
                        <button type="submit" id="login-btn">{!! trans("form.login")!!}</button>

                        <a href="{{ url(LaravelLocalization::getCurrentLocale().'/forgot-password') }}">{!! trans("form.forgot_password")!!}</a>

                        {{Form::close()}}
                    </div>
                    <!-- login-area-end -->
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <!-- register-area-start -->
                    <div class="register-area ptb-50">
                        <div class="section-title mb-20 ptb-50">

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
                    </div>
                    <!-- register-area-end -->
                </div>
            </div>
            <div class="register-area  mg-18">
                <!-- login-area-start -->
                <div class="login-area">

                    <div class="section-title mb-20">
                        <h2>{!! trans("form.new_member")!!}</h2>
                    </div>
                    <a class="btn btn-default register-btn" href="{!! url(LaravelLocalization::getCurrentLocale().'/merchant/sign-up') !!}">{!! trans("form.create_an_account")!!}</a><br/> </div>
                <!-- login-area-end -->
            </div>
        </div>
    </div>
@stop

