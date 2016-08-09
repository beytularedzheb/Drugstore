@extends('layouts.admin')

@section('title', trans_choice('messages.users', 1))

@section('content')

            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">{{ $user->name }}</h1>
                </div>
            </div><!--/.row-->
@endsection
