@extends('front.layout.master')

@section('content')
<div class="section-element-area ptb-50">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="faq-title text-center mb-30">
                    <h2>{!! trans('faq.title') !!}</h2>
                    <p>{!! trans('faq.last_updated') !!} {!! \Carbon\Carbon::now()->format('M d, Y') !!}</p>
                </div>
            </div>
            <div class="col-lg-12 mb-30">
                <div class="collapses-group">
                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                        @foreach($faqs as $index=>$faq)
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingOne">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse{!! $faq->id !!}" aria-expanded="true" aria-controls="collapse{!! $faq->id !!}">
                                        {!! $faq->byLanguage(app('language')->language_id,'question') !!}
                                    </a>
                                </h4>
                            </div>
                            <div id="collapse{!! $faq->id !!}" class="panel-collapse collapse {!! ($index==0) ? "in" : "" !!}" role="tabpanel" aria-labelledby="heading{!! $faq->id !!}">
                                <div class="panel-body">
                                    {!! $faq->byLanguage(app('language')->language_id,'answer') !!}
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="{!! ((app('language')->language_id==2)? "col-lg-6 col-md-offset-3 ": "col-lg-4 col-md-offset-4") !!}">
                <div class="question-area text-center">
                    <h2>{!! trans('faq.have_question') !!}</h2>
                    <a href="{!! url('contact-us') !!}">{!! trans('faq.contact_us') !!}</a>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

