@extends('layouts.admin')

@section('title', trans_choice('messages.wards', 1))

@section('content')

            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">{{ trans_choice('messages.wards', 1) }}</h1>
                </div>
            </div><!--/.row-->

            @include('partials.alerts.success')
            
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        
                        {!! Form::open(['method' => 'POST', 'route' => ['ward.store']]) !!}
                        
                        <div class="panel-heading text-center">@lang('messages.create')</div>
                        <div class="panel-body">
                            @include('partials.rows.label-text', ['fieldname' => 'name', 'label' => trans('messages.name')])
                            @include('partials.rows.label-text', ['fieldname' => 'uic', 'label' => trans('messages.uic')])
                            @include('partials.rows.label-text', ['fieldname' => 'accountable_person_name', 'label' => trans('messages.accountable_person_name')])
                            @include('partials.rows.label-textarea', ['fieldname' => 'address', 'label' => trans('messages.address')])
                            @include('partials.rows.label-text', ['fieldname' => 'phone', 'label' => trans('messages.phone')])
                        </div>
                        
                        <div class="panel-footer">
                            {!! Form::submit(trans('messages.save'), ['class' => 'btn btn-primary']) !!}
                            <a href="{{ action('WardController@index') }}" class="btn btn-default">@lang('messages.back')</a>
                        </div>
                        
                        {!! Form::close() !!}
                        
                    </div>
                </div>
            </div><!--/.row-->
            
@endsection
