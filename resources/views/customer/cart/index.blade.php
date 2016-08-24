@extends('layouts.customer')

@section('title', trans_choice('messages.products', 2))

@section('content')

<div class="panel panel-default">
    <!-- Default panel contents -->
    <div class="panel-heading"><h4>@lang('messages.cart')</h4></div>
    <div class="panel-body">
        <table class="table table-borderless table-striped table-condensed">
            <thead>
                <tr>
                    <th>@lang('messages.id')</th>
                    <th>@lang('messages.name')</th>
                    <th>@lang('messages.quantity')</th>
                    <th>@lang('messages.unit_price_in_leva')</th>
                    <th>@lang('messages.subtotal')</th>
                    <th></th>
                </tr>
            </thead>
            <tfoot>
                <h4 class="well well-sm pull-right text-success">
                    <strong>@lang('messages.total'): </strong>{{ number_format($total, 2) }}
                </h4>
            </tfoot>
            <tbody>
                <?php $index = 1 ?>
                @foreach($products as $key => $product)

                <tr>
                    <td>{{ $index++ }}</td>
                    <td><a href="{{ action('Customer\ProductController@getShow', $product->id) }}">{{ $product->name }}</a></td>
                    <td style="width: 150px;">
                        {!! Form::open(['method' => 'POST', 'action' => ['Customer\ShoppingCartController@postUpdateQuantityOf', $product->rowid]]) !!}                        

                        <div class="input-group">
                            {!! Form::number('qty', $product->qty, ['class'=>'form-control', 'min' => '1']) !!}
                            <span class="input-group-btn">
                                <button type="submit" title="{{ trans('messages.update') }}" class="btn btn-success">
                                    <span class="glyphicon glyphicon-refresh"></span>
                                </button>
                            </span>
                        </div>
                        {!! Form::close() !!}
                    </td>
                    <td>{{ number_format($product->price, 2) }}</td>
                    <td>{{ number_format($product->subtotal, 2) }}</td>
                    <td class="text-center">
                        {!! Form::open(['method' => 'POST', 'action' => ['Customer\ShoppingCartController@postRemove', $product->rowid]]) !!}

                        <button type="submit" title="{{ trans('messages.delete') }}" class="btn btn-sm btn-danger" onclick="return confirm('{{ trans('messages.confirm_delete', ['delete_wath' => $product->name]) }}');">
                            <span class="glyphicon glyphicon-trash"></span>
                        </button>

                        {!! Form::close() !!}
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
    <div class="panel-footer clearfix">
        <div class="pull-right {{ $products->count() == 0 ? 'hidden' : '' }}">             
            <a href="{{ action('Customer\ShoppingCartController@getDestroyCart') }}" class="btn btn-lg btn-default">@lang('messages.clear_cart')</a>
            <a href="{{ action('Customer\ShoppingCartController@getCheckout') }}" class="btn btn-lg btn-success">@lang('messages.proceed_checkout')</a>
        </div>
    </div>
</div>

@endsection
