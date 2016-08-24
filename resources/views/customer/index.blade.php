@extends('layouts.customer')

@section('title', trans('messages.home_page'))

@section('content')
<div id="myCarousel" style="max-width: 1024px;" class="carousel slide center-block" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
        <li data-target="#myCarousel" data-slide-to="3"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
        <div class="item active">
            <img class="img-responsive" src="{{ URL::asset('assets/images/carousel0.jpg') }}" alt="img1">
        </div>

        <div class="item">
            <img class="img-responsive" src="{{ URL::asset('assets/images/carousel1.jpg') }}" alt="img2">
        </div>

        <div class="item">
            <img class="img-responsive" src="{{ URL::asset('assets/images/carousel2.jpg') }}" alt="img3">
        </div>

        <div class="item">
            <img class="img-responsive" src="{{ URL::asset('assets/images/carousel3.jpg') }}" alt="img4">
        </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">@lang('pagination.previous')</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">@lang('pagination.next')</span>
    </a>
</div>
@endsection