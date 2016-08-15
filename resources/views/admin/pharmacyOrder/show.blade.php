@extends('layouts.admin')

@section('title', trans_choice('messages.pharmacy_orders', 1))

@section('content')

            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">{{ trans_choice('messages.pharmacy_orders', 1) }}</h1>
                </div>
            </div><!--/.row-->

            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading text-center">{{ $pharmacyOrder->name }}</div>
                        <div class="panel-body">
                            <table class="table table-striped table-bordered">
                                    <tr>
                                        <th>@lang('messages.id')</th>
                                        <td>{{ $pharmacyOrder->id }}</td>
                                    </tr>
                                    <tr>
                                        <th>@lang('messages.issue_date')</th>
                                        <td><span class="glyphicon glyphicon-time"></span> {{ $pharmacyOrder->issue_date }}</td>
                                    </tr>
                                    <tr>
                                        <th>@lang('messages.receiver')</th>
                                        <td><span class="glyphicon glyphicon-user"></span> {{ $pharmacyOrder->receiver_name }}</td>
                                    </tr>
                                    <tr>
                                        <th>@lang('messages.sender')</th>
                                        <td><span class="glyphicon glyphicon-user"></span> {{ $pharmacyOrder->sender_name }}</td>
                                    </tr>                                    
                                    <tr>
                                        <th>{{ trans_choice('messages.issuers', 1) }}</th>
                                        <td><span class="glyphicon glyphicon-user"></span> {{ $pharmacyOrder->issuer->name or '' }}</td>
                                    </tr>
                                    <tr>
                                        <th>{{ trans_choice('messages.customers', 1) }}</th>
                                        <td><span class="glyphicon glyphicon-user"></span> {{ $pharmacyOrder->customer->name or '' }}</td>
                                    </tr>
                                    <tr>
                                        <th>@lang('messages.created_at')</th>
                                        <td><span class="glyphicon glyphicon-time"></span> {{ $pharmacyOrder->created_at }}</td>
                                    </tr>
                                    <tr>
                                        <th>@lang('messages.updated_at')</th>
                                        <td><span class="glyphicon glyphicon-time"></span> {{ $pharmacyOrder->updated_at }}</td>
                                    </tr>
                            </table>
                            
                        </div>
                        
                        <div class="panel-footer">
                            <a class="btn btn-default" 
                               href="{{ action('PharmacyOrderController@index') }}" 
                               title="{{ trans('messages.back') }}"
                               >
                                @lang('messages.back_to_all', ['name' => trans_choice('messages.pharmacy_orders', 2)])
                            </a>
                        </div>
                        
                    </div>
                </div>
            </div><!--/.row-->
            
@endsection
