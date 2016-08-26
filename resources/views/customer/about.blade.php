@extends('layouts.customer')

@section('title', trans('messages.contacts'))

@section('content')

<h1 class="text-center text-success">@lang('messages.about')</h1>
<div class="well" style="margin-top: 1em; margin-bottom: 2em;">
    <p>@lang('text.intro_pharmacy')</p>
</div>

@endsection
