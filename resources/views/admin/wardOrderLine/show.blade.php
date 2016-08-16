@extends('layouts.admin')

@section('title', trans_choice('messages.ward_order_lines', 1))

@section('content')

            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">{{ trans_choice('messages.ward_order_lines', 1) }}</h1>
                </div>
            </div><!--/.row-->

            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading text-center">@lang('messages.id') - {{ $wardOrderLine->id }}</div>
                        <div class="panel-body">
                            <table class="table table-striped table-bordered">
                                    <tr>
                                        <th>@lang('messages.id')</th>
                                        <td>{{ $wardOrderLine->id }}</td>
                                    </tr>
                                    <tr>
                                        <th>{{ trans_choice('messages.ward_orders', 1) }}</th>
                                        <td>
                                        @if (isset($wardOrderLine->ward_order_id))
                                            <a class="btn btn-link" href="{{ action('WardOrderLineController@show', $wardOrderLine->ward_order_id) }}">{{ $wardOrderLine->ward_order_id }}</a>
                                        @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>{{ trans_choice('messages.products', 1) }}</th>
                                        <td>
                                        @if (isset($wardOrderLine->product_id))
                                            <a class="btn btn-link" href="{{ action('ProductController@show', $wardOrderLine->product_id) }}">{{ $wardOrderLine->product->name }}</a>
                                        @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>@lang('messages.quantity')</th>
                                        <td>{{ $wardOrderLine->quantity }}</td>
                                    </tr>                                    
                                    <tr>
                                        <th>@lang('messages.unit_price_in_leva')</th>
                                        <td>{{ $wardOrderLine->unit_price_in_leva }}</td>
                                    </tr>
                                    <tr>
                                        <th>@lang('messages.created_at')</th>
                                        <td><span class="glyphicon glyphicon-time"></span> {{ $wardOrderLine->created_at }}</td>
                                    </tr>
                                    <tr>
                                        <th>@lang('messages.updated_at')</th>
                                        <td><span class="glyphicon glyphicon-time"></span> {{ $wardOrderLine->updated_at }}</td>
                                    </tr>
                            </table>
                            
                        </div>
                        
                        <div class="panel-footer">
                            <a class="btn btn-default" 
                               href="{{ action('WardOrderLineController@index') }}" 
                               title="{{ trans('messages.back') }}"
                               >
                                @lang('messages.back_to_all', ['name' => trans_choice('messages.ward_order_lines', 2)])
                            </a>
                        </div>
                        
                    </div>
                </div>
            </div><!--/.row-->
            
@endsection
