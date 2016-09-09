@extends('layouts.admin')

@section('title', trans('messages.admin_panel'))

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">@lang('messages.dashboard')</h1>
    </div>
</div><!--/.row-->

<?php $new_orders_count = App\WardOrder::where('state', null)->count(); ?>

<div class="row">
    <a href="{{ action('AdminController@newOrders') }}">
        <div class="col-xs-12 col-md-6 col-lg-4">
            <div class="panel panel-blue panel-widget">
                <div class="row no-padding">
                    <div class="col-sm-2 col-lg-4 widget-left">
                        <svg class="glyph stroked bag"><use xlink:href="#stroked-bag"></use></svg>
                    </div>
                    <div class="col-sm-10 col-lg-8 widget-right">
                        <div class="large">{{ $new_orders_count or '0' }}</div>
                        <div class="text-muted">@lang('messages.new_orders')</div>
                    </div>
                </div>
            </div>
        </div>
    </a>
</div><!--/.row-->
@endsection