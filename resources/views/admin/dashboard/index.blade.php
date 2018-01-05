@extends($layout)

@section('content')
    <section class="content-header">
        <h1>
            Dashboard
        </h1>
    </section>

    <section class="content">
        <section class="content">
            <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-aqua"><i class="ion ion-bag"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Products</span>
                            <span class="info-box-number">{!! $product_count !!}</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-red"><i class="fa ion-briefcase"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Stores</span>
                            <span class="info-box-number">{!! $store_count !!}</span>
                        </div>
                    </div>
                </div>

                <div class="clearfix visible-sm-block"></div>

                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-green"><i class="ion ion-ios-cart-outline"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Sales</span>
                            <span class="info-box-number">{!! $sales_count !!}</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">New Members</span>
                            <span class="info-box-number">{!! $member_count !!}</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="box box-danger">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Latest Members</h3>
                                    <div class="box-tools pull-right">
                                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                        </button>
                                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="box-body no-padding">
                                    <ul class="users-list clearfix">
                                        @foreach($members as $user)
                                        <li>
                                            <a class="users-list-name" href="javascript:void(0)">{!! $user->first_name." ".$user->last_name !!}</a>
                                            <span class="users-list-date">{!! \Carbon\Carbon::parse($user->created_at)->format('M d, Y') !!}</span>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="box-footer text-center">
                                    <a href="{!! url('admin/customer') !!}" class="uppercase">View All Users</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="box box-primary">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Recently Added Products</h3>

                                    <div class="box-tools pull-right">
                                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                        </button>
                                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                    </div>
                                </div>
                                <div class="box-body">
                                    <ul class="products-list product-list-in-box">
                                        @foreach($products as $product)
                                        <li class="item">
                                            <div class="product-img">
                                                @if(count($product->images) > 0)
                                                <img src="{!! url('upload/product/thumb/'.$product->images[0]->image_name) !!}" alt="Product Image">
                                                @endif
                                            </div>
                                            <div class="product-info">
                                                <a href="javascript:void(0)" class="product-title">{!! $product->english->product_name !!}
                                                    <span class="label label-warning pull-right">{!! format_price($product->best_price) !!}</span></a>
                                                <span class="product-description">
                                                    {!! str_limit($product->english->description,80) !!}
                                                </span>
                                            </div>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="box-footer text-center">
                                    <a href="{!! url('admin/product') !!}" class="uppercase">View All Products</a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Recently Added Stores</h3>

                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                            </div>
                        </div>
                        <div class="box-body">
                            <ul class="products-list product-list-in-box">
                                @foreach($stores as $store)
                                <li class="item">
                                    <div class="product-img">
                                        @if(file_exists(public_path('upload/store/'.$store->logo)))
                                        <img src="{!! url('upload/store/'.$store->logo) !!}" alt="Store Image">
                                        @endif
                                    </div>
                                    <div class="product-info">
                                        <a href="javascript:void(0)" class="product-title">{!! $store->store_name !!}
                                            <span class="product-description">
                                              {!! $store->short_description !!}
                                            </span>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="box-footer text-center">
                            <a href="{!! url('admin/store') !!}" class="uppercase">View All Stores</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Latest Orders</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table no-margin">
                                <thead>
                                <tr>
                                    <th>Order ID</th>
                                    <th>Customer</th>
                                    <th>Status</th>
                                    <th>Order Date</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($orders as $order)
                                <tr>
                                    <td><a href="{!! url('admin/sales/view/'.$order->order_id) !!}">{!! $order->order_id !!}</a></td>
                                    <td>{!! ($order->customer != null) ? $order->customer->first_name." ".$order->customer->last_name : "" !!}</td>
                                    <td><span class="label label-success">{!! ($order->status != null) ? $order->status->status_name : "" !!}</span></td>
                                    <td>
                                        <div class="sparkbar" data-color="#00a65a" data-height="20">{!! \Carbon\Carbon::parse($order->order_date)->format('M d, Y h:i A') !!}</div>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="box-footer clearfix">
                        <a href="{!! url('admin/sales/1') !!}" class="btn btn-sm btn-default btn-flat pull-right">View All Orders</a>
                    </div>
                </div>
            </div>
        </section>
    </section>
@stop
