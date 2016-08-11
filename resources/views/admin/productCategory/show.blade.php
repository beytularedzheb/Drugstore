@extends('layouts.admin')

@section('title', trans_choice('messages.product_categories', 1))

@section('content')

            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">{{ trans_choice('messages.product_categories', 1) }}</h1>
                </div>
            </div><!--/.row-->

            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading text-center">{{ $productCategory->name }}</div>
                        <div class="panel-body">
                            <table class="table table-striped table-bordered">
                                    <tr>
                                        <th>@lang('messages.id')</th>
                                        <td>{{ $productCategory->id }}</td>
                                    </tr>
                                    <tr>
                                        <th>@lang('messages.description')</th>
                                        <td><span class="glyphicon glyphicon-list-alt"></span> {{ $productCategory->description }}</td>
                                    </tr>
                                    <tr>
                                        <th>@lang('messages.created_at')</th>
                                        <td><span class="glyphicon glyphicon-time"></span> {{ $productCategory->created_at }}</td>
                                    </tr>
                                    <tr>
                                        <th>@lang('messages.updated_at')</th>
                                        <td><span class="glyphicon glyphicon-time"></span> {{ $productCategory->updated_at }}</td>
                                    </tr>
                            </table>
                            
                        </div>
                        
                        <div class="panel-footer">
                            <a class="btn btn-default" 
                               href="{{ action('ProductCategoryController@index') }}" 
                               title="{{ trans('messages.back') }}"
                               >
                                @lang('messages.back_to_all', ['name' => trans_choice('messages.product_categories', 2)])
                            </a>
                        </div>
                        
                    </div>
                </div>
            </div><!--/.row-->
            
@endsection
