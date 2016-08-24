@extends('layouts.admin')

@section('title', trans_choice('messages.reports', 2))

@section('content')

<ul>
    <li><a href="{{ action('ReportController@getOrdersByWard') }}">@lang('messages.orders_by_ward')</a></li>
    <li><a href="{{ action('ReportController@getOrdersByPatient') }}">@lang('messages.orders_by_patient')</a></li>
    <li><a href="{{ action('ReportController@getNotAvailableProducts') }}">@lang('messages.not_available_products')</a></li>
    <li><a href="{{ action('ReportController@getProductsByStorehouse') }}">@lang('messages.products_by_storehouse')</a></li>
    <li><a href="{{ action('ReportController@getPatientsByWard') }}">@lang('messages.patients_by_ward')</a></li>
</ul>

@endsection
