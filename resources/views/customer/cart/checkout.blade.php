@extends('layouts.customer')

@section('title', trans('messages.checkout'))

@section('content')

<table class="table table-bordered table-striped table-condensed">
    <thead>
        <tr>
            <th>@lang('messages.id')</th>
            <th>@lang('messages.name')</th>
            <th>@lang('messages.quantity')</th>
            <th>@lang('messages.unit_price_in_leva')</th>
            <th>@lang('messages.subtotal')</th>
        </tr>
    </thead>
    <tfoot>
    <h4 class="well well-sm pull-right text-success">
        <strong>@lang('messages.total'): </strong>{{ number_format($total, 2) }}
    </h4>
    </tfoot>
<tbody>
    <?php $index = 1 ?>
    @foreach($products as $product)

    <tr>
        <td>{{ $index++ }}</td>
        <td>{{ $product->name }}</td>
        <td>{{ $product->qty }}</td>
        <td>{{ number_format($product->price, 2) }}</td>
        <td>{{ number_format($product->subtotal, 2) }}</td>
    </tr>
    @endforeach

</tbody>
</table>

<div class="row">
{!! Form::open(['method' => 'POST', 'action' => ['Customer\ShoppingCartController@postSendOrder']]) !!}

@include('partials.rows.label-text', ['fieldname' => 'receiver_name', 'label' => trans('messages.receiver')])

@include('partials.rows.label-select', [
'fieldname' => 'pharmacy_id', 
'label' => trans_choice('messages.pharmacies', 1), 
'select_items' => App\Pharmacy::pluck('name', 'id')
])

@include('partials.rows.label-select', [
'fieldname' => 'patient_id', 
'label' => trans_choice('messages.patients', 1), 
'select_items' => App\Patient::pluck('name', 'id')
])

<button type="submit" class="btn btn-success pull-right">@lang('messages.send')</button>

{!! Form::close() !!}

</div>

@endsection