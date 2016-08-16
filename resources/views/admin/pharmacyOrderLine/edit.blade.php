@extends('layouts.admin')

@section('title', trans_choice('messages.pharmacy_order_lines', 1))

@section('content')

            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">{{ trans_choice('messages.pharmacy_order_lines', 1) }}</h1>
                </div>
            </div><!--/.row-->

            @include('partials.alerts.success')
            
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        
                        {!! Form::model($pharmacyOrderLine, ['method' => 'PUT', 'route' => ['pharmacyOrderLine.update', $pharmacyOrderLine->id]]) !!}
                        
                        <div class="panel-heading text-center">@lang('messages.id') - {{ $pharmacyOrderLine->id }}</div>
                        <div class="panel-body">
                            @include('partials.rows.label-select', [
                                'fieldname' => 'pharmacy_order_id', 
                                'label' => trans_choice('messages.pharmacy_orders', 1), 
                                'select_items' => App\PharmacyOrder::pluck('id', 'id'),
                                'selected' => $pharmacyOrderLine->pharmacy_order_id
                            ])
                            @include('partials.rows.label-select', [
                                'fieldname' => 'product_id', 
                                'label' => trans_choice('messages.products', 1), 
                                'select_items' => App\Product::pluck('name', 'id'),
                                'selected' => $pharmacyOrderLine->product_id
                            ])
                            @include('partials.rows.label-number', ['fieldname' => 'quantity', 'label' => trans('messages.quantity')])
                        </div>
                        
                        <div class="panel-footer">
                            {!! Form::submit(trans('messages.save'), ['class' => 'btn btn-primary']) !!}
                            <a href="{{ action('PharmacyOrderLineController@index') }}" class="btn btn-default">@lang('messages.back')</a>
                        </div>
                        
                        {!! Form::close() !!}
                        
                    </div>
                </div>
            </div><!--/.row-->
@endsection
