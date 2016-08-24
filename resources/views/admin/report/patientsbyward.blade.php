@extends('layouts.admin')

@section('title', trans_choice('messages.reports', 1))

@section('content')

<div class="panel panel-default">
    <div class="panel-heading"><h3>@lang('messages.patients_by_ward')</h3></div>
    <div class="panel-body">
        {!! Form::open(['method' => 'POST', 'action' => ['ReportController@postPatientsByWard']]) !!}

        <select class="form-control" name="ward_id" onchange="submit()">
            <option value=""></option>
            @foreach (App\Ward::all() as $ward)
            <option value="{{ $ward->id }}">{{ $ward->name }}</option>
            @endforeach
        </select>

        {!! Form::close() !!}
    </div>

</div><!--/.row-->

@if (isset($patients))
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-body">                            
                <table data-toggle="table" data-show-toggle="true" data-show-columns="true" data-search="true" data-pagination="true" data-sort-name="name" data-sort-order="desc">
                    <thead>
                        <tr>
                            <th data-field="id" data-sortable="true">@lang('messages.id')</th>
                            <th data-field="name" data-sortable="true">@lang('messages.name')</th>
                            <th data-field="disease" data-sortable="true">@lang('messages.disease')</th>
                            <th data-field="ward" data-sortable="true">{{ trans_choice('messages.wards', 1) }}</th>
                            <th data-visible="false" data-field="created_at" data-sortable="true">@lang('messages.created_at')</th>
                            <th data-visible="false" data-field="updated_at" data-sortable="true">@lang('messages.updated_at')</th>
                            <th data-switchable="false">
                                <a class="btn btn-primary btn-block" href="{{ action('PatientController@create') }}">
                                    <span class="glyphicon glyphicon-plus"></span> @lang('messages.create')
                                </a>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($patients as $key => $patient)

                        <tr>
                            <td>{{ $patient->id }}</td>
                            <td>{{ $patient->name }}</td>
                            <td>{{ $patient->disease }}</td>
                            <td>{{ $patient->ward->name or '' }}</td>
                            <td>{{ $patient->created_at }}</td>
                            <td>{{ $patient->updated_at }}</td>
                            <td class="text-center">
                                {!! Form::open(['method' => 'DELETE', 'route' => ['patient.destroy', $patient->id]]) !!}
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a class="btn btn-primary" 
                                       href="{{ action('PatientController@show', $patient->id) }}"
                                       title="{{ trans('messages.view') }}"
                                       >
                                        <span class="glyphicon glyphicon-eye-open"></span>
                                    </a>
                                    <a class="btn btn-primary" 
                                       href="{{ action('PatientController@edit', $patient->id) }}"
                                       title="{{ trans('messages.edit') }}"                                                
                                       >
                                        <span class="glyphicon glyphicon-pencil"></span>
                                    </a>
                                    <button type="submit" title="{{ trans('messages.delete') }}" class="btn btn-primary" onclick="return confirm('{{ trans('messages.confirm_delete', ['delete_wath' => $patient->name]) }}');">
                                        <span class="glyphicon glyphicon-trash"></span>
                                    </button>
                                </div>
                                {!! Form::close() !!}
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>                            
            </div>
        </div>
    </div>
</div><!--/.row-->
@endif

@endsection