@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <?php $panelClass = 'panel panel-default' ?>
            @if(Session::has('flash_message'))
                <?php $panelClass = 'panel panel-danger' ?>
            @endif
            
            <div class="{{ $panelClass }}">
                <div class="panel-heading">@lang('messages.hi_username', ['name' => auth()->user()->name])</div>

                <div class="panel-body">
                    @if(Session::has('flash_message'))
                        {{ Session::get('flash_message') }}
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
