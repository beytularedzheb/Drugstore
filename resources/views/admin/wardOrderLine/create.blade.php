@extends('layouts.admin')

@section('title', trans_choice('messages.ward_order_lines', 1))

@section('content')

            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">{{ trans_choice('messages.ward_order_lines', 1) }}</h1>
                </div>
            </div><!--/.row-->

            @include('partials.alerts.success')
            
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        
                        {!! Form::open(['method' => 'POST', 'route' => ['wardOrderLine.store']]) !!}
                        
                        <div class="panel-heading text-center">{{ trans_choice('messages.ward_order_lines', 1) }}</div>
                        <div class="panel-body">
                            @include('partials.rows.label-select', [
                                'fieldname' => 'ward_order_id', 
                                'label' => trans_choice('messages.ward_orders', 1), 
                                'select_items' => App\WardOrder::pluck('id', 'id')
                            ])
                            @include('partials.rows.label-select', [
                                'fieldname' => 'product_id', 
                                'label' => trans_choice('messages.products', 1), 
                                'select_items' => App\Product::pluck('name', 'id')
                            ])
                            @include('partials.rows.label-number', ['fieldname' => 'quantity', 'label' => trans('messages.quantity')])
                        </div>
                        
                        <div class="panel-footer">
                            {!! Form::submit(trans('messages.save'), ['class' => 'btn btn-primary']) !!}
                            <a href="{{ action('WardOrderLineController@index') }}" class="btn btn-default">@lang('messages.back')</a>
                        </div>
                        
                        {!! Form::close() !!}
                        
                    </div>
                </div>
            </div><!--/.row-->
            
@endsection
