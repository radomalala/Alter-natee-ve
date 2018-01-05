@extends($layout)
@section('content')

    <section class="content-header">
        <h1>
            Add Speial Product
        </h1>
    </section>

    <section class="content">
        @include('admin.layout.notification')
        <div class="row">
            <div class="col-md-12">
                <div class="nav-tabs-custom">
                    {!! Form::open(array('url' => 'admin/special-product','id' =>'page_form','class'=>'validate_form')) !!}
                    <div class="tab-content">
                        <div class="tab-pane active" >
                            <section class="content">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="box-body">
                                            <div class="form-group">
                                                {!! Form::label('type', 'Input Type', ['class' => 'col-sm-2 control-label']) !!}
                                                <div class="col-sm-10">
                                                    {!! Form::select('type', [''=>'Select Input Type','1' => 'Trending', '2' => 'Best Sale','3' => 'TOP RATE'],(isset($attribute)) ? $attribute->type : null,['class'=>'form-control required','id'=>'input_type']) !!}
                                                </div>
                                            </div>
                                            <div class="form-group mr-10  product-autocomplete">
                                                {!! Form::label('product', 'Product', ['class' => 'col-sm-2 control-label'])
                                                !!}
                                                <div class="col-sm-10">
                                                    <span class="search-box-container">
                                                        <span class="search-box">
                                                            <ul>
                                                                <li data-type="category" class="search-input"><input
                                                                            class="form-control product-auto-complete"></li>
                                                            </ul>
                                                        </span>
                                                    </span>
                                                </div>
                                                <input type="hidden" name="product" value="" id="product">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                        <div class="box-footer">
                            <a href="{!! URL::to('admin/special-product') !!}" class="btn btn-default">Cancel</a>
                            <button type="submit" class="btn btn-primary pull-right" id="add-attribute">Save
                            </button>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>

            </div>
        </div>

    </section>
@stop
@section('footer-scripts')
    {!! Html::script('backend/js/special_product.js') !!}
@stop