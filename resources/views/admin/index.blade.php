@extends('layouts.admin')

@section('title', trans('messages.admin_panel'))

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">@lang('messages.dashboard')</h1>
    </div>
</div><!--/.row-->

<div class="row">
    <div class="col-xs-12 col-md-6 col-lg-4">
        <div class="panel panel-blue panel-widget">
            <div class="row no-padding">
                <div class="col-sm-2 col-lg-4 widget-left">
                    <svg class="glyph stroked bag"><use xlink:href="#stroked-bag"></use></svg>
                </div>
                <div class="col-sm-10 col-lg-8 widget-right">
                    <div class="large">120</div>
                    <div class="text-muted">New Orders</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-md-6 col-lg-4">
        <div class="panel panel-teal panel-widget">
            <div class="row no-padding">
                <div class="col-sm-2 col-lg-4 widget-left">
                    <svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg>
                </div>
                <div class="col-sm-10 col-lg-8 widget-right">
                    <div class="large">24</div>
                    <div class="text-muted">New Users</div>
                </div>
            </div>
        </div>
    </div>
</div><!--/.row-->
@endsection