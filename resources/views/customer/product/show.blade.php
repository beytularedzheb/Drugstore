@extends('layouts.customer')

@section('title', trans_choice('messages.products', 1))

@section('content')

<div class="row">
    <div class="col-lg-12">
        <h2 class="page-header">
            @if (isset($product->category_id))
            {{ $product->productCategory->name }}
            @endif
        </h2>
    </div>
</div><!--/.row-->

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-success">
            <div class="panel-heading text-center"><h1>{{ $product->name }}</h1></div>
            <div class="panel-body">
                <table class="table table-striped table-bordered">
                    <tr>
                        <th>@lang('messages.description')</th>
                        <td><span class="glyphicon glyphicon-list-alt"></span> {{ $product->description }}</td>
                    </tr>
                    <tr>
                        <th>@lang('messages.unit_price_in_leva')</th>
                        <td><span class="glyphicon glyphicon-usd"></span> {{ number_format($product->unit_price_in_leva, 2) }}</td>
                    </tr>
                    <tr>
                        <th>@lang('messages.unit')</th>
                        <td>{{ $product->unit }}</td>
                    </tr>
                    <tr>
                        <th>@lang('messages.available_quantity')</th>
                        <td>{{ number_format($product->available_quantity, 2) }}</td>
                    </tr>
                    <tr>
                        <th>{{ trans_choice('messages.product_categories', 1) }}</th>
                        <td>
                            @if (isset($product->category_id))
                            {{ $product->productCategory->name }}
                            @endif
                        </td>
                    </tr>
                </table>

            </div>

        </div>
    </div>
</div><!--/.row-->

@endsection
