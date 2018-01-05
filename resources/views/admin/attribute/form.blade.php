@extends($layout)

@section('content')
    <section class="content-header">
        <h1>
            @if($attribute)
                Update Attribute
            @else
                Add Attribute
            @endif
        </h1>

    </section>

    <section class="content">
        @include('admin.layout.notification')
        <div class="row">
            <div class="col-md-12">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#tab_1" data-toggle="tab">General</a></li>
                        <li><a href="#options" data-toggle="tab">Options</a></li>
                    </ul>
                    {!! Form::open(['url' => ($attribute) ? Url("admin/attribute/$attribute->attribute_id") :  route('save_attribute'), 'class' => 'form-horizontal','id' =>'attribute_form']) !!}
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab_1">
                            <section class="content">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="box-body">
                                            <div class="form-group english_input">
                                                {!! Form::label('en_attribute_name', 'Attribute Name(English)', ['class' => 'col-sm-2 control-label']) !!}
                                                <div class="col-sm-10">
                                                    {!! Form::text('en_attribute_name',($attribute) ? $attribute->english->attribute_name : null , ['class' => 'form-control required','id'=>'en_attribute_name','placeholder'=>"Attribute Name(English)"]) !!}
                                                </div>
                                            </div>
                                            <div class="form-group french_input">
                                                {!! Form::label('fr_attribute_name', 'Attribute Name(French)', ['class' => 'col-sm-2 control-label']) !!}
                                                <div class="col-sm-10">
                                                    {!! Form::text('fr_attribute_name',($attribute && !empty($attribute->french)) ? $attribute->french->attribute_name : null , ['class' => 'form-control','id'=>'fr_attribute_name','placeholder'=>"Attribute Name(French)"]) !!}
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                {!! Form::label('input_type', 'Input Type', ['class' => 'col-sm-2 control-label']) !!}
                                                <div class="col-sm-10">
                                                    {!! Form::select('input_type', [''=>'Select Input Type','1' => 'Color', '2' => 'Select Box'],($attribute) ? $attribute->type : null,['class'=>'form-control required','id'=>'input_type']) !!}
                                                </div>
                                            </div>
{{--
                                            <div class="form-group">
                                                {!! Form::label('is_required', 'Is Required', ['class' => 'col-sm-2 control-label']) !!}
                                                <div class="col-sm-10">
                                                    {!! Form::checkbox('is_required', '1',($attribute && $attribute->is_required=='1') ? true : false) !!}
                                                </div>
                                            </div>
--}}
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                        <div class="tab-pane" id="options">
                            @include('admin.attribute.option')
                        </div>
                        <div class="box-footer">
                            <a href="{!! route('attribute') !!}" class="btn btn-default">Cancel</a>
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

@section('additional-styles')
    {!! Html::style('backend/plugins/colorpicker/bootstrap-colorpicker.css') !!}
@stop

@section('additional-scripts')
    {!! Html::script('backend/plugins/colorpicker/bootstrap-colorpicker.js') !!}
    {!! Html::script('backend/js/attribute.js') !!}
@stop
