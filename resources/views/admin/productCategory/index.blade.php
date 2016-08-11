@extends('layouts.admin')

@section('title', trans_choice('messages.product_categories', 2))

@section('content')

            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">{{ trans_choice('messages.product_categories', 2) }}</h1>
                </div>
            </div><!--/.row-->

            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">{{ trans_choice('messages.product_categories', 2) }}</div>
                        <div class="panel-body">                            
                            <table data-toggle="table" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-pagination="true" data-sort-name="name" data-sort-order="desc">
                                <thead>
                                    <tr>
                                        <th data-field="id" data-sortable="true">@lang('messages.id')</th>
                                        <th data-field="name"  data-sortable="true">@lang('messages.name')</th>
                                        <th data-field="description" data-sortable="true">@lang('messages.description')</th>
                                        <th data-field="created_at" data-sortable="true">@lang('messages.created_at')</th>
                                        <th data-field="updated_at" data-sortable="true">@lang('messages.updated_at')</th>
                                        <th data-sortable="false">
                                            <a class="btn btn-primary btn-block" href="{{ action('ProductCategoryController@create') }}">
                                                <span class="glyphicon glyphicon-plus"></span> @lang('messages.create')
                                            </a>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($productCategories as $key => $productCategory)

                                    <tr>
                                        <td>{{ $productCategory->id }}</td>
                                        <td>{{ $productCategory->name }}</td>
                                        <td>{{ $productCategory->description }}</td>
                                        <td>{{ $productCategory->created_at }}</td>
                                        <td>{{ $productCategory->updated_at }}</td>
                                        <td class="text-center">
                                            {!! Form::open(['method' => 'DELETE', 'route' => ['productCategory.destroy', $productCategory->id]]) !!}
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a class="btn btn-primary" 
                                                   href="{{ action('ProductCategoryController@show', $productCategory->id) }}"
                                                   title="{{ trans('messages.view') }}"
                                                   >
                                                    <span class="glyphicon glyphicon-eye-open"></span>
                                                </a>
                                                <a class="btn btn-primary" 
                                                   href="{{ action('ProductCategoryController@edit', $productCategory->id) }}"
                                                   title="{{ trans('messages.edit') }}"                                                
                                                   >
                                                    <span class="glyphicon glyphicon-pencil"></span>
                                                </a>
                                                <button type="submit" title="{{ trans('messages.delete') }}" class="btn btn-primary" onclick="return confirm('{{ trans('messages.confirm_delete', ['delete_wath' => $productCategory->name]) }}');">
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
