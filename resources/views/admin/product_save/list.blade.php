@extends($layout)

@section('additional-styles')
    {!! Html::style('backend/plugins/datatables/dataTables.bootstrap.css') !!}
@stop
@section('content')
    <section class="content-header">
        <h1>
            All Products
        </h1>

        <div class="header-btn">
            <div class="clearfix">
                <div class="btn-group inline pull-left">

                     <div class="btn btn-samall">
                        <div class="btn-group" data-toggle="modal" data-target="#exampleModal">
                          <a href="#" class="btn btn-default">Select column to show</a>
                          <a href="#" class="btn btn-default"><span class="caret"></span></a>
                        </div>
                    </div>

                    <div class="btn btn-small">
                        <a href="{!! route('create_product') !!}" class="btn btn-block btn-primary">Add New Product</a>
                    </div>
                    <div class="btn btn-small">
                        <button class="btn btn-block btn-info" id="exportCSV" onClick="$('#product_list').tableExport({type:'csv',escape:'false'});" >Export data to CSV</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        @include('admin.layout.notification')
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-body">
                        <table id="product_list" class="table table-bordered table-hover table-responsive">
                            <thead>
                            <tr>
                                <th>Product Name</th>
                                <th>Serial Number</th>
                                <th>Original Price</th>
                                <th>Best Price</th>
                                <th>Created By</th>
                                <th>Brand</th>
                                <th>Created at</th>
                                <th>Modified by</th>
                                <th>Modified at</th>
                                <th class="col-sm-2">Note/Question</th>
                                <th>Affiliates</th>
                                <th>Status</th>                                
                                <th class="no-sort col-sm-1">Action</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
                <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Select column to show</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="checkbox">
                    <label><input class="col1" type="checkbox" checked="" value="0">Product name</input></label>
                </div>
                <div class="checkbox">  
                    <label><input class="col2" type="checkbox" checked="" onchange="test()" value="1">Serial number</input></label>
                </div>
                <div class="checkbox">
                    <label><input class="col3" type="checkbox" checked="" value="2">Original proce</input></label>
                </div>
                <div class="checkbox">
                    <label><input class="col4" type="checkbox" checked="" value="3">Best price</input></label>
                </div>
                <div class="checkbox">
                    <label><input class="col5" type="checkbox" checked="" value="4">Created by</input></label>
                </div>
                <div class="checkbox">
                    <label><input class="col6" type="checkbox" checked="" value="5">Brand</input></label>
                </div>
                <div class="checkbox">
                    <label><input class="col7" type="checkbox" checked="" value="6">Created at</input></label>
                </div>
                <div class="checkbox">
                    <label><input class="col8" type="checkbox" checked="" value="7">Modified by</input></label>
                </div>
                <div class="checkbox">
                    <label><input class="col11" type="checkbox" checked="" value="8">Modified at</input></label>
                </div>
                <div class="checkbox">
                    <label><input class="col12" type="checkbox" checked="" value="9">Note / Question</input></label>
                </div>
                <div class="checkbox">
                    <label><input class="col13" type="checkbox" checked="" value="9">Status</input></label>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <!-- <button type="button" class="btn btn-primary">Validate</button> -->
              </div>
            </div>
          </div>
        </div>

    </section>

@stop

@section('additional-scripts')
    {!! Html::script('backend/plugins/datatables/jquery.dataTables.min.js') !!}
    {!! Html::script('backend/plugins/datatables/dataTables.bootstrap.min.js') !!}
    {!! Html::script('backend/plugins/dropzone/dropzone.js') !!}
    {!! Html::script('backend/js/TableExport/tableExport.js') !!}
    {!! Html::script('backend/js/TableExport/jquery.base64.js') !!}
    {!! Html::script('backend/js/product.js') !!}
@stop
