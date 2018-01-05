{{-- @extends('front.layout.master') --}}


    <div class="account-area ">
           
            <div class="row">
                <div class="col-lg-12">
                    @include('notification')
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="login-area">
                        <!-- div class="section-title mb-20">
                            <h2>{!! trans("form.member_login")!!}</h2>
                        </div -->
                        <p></p>
                        {!! Form::open(['url' => url(LaravelLocalization::getCurrentLocale().'/login'), 'id'=>'login_form', 'method' => 'post', 'role' => 'form' ,'class'=>'form-horizontal','autocomplete'=>'off']) !!}
                        <div class="">
                           {{--  <label for="username">{!! trans("form.email_address")!!} <span>*</span></label> --}}
                            {{ Form::text('email', '',['class'=>"required", 'placeholder' => trans("form.email_address")]) }}
                        </div>
                        <div class="">
                            {{-- <label for="password">{!! trans("form.password")!!}<span>*</span></label> --}}
                            {{ Form::password('password',['class'=>"required", 'placeholder' => trans("form.password")]) }}
                        </div>

                        <div class="checkbox mg-18">
                            <label for="rememberme">
                                <input type="checkbox" name='memoty'>
                                {!! trans("form.remember")!!}
                            </label>
                        </div>    

                        <a href="{{ url(LaravelLocalization::getCurrentLocale().'/forgot-password') }}">{!! trans("form.forgot_password")!!}</a>
                        <div class="login-footer-area text-center">
                                <button type="submit" id="login-btn">{!! trans("form.login")!!}</button>
                        </div>
                        {{Form::close()}}
                    </div>
                    <!-- login-area-end -->
                </div>
            </div>
                    <!-- register-area-start -->
                    <div class="register-area text-center">
                        <div class="section-title mb-20">

                            <div class="row">
                                <p class="login-sign_in">{!! trans("common/label.sign_in_with")!!}</p>
                                <div class="col-md-4">
                                     <p><a href="{{url(LaravelLocalization::getCurrentLocale().'/auth/facebook')}}" class="btn btn-facebook"><span><i
                                                        class="fa fa-facebook"></i></span>{{-- <span class="mr-lft-5px">{!! trans("common/label.sign_in_facebook")!!}</span> --}}</a>
                                        
                                    </p>
                                </div>
                                <div class="col-md-4">
                                        <p><a href="{{ url(LaravelLocalization::getCurrentLocale().'/auth/google')}}" class="btn btn-google"><span><i
                                                    class="fa fa-google"></i></span>{{-- <span
                                                class="mr-lft-5px">{!! trans("common/label.sign_in_google")!!}</span></p> --}}</a>
                                </div>
                                <div class="col-md-4">
                                    <p><a href="{{ url(LaravelLocalization::getCurrentLocale().'/auth/twitter')}}" class="btn btn-twitter"><span><i
                                                            class="fa fa-twitter"></i></span>{{-- <span class="mr-lft-5px">{!! trans("common/label.sign_in_twitter")!!}</span> --}}</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- register-area-end -->
            
    </div>


