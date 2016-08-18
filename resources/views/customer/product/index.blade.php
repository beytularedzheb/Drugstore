@extends('layouts.customer')

@section('title', trans_choice('messages.products', 2))

@section('content')

<div class="row">

    @foreach($products as $key => $product)

    {!! Form::open(['method' => 'POST', 'action' => ['Customer\ShoppingCartController@postAdd', $product->id]]) !!}

    <div class="col-md-4 col-sm-6 col-xs-12 ">
        <div class="thumbnail">
            <img src="http://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image">
            <div class="caption">
                <h3>{{ $product->name }}</h3>
                <p>@lang('messages.price'): {{ number_format($product->unit_price_in_leva, 2) }}</p>
                <p><button class="btn btn-success btn-block text-uppercase">@lang('messages.add_to_cart') <span class="glyphicon glyphicon-shopping-cart"</span></button></p>
            </div>
        </div>
    </div>

    {!! Form::close() !!}
    @endforeach

</div>

@endsection
