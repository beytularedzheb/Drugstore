@extends('layouts.admin')

@section('title', trans_choice('messages.users', 2))

@section('content')

            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">{{ trans_choice('messages.users', 2) }}</h1>
                </div>
            </div><!--/.row-->

            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">Here are all users in the app.</div>
                        <div class="panel-body">
                            <table data-toggle="table" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-pagination="true" data-sort-name="name" data-sort-order="desc">
                                <thead>
                                    <tr>
                                        <th data-field="id" data-sortable="true">ID</th>
                                        <th data-field="name"  data-sortable="true">Name</th>
                                        <th data-field="email" data-sortable="true">Email</th>
                                        <th data-field="type"  data-sortable="true">Role</th>
                                        <th data-field="created_at" data-sortable="true">Created At</th>
                                        <th data-field="updated_at"  data-sortable="true">Updated At</th>
                                        <th data-sortable="false"></th>
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
                                        <td>
                                            <a class="btn btn-toolbar btn-block" 
                                               href="{{ action('UserController@show', $user->id) }}"
                                               title="{{ trans('messages.view') }}"
                                               >
                                                <span class="glyphicon glyphicon-eye-open"></span>
                                            </a>                                          
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
