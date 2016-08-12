@extends('layouts.admin')

@section('title', trans_choice('messages.patients', 1))

@section('content')

            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">{{ trans_choice('messages.patients', 1) }}</h1>
                </div>
            </div><!--/.row-->

            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading text-center">{{ $patient->name }}</div>
                        <div class="panel-body">
                            <table class="table table-striped table-bordered">
                                    <tr>
                                        <th>@lang('messages.id')</th>
                                        <td>{{ $patient->id }}</td>
                                    </tr>
                                    <tr>
                                        <th>@lang('messages.disease')</th>
                                        <td><span class="glyphicon glyphicon-heart-empty"></span> {{ $patient->disease }}</td>
                                    </tr>
                                    <tr>
                                        <th>{{ trans_choice('messages.wards', 1) }}</th>
                                        <td>
                                            <span class="glyphicon glyphicon-home"></span>
                                            @if (isset($patient->ward_id))
                                            <a class="btn btn-link" href="{{ action('WardController@show', $patient->ward_id) }}">{{ $patient->ward->name }}</a>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>@lang('messages.created_at')</th>
                                        <td><span class="glyphicon glyphicon-time"></span> {{ $patient->created_at }}</td>
                                    </tr>
                                    <tr>
                                        <th>@lang('messages.updated_at')</th>
                                        <td><span class="glyphicon glyphicon-time"></span> {{ $patient->updated_at }}</td>
                                    </tr>
                            </table>
                            
                        </div>
                        
                        <div class="panel-footer">
                            <a class="btn btn-default" 
                               href="{{ action('PatientController@index') }}" 
                               title="{{ trans('messages.back') }}"
                               >
                                @lang('messages.back_to_all', ['name' => trans_choice('messages.patients', 2)])
                            </a>
                        </div>
                        
                    </div>
                </div>
            </div><!--/.row-->
            
@endsection
