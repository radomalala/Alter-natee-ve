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
                    {!! Form::open(array('url' => 'admin/banner','files' => true,'class'=>'validate_form')) !!}
                    <div class="box-body">
                        <div class="form-group">
                            <label for="page_title">Banner Name</label>
                            <input type="text" name="banner_title" class="form-control required" id="page_title"
                                   placeholder="Banner Name">
                        </div>
                        <div class="form-group">
                            <label for="page_title">Banner Alt</label>
                            <input type="text" name="alt" class="form-control " id="page_title"
                                   placeholder="Banner Alt">
                        </div>
                        <div class="form-group">
                            <label for="page_title">Banner Url</label>
                            <input type="text" name="banner_url" class="form-control " id="banner_url" placeholder="Banner Url">
                        </div>
                        <div class="form-group">
                            <label for="content-heading">English Banner Image</label>
                            {!!  Form::file('image',['class'=>"form-control"])!!}
                        </div>
                        <div class="form-group">
                            <label for="content-heading">French Banner Image</label>
                            {!!  Form::file('french_image',['class'=>"form-control"])!!}
                        </div>
                        <div class="form-group sub-banner">
                            {!! Form::label('is_subbanner', 'Is Side Banner', ['class' => 'col-sm-2 control-label']) !!}
                            <div class="">
                                {!! Form::checkbox('is_subbanner', '1') !!}
                            </div>

                        </div>
                        <div class="form-group">
                            {!! Form::label('is_active', 'Is Active', ['class' => 'col-sm-1 control-label']) !!}
                            <div class="">
                                {!! Form::checkbox('is_active', '1') !!}
                            </div>

                        </div>
                    </div>
                    <div class="box-footer">
                        {{--<a href="{!!  URL::to('/admin/brand/create') !!}" class="btn btn-default">Cancel</a>--}}
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