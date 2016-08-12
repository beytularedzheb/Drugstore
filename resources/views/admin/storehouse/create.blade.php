@extends('layouts.admin')

@section('title', trans_choice('messages.storehouses', 1))

@section('content')

            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">{{ trans_choice('messages.storehouses', 1) }}</h1>
                </div>
            </div><!--/.row-->

            @include('partials.alerts.success')
            
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        
                        {!! Form::open(['method' => 'POST', 'route' => ['storehouse.store']]) !!}
                        
                        <div class="panel-heading text-center">@lang('messages.create')</div>
                        <div class="panel-body">
                            @include('partials.rows.label-text', ['fieldname' => 'name', 'label' => trans('messages.name')])
                            @include('partials.rows.label-textarea', ['fieldname' => 'description', 'label' => trans('messages.description')])
                            @include('partials.rows.label-textarea', ['fieldname' => 'address', 'label' => trans('messages.address')])
                            @include('partials.rows.label-text', ['fieldname' => 'phone', 'label' => trans('messages.phone')])
                            @include('partials.rows.label-select', [
                                'fieldname' => 'pharmacy_id', 
                                'label' => trans_choice('messages.pharmacies', 1),
                                'select_items' => App\Pharmacy::pluck('name', 'id'),
                            ])
                        </div>
                        
                        <div class="panel-footer">
                            {!! Form::submit(trans('messages.save'), ['class' => 'btn btn-primary']) !!}
                            <a href="{{ action('StorehouseController@index') }}" class="btn btn-default">@lang('messages.back')</a>
                        </div>
                        
                        {!! Form::close() !!}
                        
                    </div>
                </div>
            </div><!--/.row-->
            
@endsection
