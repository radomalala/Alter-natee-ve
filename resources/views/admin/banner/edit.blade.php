@extends($layout)
@section('content')
    <section class="content-header">
        @include('notification')
        <h1>
            Add New Banner
        </h1>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-info alert-dismissible">
                    Recommended Main Banner Size: 547 x 420, Side Banner Size: 242 x 195
                </div>

                <div class="box box-primary">
                       {{ Form::model($banner, array('method' => 'PATCH', 'url' => array('admin/banner', $banner->banner_id),'class'=>'validate_form','files' => true)) }}
                    <div class="box-body">
                        <div class="form-group">
                            <label for="page_title">Banner Name</label>
                            {!! Form::text('banner_title', null,array('class'=>'form-control required', 'placeholder'=>'Banner Name')) !!}
                        </div>
                         <div class="form-group">
                            <label for="page_title">Banner Alt</label>
                            {!! Form::text('alt', null,array('class'=>'form-control ', 'placeholder'=>'Banner Alt')) !!}
                        </div>
                        <div class="form-group">
                            <label for="page_title">Banner Url</label>
                            <input type="text" name="banner_url" class="form-control " id="banner_url" placeholder="Banner Url" value="{!! $banner->url !!}">
                        </div>

                        <div class="form-group">
                            <label for="content-heading">English Banner Image</label>
                            {!!  Form::file('image',['class'=>"form-control"])!!}
                            {{ Form::image('upload/banner/'.$banner->banner_image, null, ['class' => 'brand-image'])}}
                        </div>
                        <div class="form-group">
                            <label for="content-heading">French Banner Image</label>
                            {!!  Form::file('french_image',['class'=>"form-control"])!!}
                            {{ Form::image('upload/banner/'.$banner->french_banner_image, null, ['class' => 'brand-image'])}}
                        </div>
                        <div class="form-group sub-banner">
                            {!! Form::label('is_subbanner', 'Is Side Banner', ['class' => 'col-sm-2 control-label']) !!}
                            <div class="">
                                {!! Form::checkbox('is_subbanner', '1',($banner->is_subbanner==1)?true:false) !!}
                            </div>

                        </div>
                        <div class="form-group">
                            {!! Form::label('is_active', 'Is Active', ['class' => 'col-sm-1 control-label']) !!}
                            <div class="">
                                {!! Form::checkbox('is_active', '1',($banner->is_active==1)?true:false) !!}
                            </div>

                        </div>
                    </div>
                    <div class="box-footer">
                     {{--   <a href="{!!  URL::to('/admin/banner/create') !!}" class="btn btn-default">Cancel</a>--}}
                        <button type="submit" class="btn btn-primary pull-right save-form">Save</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@stop
@section('footer-scripts')

@stop