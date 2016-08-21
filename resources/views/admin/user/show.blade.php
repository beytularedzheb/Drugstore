@extends('layouts.admin')

@section('title', trans_choice('messages.users', 1))

@section('content')

            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">{{ trans_choice('messages.users', 1) }}</h1>
                </div>
            </div><!--/.row-->

            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading text-center">{{ $user->name }}</div>
                        <div class="panel-body">
                            <table class="table table-striped table-bordered">
                                    <tr>
                                        <th>@lang('messages.id')</th>
                                        <td>{{ $user->id }}</td>
                                    </tr>
                                    <tr>
                                        <th>@lang('messages.name')</th>
                                        <td><span class="glyphicon glyphicon-user"></span> {{ $user->name }}</td>
                                    </tr>
                                    <tr>
                                        <th>@lang('messages.password')</th>
                                        <td><span class="glyphicon glyphicon-qrcode"></span> {{ $user->password }}</td>
                                    </tr>
                                    <tr>
                                        <th>@lang('messages.email')</th>
                                        <td><span class="glyphicon glyphicon-envelope"></span> {{ $user->email }}</td>
                                    </tr>
                                    <tr>
                                        <th>@lang('messages.role')</th>
                                        <td><span class="glyphicon glyphicon-tag"></span> {{ $user->type }}</td>
                                    </tr>
                                    <tr>
                                        <th>@lang('messages.created_at')</th>
                                        <td><span class="glyphicon glyphicon-time"></span> {{ $user->created_at }}</td>
                                    </tr>
                                    <tr>
                                        <th>@lang('messages.updated_at')</th>
                                        <td><span class="glyphicon glyphicon-time"></span> {{ $user->updated_at }}</td>
                                    </tr>
                            </table>
                            
                        </div>
                        
                        <div class="panel-footer">
                            <a class="btn btn-default" 
                               href="{{ action('UserController@index') }}" 
                               title="{{ trans('messages.back') }}"
                               >
                                @lang('messages.back_to_all', ['name' => trans_choice('messages.users', 2)])
                            </a>
                        </div>
                        
                    </div>
                </div>
            </div><!--/.row-->
@endsection
