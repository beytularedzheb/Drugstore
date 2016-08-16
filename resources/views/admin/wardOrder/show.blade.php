@extends('layouts.admin')

@section('title', trans_choice('messages.ward_orders', 1))

@section('content')

            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">{{ trans_choice('messages.ward_orders', 1) }}</h1>
                </div>
            </div><!--/.row-->

            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading text-center">@lang('messages.id') - {{ $wardOrder->id }}</div>
                        <div class="panel-body">
                            <table class="table table-striped table-bordered">
                                    <tr>
                                        <th>@lang('messages.id')</th>
                                        <td>{{ $wardOrder->id }}</td>
                                    </tr>
                                    <tr>
                                        <th>@lang('messages.issue_date')</th>
                                        <td><span class="glyphicon glyphicon-time"></span> {{ $wardOrder->issue_date }}</td>
                                    </tr>
                                    <tr>
                                        <th>@lang('messages.state')</th>
                                        <td><span class="glyphicon glyphicon-book"></span> {{ $wardOrder->state }}</td>
                                    </tr>
                                    <tr>
                                        <th>@lang('messages.receiver')</th>
                                        <td><span class="glyphicon glyphicon-user"></span> {{ $wardOrder->receiver_name }}</td>
                                    </tr>
                                    <tr>
                                        <th>@lang('messages.sender')</th>
                                        <td><span class="glyphicon glyphicon-user"></span> {{ $wardOrder->sender_name }}</td>
                                    </tr>
                                    <tr>
                                        <th>{{ trans_choice('messages.ward_order_lines', 2) }}</th>
                                        <td>
                                            @if(isset($wardOrder->orderLines))
                                            <ul class="list-unstyled">
                                                @foreach($wardOrder->orderLines as $key => $wardOrderLine)
                                                <li><a class="btn btn-link" href="{{ action('WardOrderLineController@show', $wardOrderLine->id) }}">{{ $wardOrderLine->product->name or '' }} - {{ $wardOrderLine->quantity }}</a></li>
                                                @endforeach
                                            </ul>
                                            @endif
                                        </td>
                                    </tr> 
                                    <tr>
                                        <th>@lang('messages.requester')</th>
                                        <td>
                                            <span class="glyphicon glyphicon-user"></span>
                                            <a class="btn btn-link" href="{{ action('WardController@show', $wardOrder->requester_id) }}">{{ $wardOrder->requester->name or '' }}</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>@lang('messages.requested_from')</th>
                                        <td>
                                            <span class="glyphicon glyphicon-user"></span>
                                            <a class="btn btn-link" href="{{ action('PharmacyController@show', $wardOrder->requested_from_id) }}">{{ $wardOrder->requestedFrom->name or '' }}</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>@lang('messages.requested_for')</th>
                                        <td>
                                            <span class="glyphicon glyphicon-user"></span>
                                            <a class="btn btn-link" href="{{ action('PatientController@show', $wardOrder->requested_for_id) }}">{{ $wardOrder->requestedFor->name or '' }}</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>@lang('messages.created_at')</th>
                                        <td><span class="glyphicon glyphicon-time"></span> {{ $wardOrder->created_at }}</td>
                                    </tr>
                                    <tr>
                                        <th>@lang('messages.updated_at')</th>
                                        <td><span class="glyphicon glyphicon-time"></span> {{ $wardOrder->updated_at }}</td>
                                    </tr>
                            </table>
                            
                        </div>
                        
                        <div class="panel-footer">
                            <a class="btn btn-default" 
                               href="{{ action('WardOrderController@index') }}" 
                               title="{{ trans('messages.back') }}"
                               >
                                @lang('messages.back_to_all', ['name' => trans_choice('messages.ward_orders', 2)])
                            </a>
                        </div>
                        
                    </div>
                </div>
            </div><!--/.row-->
            
@endsection
