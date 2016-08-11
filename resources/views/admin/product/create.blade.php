@extends('layouts.admin')

@section('title', trans_choice('messages.products', 1))

@section('content')

            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">{{ trans_choice('messages.products', 1) }}</h1>
                </div>
            </div><!--/.row-->

            @include('partials.alerts.success')
            
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        
                        {!! Form::open(['method' => 'POST', 'route' => ['product.store']]) !!}
                        
                        <div class="panel-heading text-center">@lang('messages.create')</div>
                        <div class="panel-body">
                            @include('partials.rows.label-text', ['fieldname' => 'name', 'label' => trans('messages.name')])
                            @include('partials.rows.label-textarea', ['fieldname' => 'description', 'label' => trans('messages.description')])
                            @include('partials.rows.label-number', ['fieldname' => 'unit_price_in_leva', 'label' => trans('messages.unit_price_in_leva')])
                            @include('partials.rows.label-text', ['fieldname' => 'unit', 'label' => trans('messages.unit')])
                            @include('partials.rows.label-number', ['fieldname' => 'available_quantity', 'label' => trans('messages.available_quantity')])
                            @include('partials.rows.label-select', [
                                'fieldname' => 'category_id', 
                                'label' => trans_choice('messages.product_categories', 2),
                                'select_items' => App\ProductCategory::all(),
                            ])
                            @include('partials.rows.label-select', [
                                'fieldname' => 'storehouse_id', 
                                'label' => trans_choice('messages.storehouses', 2),
                                'select_items' => App\Storehouse::all(),
                            ])    
                        </div>
                        
                        <div class="panel-footer">
                            {!! Form::submit(trans('messages.save'), ['class' => 'btn btn-primary']) !!}
                            <a href="{{ action('ProductController@index') }}" class="btn btn-default">@lang('messages.back')</a>
                        </div>
                        
                        {!! Form::close() !!}
                        
                    </div>
                </div>
            </div><!--/.row-->
            
@endsection
