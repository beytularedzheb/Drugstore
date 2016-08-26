@extends('layouts.customer')

@section('title', trans('messages.home_page'))

@section('content')

<h1 class="text-center text-success">@lang('messages.app_name')</h1>
<div class="well" style="margin-top: 1em; margin-bottom: 2em;">
    <p>@lang('text.intro_pharmacy')</p>
    <img class="img-responsive" src="{{ URL::asset('assets/images/carousel0.jpg') }}" alt="img1">
</div>

<div class="well" style="margin-top: 1em; margin-bottom: 2em;">
    <h3 class="text-center text-success">@lang('text.explore_pharmacy')</h3>

    <div id="myCarousel" style="max-width: 1024px;" class="carousel slide center-block" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
            <li data-target="#myCarousel" data-slide-to="3"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner" style="border: 0.25em solid greenyellow; border-radius: 50px !important;" role="listbox">
            <div class="item active">
                <img class="img-responsive" style="border-radius: 50px;" src="{{ URL::asset('assets/images/carousel3.jpg') }}" alt="img4">
            </div>

            <div class="item">
                <img class="img-responsive" style="border-radius: 50px;" src="{{ URL::asset('assets/images/carousel1.jpg') }}" alt="img2">
            </div>

            <div class="item">
                <img class="img-responsive" style="border-radius: 50px;" src="{{ URL::asset('assets/images/carousel2.jpg') }}" alt="img3">
            </div>

            <div class="item">
                <img class="img-responsive" style="border-radius: 50px;" src="{{ URL::asset('assets/images/carousel0.jpg') }}" alt="img1">
            </div>
        </div>

        <!-- Left and right controls -->
        <a class="left carousel-control" style="border-radius: 50px 0 0 50px;" href="#myCarousel" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">@lang('pagination.previous')</span>
        </a>
        <a class="right carousel-control" style="border-radius: 0 50px 50px 0;" href="#myCarousel" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">@lang('pagination.next')</span>
        </a>
    </div>
</div>

@endsection