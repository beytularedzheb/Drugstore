@extends('layouts.admin')

@section('title', trans_choice('messages.pharmacy_orders', 2))

@section('content')

            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">{{ trans_choice('messages.pharmacy_orders', 2) }}</h1>
                </div>
            </div><!--/.row-->

            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">@lang('messages.pharmacy_order_table')</div>
                        <div class="panel-body">                            
                            <table data-toggle="table" data-show-toggle="true" data-show-columns="true" data-search="true" data-pagination="true" data-sort-name="issue_date" data-sort-order="desc">
                                <thead>
                                    <tr>
                                        <th data-field="id" data-sortable="true">@lang('messages.id')</th>
                                        <th data-field="issue_date" data-sortable="true">@lang('messages.issue_date')</th>
                                        <th data-field="receiver_name" data-sortable="true">@lang('messages.receiver')</th>
                                        <th data-field="sender_name" data-sortable="true">@lang('messages.sender')</th>
                                        <th data-field="issuer_id" data-sortable="true">{{ trans_choice('messages.issuers', 1) }}</th>
                                        <th data-field="customer_id" data-sortable="true">{{ trans_choice('messages.customers', 1) }}</th>
                                        <th data-visible="false" data-field="created_at" data-sortable="true">@lang('messages.created_at')</th>
                                        <th data-visible="false" data-field="updated_at" data-sortable="true">@lang('messages.updated_at')</th>
                                        <th data-switchable="false">
                                            <a class="btn btn-primary btn-block" href="{{ action('PharmacyOrderController@create') }}">
                                                <span class="glyphicon glyphicon-plus"></span> @lang('messages.create')
                                            </a>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($pharmacyOrders as $key => $pharmacyOrder)

                                    <tr>
                                        <td>{{ $pharmacyOrder->id }}</td>
                                        <td>{{ $pharmacyOrder->issue_date }}</td>
                                        <td>{{ $pharmacyOrder->receiver_name }}</td>
                                        <td>{{ $pharmacyOrder->sender_name }}</td>
                                        <td>{{ $pharmacyOrder->issuer->name or '' }}</td>
                                        <td>{{ $pharmacyOrder->customer->name or '' }}</td>
                                        <td>{{ $pharmacyOrder->created_at }}</td>
                                        <td>{{ $pharmacyOrder->updated_at }}</td>
                                        <td class="text-center">
                                            {!! Form::open(['method' => 'DELETE', 'route' => ['pharmacyOrder.destroy', $pharmacyOrder->id]]) !!}
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a class="btn btn-primary" 
                                                   href="{{ action('PharmacyOrderController@show', $pharmacyOrder->id) }}"
                                                   title="{{ trans('messages.view') }}"
                                                   >
                                                    <span class="glyphicon glyphicon-eye-open"></span>
                                                </a>
                                                <a class="btn btn-primary" 
                                                   href="{{ action('PharmacyOrderController@edit', $pharmacyOrder->id) }}"
                                                   title="{{ trans('messages.edit') }}"                                                
                                                   >
                                                    <span class="glyphicon glyphicon-pencil"></span>
                                                </a>
                                                <button type="submit" title="{{ trans('messages.delete') }}" class="btn btn-primary" onclick="return confirm('{{ trans('messages.confirm_delete', ['delete_wath' => $pharmacyOrder->name]) }}');">
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
