@extends('layouts.admin')

@section('title', trans_choice('messages.reports', 2))

@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">{{ trans_choice('messages.reports', 2) }}</div>
            <div class="panel-body">  
                <ul class="list-group list-unstyled text-center text-capitalize">
                    <li><a class="list-group-item list-group-item-action" href="{{ action('ReportController@getOrdersByWard') }}">@lang('messages.orders_by_ward')</a></li>
                    <li><a class="list-group-item list-group-item-action" href="{{ action('ReportController@getOrdersByPatient') }}">@lang('messages.orders_by_patient')</a></li>
                    <li><a class="list-group-item list-group-item-action" href="{{ action('ReportController@getNotAvailableProducts') }}">@lang('messages.not_available_products')</a></li>
                    <li><a class="list-group-item list-group-item-action" href="{{ action('ReportController@getProductsByStorehouse') }}">@lang('messages.products_by_storehouse')</a></li>
                    <li><a class="list-group-item list-group-item-action" href="{{ action('ReportController@getPatientsByWard') }}">@lang('messages.patients_by_ward')</a></li>
                </ul>
            </div>
        </div>
    </div>
</div><!--/.row-->
@endsection
