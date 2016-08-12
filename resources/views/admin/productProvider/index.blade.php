@extends('layouts.admin')

@section('title', trans_choice('messages.product_providers', 2))

@section('content')

            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">{{ trans_choice('messages.product_providers', 2) }}</h1>
                </div>
            </div><!--/.row-->

            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">XXXXXXX</div>
                        <div class="panel-body">                            
                            <table data-toggle="table" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-pagination="true" data-sort-name="name" data-sort-order="desc">
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
                                            <a class="btn btn-primary btn-block" href="{{ action('ProductProviderController@create') }}">
                                                <span class="glyphicon glyphicon-plus"></span> @lang('messages.create')
                                            </a>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($productProviders as $key => $productProvider)

                                    <tr>
                                        <td>{{ $productProvider->id }}</td>
                                        <td>{{ $productProvider->name }}</td>
                                        <td>{{ $productProvider->uic }}</td>
                                        <td>{{ $productProvider->accountable_person_name }}</td>
                                        <td>{{ $productProvider->address }}</td>
                                        <td>{{ $productProvider->phone }}</td>
                                        <td>{{ $productProvider->created_at }}</td>
                                        <td>{{ $productProvider->updated_at }}</td>
                                        <td class="text-center">
                                            {!! Form::open(['method' => 'DELETE', 'route' => ['productProvider.destroy', $productProvider->id]]) !!}
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a class="btn btn-primary" 
                                                   href="{{ action('ProductProviderController@show', $productProvider->id) }}"
                                                   title="{{ trans('messages.view') }}"
                                                   >
                                                    <span class="glyphicon glyphicon-eye-open"></span>
                                                </a>
                                                <a class="btn btn-primary" 
                                                   href="{{ action('ProductProviderController@edit', $productProvider->id) }}"
                                                   title="{{ trans('messages.edit') }}"                                                
                                                   >
                                                    <span class="glyphicon glyphicon-pencil"></span>
                                                </a>
                                                <button type="submit" title="{{ trans('messages.delete') }}" class="btn btn-primary" onclick="return confirm('{{ trans('messages.confirm_delete', ['delete_wath' => $productProvider->name]) }}');">
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
