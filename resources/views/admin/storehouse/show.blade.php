@extends('layouts.admin')

@section('title', trans_choice('messages.storehouses', 1))

@section('content')

            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">{{ trans_choice('messages.storehouses', 1) }}</h1>
                </div>
            </div><!--/.row-->

            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading text-center">{{ trans_choice('messages.storehouses', 1) }} @lang('messages.id') {{ $storehouse->id }}</div>
                        <div class="panel-body">
                            <table class="table table-striped table-bordered">
                                    <tr>
                                        <th>@lang('messages.id')</th>
                                        <td>{{ $storehouse->id }}</td>
                                    </tr>
                                   <tr>
                                        <th>@lang('messages.name')</th>
                                        <td><span class="glyphicon"></span> {{ $storehouse->name }}</td>
                                    </tr>
                                    <tr>
                                        <th>@lang('messages.description')</th>
                                        <td><span class="glyphicon glyphicon-list-alt"></span> {{ $storehouse->description }}</td>
                                    </tr>
                                    <tr>
                                        <th>@lang('messages.address')</th>
                                        <td><span class="glyphicon glyphicon-home"></span> {{ $storehouse->address }}</td>
                                    </tr>
                                    <tr>
                                        <th>@lang('messages.phone')</th>
                                        <td><span class="glyphicon glyphicon-earphone"></span> {{ $storehouse->phone }}</td>
                                    </tr>
                                    <tr>
                                        <th>{{ trans_choice('messages.pharmacies', 1) }}</th>
                                        <td>
                                            @if (isset($storehouse->pharmacy_id))
                                            <span class="glyphicon glyphicon-home"></span>
                                            <a class="btn btn-link" href="{{ action('PharmacyController@show', $storehouse->pharmacy_id) }}">{{ $storehouse->pharmacy->name }}</a>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>@lang('messages.created_at')</th>
                                        <td><span class="glyphicon glyphicon-time"></span> {{ $storehouse->created_at }}</td>
                                    </tr>
                                    <tr>
                                        <th>@lang('messages.updated_at')</th>
                                        <td><span class="glyphicon glyphicon-time"></span> {{ $storehouse->updated_at }}</td>
                                    </tr>
                            </table>
                            
                        </div>
                        
                        <div class="panel-footer">
                            <a class="btn btn-default" 
                               href="{{ action('StorehouseController@index') }}" 
                               title="{{ trans('messages.back') }}"
                               >
                                @lang('messages.back_to_all', ['name' => trans_choice('messages.storehouses', 2)])
                            </a>
                        </div>
                        
                    </div>
                </div>
            </div><!--/.row-->
            
@endsection
