@extends('layouts.admin')

@section('title', trans_choice('messages.pharmacies', 2))

@section('content')

            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">{{ trans_choice('messages.pharmacies', 2) }}</h1>
                </div>
            </div><!--/.row-->

            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">@lang('messages.pharmacy_table')</div>
                        <div class="panel-body">                            
                            <table data-toggle="table" data-show-toggle="true" data-show-columns="true" data-search="true" data-pagination="true" data-sort-name="name" data-sort-order="desc">
                                <thead>
                                    <tr>
                                        <th data-field="id" data-sortable="true">@lang('messages.id')</th>
                                        <th data-field="name"  data-sortable="true">@lang('messages.name')</th>
                                        <th data-field="uic" data-sortable="true">@lang('messages.uic')</th>
                                        <th data-field="accountable_person_name"  data-sortable="true">@lang('messages.accountable_person_name')</th>
                                        <th data-field="address" data-sortable="true">@lang('messages.address')</th>
                                        <th data-field="phone" data-sortable="true">@lang('messages.phone')</th>
                                        <th data-visible="false" data-field="created_at" data-sortable="true">@lang('messages.created_at')</th>
                                        <th data-visible="false" data-field="updated_at" data-sortable="true">@lang('messages.updated_at')</th>
                                        <th data-switchable="false">
                                            <a class="btn btn-primary btn-block" href="{{ action('PharmacyController@create') }}">
                                                <span class="glyphicon glyphicon-plus"></span> @lang('messages.create')
                                            </a>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($pharmacies as $key => $pharmacy)

                                    <tr>
                                        <td>{{ $pharmacy->id }}</td>
                                        <td>{{ $pharmacy->name }}</td>
                                        <td>{{ $pharmacy->uic }}</td>
                                        <td>{{ $pharmacy->accountable_person_name }}</td>
                                        <td>{{ $pharmacy->address }}</td>
                                        <td>{{ $pharmacy->phone }}</td>
                                        <td>{{ $pharmacy->created_at }}</td>
                                        <td>{{ $pharmacy->updated_at }}</td>
                                        <td class="text-center">
                                            {!! Form::open(['method' => 'DELETE', 'route' => ['pharmacy.destroy', $pharmacy->id]]) !!}
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a class="btn btn-primary" 
                                                   href="{{ action('PharmacyController@show', $pharmacy->id) }}"
                                                   title="{{ trans('messages.view') }}"
                                                   >
                                                    <span class="glyphicon glyphicon-eye-open"></span>
                                                </a>
                                                <a class="btn btn-primary" 
                                                   href="{{ action('PharmacyController@edit', $pharmacy->id) }}"
                                                   title="{{ trans('messages.edit') }}"                                                
                                                   >
                                                    <span class="glyphicon glyphicon-pencil"></span>
                                                </a>
                                                <button type="submit" title="{{ trans('messages.delete') }}" class="btn btn-primary" onclick="return confirm('{{ trans('messages.confirm_delete', ['delete_wath' => $pharmacy->name]) }}');">
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
