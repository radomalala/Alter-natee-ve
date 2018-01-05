@extends('front.layout.master')
@section('content')
    <section class="ptb-30">
        <div class="container">
            @include('notification')
            <table id="cart" class="table table-hover table-condensed">
                <thead>
                <tr>
                    <th style="width:40%">{!! trans('product.product') !!}</th>
                    <th style="width:10%">{!! trans('product.original_price') !!}</th>
                    <th style="width:10%">{!! trans('product.best_price') !!}</th>
                    <th style="width:20%"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($products as $product)
                    <?php     $product_translation = $product->product->getByLanguageId(app('language')->language_id) ?>
                <tr>
                    <td data-th="Product">
                        <div class="row">
                            <div class="col-sm-2 hidden-xs"><img src="{!! url(\App\Product::THUMB_IMAGE_PATH.$product->product->images->first()->image_name) !!}" alt="{!! $product_translation->product_name !!}" class="img-responsive"/></div>
                            <div class="col-sm-10">
                                <h4 class="nomargin">{!! $product_translation->product_name !!}</h4>
                            </div>
                        </div>
                    </td>
                    <td data-th="Price">{!! format_price($product->product->original_price) !!}</td>
                    <td data-th="Subtotal">{!! format_price($product->product->best_price) !!}</td>
                    <td class="actions" data-th="">
                        <a class="btn btn-danger btn-sm" href="{!! url('wishlist/remove/'.$product->wishlist_id) !!}"><i class="fa fa-trash-o"></i></a>
                        <a class="btn btn-success" href="{!! url($product->product->url->target_url) !!}">{!! trans('product.buy') !!}</a>
                    </td>
                </tr>
                 @endforeach
                </tbody>
                <tfoot>
                </tfoot>
            </table>
        </div>
    </section>
@stop
@section('footer-script')
    <script>
    </script>
@stop