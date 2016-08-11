@extends('layouts.admin')

@section('title', trans_choice('messages.products', 1))

@section('content')

            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">{{ trans_choice('messages.products', 1) }}</h1>
                </div>
            </div><!--/.row-->

            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading text-center">{{ $product->name }}</div>
                        <div class="panel-body">
                            <table class="table table-striped table-bordered">
                                    <tr>
                                        <th>@lang('messages.id')</th>
                                        <td>{{ $product->id }}</td>
                                    </tr>
                                    <tr>
                                        <th>@lang('messages.description')</th>
                                        <td><span class="glyphicon glyphicon-barcode"></span> {{ $product->description }}</td>
                                    </tr>
                                    <tr>
                                        <th>@lang('messages.unit_price_in_leva')</th>
                                        <td><span class="glyphicon glyphicon-user"></span> {{ $product->unit_price_in_leva }}</td>
                                    </tr>
                                    <tr>
                                        <th>@lang('messages.unit')</th>
                                        <td><span class="glyphicon glyphicon-home"></span> {{ $product->unit }}</td>
                                    </tr>
                                    <tr>
                                        <th>@lang('messages.available_quantity')</th>
                                        <td><span class="glyphicon glyphicon-earphone"></span> {{ $product->available_quantity }}</td>
                                    </tr>
                                    <tr>
                                        <th>{{ trans_choice('messages.product_categories', 1) }}</th>
                                        <td>
                                            <span class="glyphicon glyphicon-earphone"></span> 
                                            <a class="btn btn-link" href="{{ action('ProductCategoryController@show', $product->category_id) }}">{{ $product->productCategory->name }}</a>
                                        </td>
                                    <tr>
                                        <th>{{ trans_choice('messages.storehouses', 1) }}</th>
                                        <td>
                                            <span class="glyphicon glyphicon-earphone"></span>
                                            <a class="btn btn-link" href="{{ action('StorehouseController@show', $product->storehouse_id) }}">{{ $product->storehouse->name }}</a>
                                        </td>
                                    </tr>                                    
                                    <tr>
                                        <th>@lang('messages.created_at')</th>
                                        <td><span class="glyphicon glyphicon-time"></span> {{ $product->created_at }}</td>
                                    </tr>
                                    <tr>
                                        <th>@lang('messages.updated_at')</th>
                                        <td><span class="glyphicon glyphicon-time"></span> {{ $product->updated_at }}</td>
                                    </tr>
                            </table>
                            
                        </div>
                        
                        <div class="panel-footer">
                            <a class="btn btn-default" 
                               href="{{ action('ProductController@index') }}" 
                               title="{{ trans('messages.back') }}"
                               >
                                @lang('messages.back_to_all', ['name' => trans_choice('messages.products', 2)])
                            </a>
                        </div>
                        
                    </div>
                </div>
            </div><!--/.row-->
            
@endsection
