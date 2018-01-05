@extends('front.layout.master')

@section('content')
    <button data-toggle="modal" class="hidden" data-target="#myModal" id="show_popup_login_auth" href="#">{!! trans('common/label.sign_in') !!}</button>
    @include('front.auth.login_auth_popup');
@stop

