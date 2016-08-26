@extends('layouts.customer')

@section('title', trans('messages.contacts'))

@section('content')

@if (isset($pharmacy))

<div class="jumbotron">
    <h1 class="text-center">{{ $pharmacy->name }}</h1>
    <p>
        <strong>@lang('messages.address'):</strong>
        {{ $pharmacy->address }}
    </p>
    <p>
        <strong>@lang('messages.phone'):</strong>
        {{ $pharmacy->phone }}
    </p>

    <div class="iframe-container">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2877.061499011456!2d25.96798621550429!3d43.85455397911488!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40ae60b549ec2a87%3A0x1db831c20f8f622c!2z0KDRg9GB0LXQvdGB0LrQuCDRg9C90LjQstC10YDRgdC40YLQtdGCICLQkNC90LPQtdC7INCa0YrQvdGH0LXQsiI!5e0!3m2!1sen!2sbg!4v1472239668200" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
    </div>
</div>

@endif

@endsection
