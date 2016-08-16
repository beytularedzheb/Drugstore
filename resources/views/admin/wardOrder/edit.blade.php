@extends('layouts.admin')

@section('title', trans_choice('messages.ward_orders', 1))

@section('content')

            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">{{ trans_choice('messages.ward_orders', 1) }}</h1>
                </div>
            </div><!--/.row-->

            @include('partials.alerts.success')
            
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        
                        {!! Form::model($wardOrder, ['method' => 'PUT', 'route' => ['wardOrder.update', $wardOrder->id]]) !!}
                        
                        <div class="panel-heading text-center">@lang('messages.id') - {{ $wardOrder->id }}</div>
                        <div class="panel-body">
                            @include('partials.rows.label-text', ['fieldname' => 'receiver_name', 'label' => trans('messages.receiver')])
                            @include('partials.rows.label-text', ['fieldname' => 'sender_name', 'label' => trans('messages.sender')])
                            @include('partials.rows.label-text', ['fieldname' => 'state', 'label' => trans('messages.state')])
                            
                            @include('partials.rows.label-select', [
                                'fieldname' => 'requester_id', 
                                'label' => trans('messages.requester'), 
                                'select_items' => App\Ward::pluck('name', 'id'),
                                'selected' => $wardOrder->requester_id
                            ])
                            @include('partials.rows.label-select', [
                                'fieldname' => 'requested_from_id', 
                                'label' => trans('messages.requested_from'), 
                                'select_items' => App\Pharmacy::pluck('name', 'id'),
                                'selected' => $wardOrder->requested_from_id
                            ])
                            @include('partials.rows.label-select', [
                                'fieldname' => 'requested_for_id', 
                                'label' => trans('messages.requested_for'), 
                                'select_items' => App\Patient::pluck('name', 'id'),
                                'selected' => $wardOrder->requested_for_id
                            ])
                        </div>
                        
                        <div class="panel-footer">
                            {!! Form::submit(trans('messages.save'), ['class' => 'btn btn-primary']) !!}
                            <a href="{{ action('WardOrderController@index') }}" class="btn btn-default">@lang('messages.back')</a>
                        </div>
                        
                        {!! Form::close() !!}
                        
                    </div>
                </div>
            </div><!--/.row-->
@endsection
