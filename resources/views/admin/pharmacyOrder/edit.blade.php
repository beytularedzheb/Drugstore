@extends('layouts.admin')

@section('title', trans_choice('messages.pharmacy_orders', 1))

@section('content')

            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">{{ trans_choice('messages.pharmacy_orders', 1) }}</h1>
                </div>
            </div><!--/.row-->

            @include('partials.alerts.success')
            
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        
                        {!! Form::model($pharmacyOrder, ['method' => 'PUT', 'route' => ['pharmacyOrder.update', $pharmacyOrder->id]]) !!}
                        
                        <div class="panel-heading text-center">@lang('messages.id') - {{ $pharmacyOrder->id }}</div>
                        <div class="panel-body">
                            @include('partials.rows.label-text', ['fieldname' => 'receiver_name', 'label' => trans('messages.receiver')])
                            @include('partials.rows.label-text', ['fieldname' => 'sender_name', 'label' => trans('messages.sender')])
                            @include('partials.rows.label-select', [
                                'fieldname' => 'issuer_id', 
                                'label' => trans_choice('messages.issuers', 1), 
                                'select_items' => App\ProductProvider::pluck('name', 'id'),
                                'selected' => $pharmacyOrder->issuer_id
                            ])
                            @include('partials.rows.label-select', [
                                'fieldname' => 'customer_id', 
                                'label' => trans_choice('messages.customers', 1), 
                                'select_items' => App\Pharmacy::pluck('name', 'id'),
                                'selected' => $pharmacyOrder->customer_id
                            ])
                        </div>
                        
                        <div class="panel-footer">
                            {!! Form::submit(trans('messages.save'), ['class' => 'btn btn-primary']) !!}
                            <a href="{{ action('PharmacyOrderController@index') }}" class="btn btn-default">@lang('messages.back')</a>
                        </div>
                        
                        {!! Form::close() !!}
                        
                    </div>
                </div>
            </div><!--/.row-->
@endsection
