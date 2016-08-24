@extends('layouts.admin')

@section('title', trans('messages.new_orders'))

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">{{ trans('messages.new_orders') }}</h1>
    </div>
</div><!--/.row-->

@include('partials.alerts.success')

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-body">                            
                <table data-toggle="table" data-show-toggle="true" data-show-columns="true" data-search="true" data-pagination="true" data-sort-name="issued_date">
                    <thead>
                        <tr>
                            <th data-field="id" data-sortable="true">@lang('messages.id')</th>
                            <th data-field="issue_date" data-sortable="true">@lang('messages.issue_date')</th>
                            <th data-field="state" data-sortable="true">@lang('messages.state')</th>
                            <th data-field="receiver_name" data-sortable="true">@lang('messages.receiver')</th>
                            <th data-field="sender_name" data-sortable="true">@lang('messages.sender')</th>
                            <th data-field="requester_id" data-sortable="true">@lang('messages.requester')</th>
                            <th data-field="requested_from_id" data-sortable="true">@lang('messages.requested_from')</th>
                            <th data-field="requested_for_id" data-sortable="true">@lang('messages.requested_for')</th>
                            <th data-visible="false" data-field="created_at" data-sortable="true">@lang('messages.created_at')</th>
                            <th data-visible="false" data-field="updated_at" data-sortable="true">@lang('messages.updated_at')</th>
                            <th data-switchable="false"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)

                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->issue_date }}</td>
                            <td>{{ $order->state }}</td>
                            <td>{{ $order->receiver_name }}</td>
                            <td>
                                {!! Form::open(['method' => 'GET', 'action' => ['AdminController@updateSenderName', $order->id]]) !!}         

                                <div class="input-group">
                                    {!! Form::text('sender_name', $order->sender_name, ['class'=>'form-control']) !!}
                                    <span class="input-group-btn center-block">
                                        <button type="submit" title="{{ trans('messages.update') }}" class="btn btn-success">
                                            <span class="glyphicon glyphicon-refresh"></span>
                                        </button>
                                    </span>
                                    @if ($errors->has('sender_name')) <p class="text-danger">{{ $errors->first('sender_name') }}</p> @endif
                                </div>
                                
                                {!! Form::close() !!}
                            </td>
                            <td>{{ $order->requester->name or '' }}</td>
                            <td>{{ $order->requestedFrom->name or '' }}</td>
                            <td>{{ $order->requestedFor->name or '' }}</td>
                            <td>{{ $order->created_at }}</td>
                            <td>{{ $order->updated_at }}</td>
                            <td class="text-center">

                                {!! Form::open(['method' => 'GET', 'action' => ['AdminController@confirmOrder', $order->id]]) !!}
                                <button class="btn btn-success btn-sm" type="submit" title="{{ trans('messages.confirm') }}">
                                    <span class="glyphicon glyphicon-thumbs-up"></span>
                                </button>
                                {!! Form::close() !!}

                                {!! Form::open(['method' => 'GET', 'action' => ['AdminController@rejectOrder', $order->id]]) !!}
                                <button class="btn btn-danger btn-sm" type="submit" title="{{ trans('messages.reject') }}">
                                    <span class="glyphicon glyphicon-thumbs-down"></span>
                                </button>
                                {!! Form::close() !!}

                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>                            
            </div>
        </div>
    </div>
</div><!--/.row-->
@endsection