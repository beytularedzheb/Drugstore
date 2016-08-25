@extends('layouts.admin')

@section('title', trans_choice('messages.ward_order_lines', 2))

@section('content')

            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">{{ trans_choice('messages.ward_order_lines', 2) }}</h1>
                </div>
            </div><!--/.row-->
            
            @include('partials.alerts.success')

            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">@lang('messages.ward_order_item_table')</div>
                        <div class="panel-body">                            
                            <table data-toggle="table" data-show-toggle="true" data-show-columns="true" data-search="true" data-pagination="true" data-sort-name="ward_order_id">
                                <thead>
                                    <tr>
                                        <th data-field="id" data-sortable="true">@lang('messages.id')</th>
                                        <th data-field="ward_order_id" data-sortable="true">{{ trans_choice('messages.ward_orders', 1) }}</th>
                                        <th data-field="product_id" data-sortable="true">{{ trans_choice('messages.products', 1) }}</th>
                                        <th data-field="quantity" data-sortable="true">@lang('messages.quantity')</th>
                                        <th data-field="unit_price_in_leva" data-sortable="true">@lang('messages.unit_price_in_leva')</th>
                                        <th data-visible="false" data-field="created_at" data-sortable="true">@lang('messages.created_at')</th>
                                        <th data-visible="false" data-field="updated_at" data-sortable="true">@lang('messages.updated_at')</th>
                                        <th data-switchable="false">
                                            <a class="btn btn-primary btn-block" href="{{ action('WardOrderLineController@create') }}">
                                                <span class="glyphicon glyphicon-plus"></span> @lang('messages.create')
                                            </a>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($wardOrderLines as $key => $wardOrderLine)

                                    <tr>
                                        <td>{{ $wardOrderLine->id }}</td>
                                        <td>{{ $wardOrderLine->ward_order_id }}</td>
                                        <td>{{ $wardOrderLine->product->name or '' }}</td>
                                        <td>{{ $wardOrderLine->quantity }}</td>
                                        <td>{{ $wardOrderLine->unit_price_in_leva }}</td>
                                        <td>{{ $wardOrderLine->created_at }}</td>
                                        <td>{{ $wardOrderLine->updated_at }}</td>
                                        <td class="text-center">
                                            {!! Form::open(['method' => 'DELETE', 'route' => ['wardOrderLine.destroy', $wardOrderLine->id]]) !!}
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a class="btn btn-primary" 
                                                   href="{{ action('WardOrderLineController@show', $wardOrderLine->id) }}"
                                                   title="{{ trans('messages.view') }}"
                                                   >
                                                    <span class="glyphicon glyphicon-eye-open"></span>
                                                </a>
                                                <a class="btn btn-primary" 
                                                   href="{{ action('WardOrderLineController@edit', $wardOrderLine->id) }}"
                                                   title="{{ trans('messages.edit') }}"                                                
                                                   >
                                                    <span class="glyphicon glyphicon-pencil"></span>
                                                </a>
                                                <button type="submit" title="{{ trans('messages.delete') }}" class="btn btn-primary" onclick="return confirm('{{ trans('messages.confirm_delete', ['delete_wath' => '']) }}');">
                                                    <span class="glyphicon glyphicon-trash"></span>
                                                </button>
                                            </div>
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>                            
                        </div>
                    </div>
                </div>
            </div><!--/.row-->
            
@endsection
