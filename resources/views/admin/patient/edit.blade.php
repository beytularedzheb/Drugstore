@extends('layouts.admin')

@section('title', trans_choice('messages.patients', 1))

@section('content')

            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">{{ trans_choice('messages.patients', 1) }}</h1>
                </div>
            </div><!--/.row-->

            @include('partials.alerts.success')
            
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        
                        {!! Form::model($patient, ['method' => 'PUT', 'route' => ['patient.update', $patient->id]]) !!}
                        
                        <div class="panel-heading text-center">{{ $patient->name }}</div>
                        <div class="panel-body">
                            @include('partials.rows.label-text', ['fieldname' => 'name', 'label' => trans('messages.name')])
                            @include('partials.rows.label-textarea', ['fieldname' => 'disease', 'label' => trans('messages.disease')])
                            @include('partials.rows.label-select', [
                                'fieldname' => 'ward_id', 
                                'label' => trans_choice('messages.wards', 1), 
                                'select_items' => App\Ward::pluck('name', 'id'),
                                'selected' => $patient->ward_id
                            ])
                        </div>
                        
                        <div class="panel-footer">
                            {!! Form::submit(trans('messages.save'), ['class' => 'btn btn-primary']) !!}
                            <a href="{{ action('PatientController@index') }}" class="btn btn-default">@lang('messages.back')</a>
                        </div>
                        
                        {!! Form::close() !!}
                        
                    </div>
                </div>
            </div><!--/.row-->
            
@endsection
