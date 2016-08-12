@extends('layouts.admin')

@section('title', trans_choice('messages.product_providers', 1))

@section('content')

            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">{{ trans_choice('messages.product_providers', 1) }}</h1>
                </div>
            </div><!--/.row-->

            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading text-center">{{ $productProvider->name }}</div>
                        <div class="panel-body">
                            <table class="table table-striped table-bordered">
                                    <tr>
                                        <th>@lang('messages.id')</th>
                                        <td>{{ $productProvider->id }}</td>
                                    </tr>
                                    <tr>
                                        <th>@lang('messages.uic')</th>
                                        <td><span class="glyphicon glyphicon-barcode"></span> {{ $productProvider->uic }}</td>
                                    </tr>
                                    <tr>
                                        <th>@lang('messages.accountable_person_name')</th>
                                        <td><span class="glyphicon glyphicon-user"></span> {{ $productProvider->accountable_person_name }}</td>
                                    </tr>
                                    <tr>
                                        <th>@lang('messages.address')</th>
                                        <td><span class="glyphicon glyphicon-home"></span> {{ $productProvider->address }}</td>
                                    </tr>
                                    <tr>
                                        <th>@lang('messages.phone')</th>
                                        <td><span class="glyphicon glyphicon-earphone"></span> {{ $productProvider->phone }}</td>
                                    </tr>
                                    <tr>
                                        <th>@lang('messages.created_at')</th>
                                        <td><span class="glyphicon glyphicon-time"></span> {{ $productProvider->created_at }}</td>
                                    </tr>
                                    <tr>
                                        <th>@lang('messages.updated_at')</th>
                                        <td><span class="glyphicon glyphicon-time"></span> {{ $productProvider->updated_at }}</td>
                                    </tr>
                            </table>
                            
                        </div>
                        
                        <div class="panel-footer">
                            <a class="btn btn-default" 
                               href="{{ action('ProductProviderController@index') }}" 
                               title="{{ trans('messages.back') }}"
                               >
                                @lang('messages.back_to_all', ['name' => trans_choice('messages.product_providers', 2)])
                            </a>
                        </div>
                        
                    </div>
                </div>
            </div><!--/.row-->
            
@endsection
