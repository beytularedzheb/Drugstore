@extends('layouts.admin')

@section('title', trans_choice('messages.users', 2))

@section('content')

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">{{ trans_choice('messages.users', 2) }}</h1>
    </div>
</div><!--/.row-->

@include('partials.alerts.success')

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">@lang('messages.user_table')</div>
            <div class="panel-body">
                <table data-toggle="table" data-show-toggle="true" data-show-columns="true" data-search="true" data-pagination="true" data-sort-name="name" data-sort-order="desc">
                    <thead>
                        <tr>
                            <th data-field="id" data-sortable="true">@lang('messages.id')</th>
                            <th data-field="name" data-sortable="true">@lang('messages.name')</th>
                            <th data-field="email" data-sortable="true">@lang('messages.email')</th>
                            <th data-field="type" data-sortable="true">@lang('messages.role')</th>
                            <th data-field="created_at" data-sortable="true">@lang('messages.created_at')</th>
                            <th data-field="updated_at" data-sortable="true">@lang('messages.updated_at')</th>
                            <th data-switchable="false"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $key => $user)

                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->type }}</td>
                            <td>{{ $user->created_at }}</td>
                            <td>{{ $user->updated_at }}</td>
                            <td class="text-center">
                                {!! Form::open(['method' => 'DELETE', 'action' => ['UserController@destroy', $user->id]]) !!}
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a class="btn btn-primary" 
                                       href="{{ action('UserController@show', $user->id) }}"
                                       title="{{ trans('messages.view') }}"
                                       >
                                        <span class="glyphicon glyphicon-eye-open"></span>
                                    </a>
                                    <button type="submit" title="{{ trans('messages.delete') }}" class="btn btn-primary" onclick="return confirm('{{ trans('messages.confirm_delete', ['delete_wath' => $user->name]) }}');">
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

@endsection
