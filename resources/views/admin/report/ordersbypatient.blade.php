@extends('layouts.admin')

@section('title', trans_choice('messages.reports', 1))

@section('content')

<div class="panel panel-default">
    <div class="panel-heading"><h3>@lang('messages.orders_by_patient')</h3></div>
    <div class="panel-body">
        {!! Form::open(['method' => 'POST', 'action' => ['ReportController@postOrdersByPatient']]) !!}

        <select class="form-control" name="patient_id" onchange="submit()">
            <option value=""></option>
            @foreach (App\Patient::all() as $patient)
            <option value="{{ $patient->id }}">{{ $patient->name }}</option>
            @endforeach
        </select>

        {!! Form::close() !!}
    </div>

</div><!--/.row-->

@if (isset($orders))
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-body">                            
                <table data-toggle="table" data-show-toggle="true" data-show-columns="true" data-search="true" data-pagination="true" data-sort-name="created_at">
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
                            <th data-switchable="false">
                                <a class="btn btn-primary btn-block" href="{{ action('WardOrderController@create') }}">
                                    <span class="glyphicon glyphicon-plus"></span> @lang('messages.create')
                                </a>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                        <?php
                        $rowStyleClass = '';
                        if ($order->state == 'confirmed') {
                            $rowStyleClass = 'success';
                        } else if ($order->state == 'rejected') {
                            $rowStyleClass = 'danger';
                        }
                        ?>
                        <tr class="{{ $rowStyleClass }}">
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->issue_date }}</td>
                            <td>{{ $order->state }}</td>
                            <td>{{ $order->receiver_name }}</td>
                            <td>{{ $order->sender_name }}</td>
                            <td>{{ $order->requester->name or '' }}</td>
                            <td>{{ $order->requestedFrom->name or '' }}</td>
                            <td>{{ $order->requestedFor->name or '' }}</td>
                            <td>{{ $order->created_at }}</td>
                            <td>{{ $order->updated_at }}</td>
                            <td class="text-center">
                                {!! Form::open(['method' => 'DELETE', 'route' => ['wardOrder.destroy', $order->id]]) !!}
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a class="btn btn-primary" 
                                       href="{{ action('WardOrderController@show', $order->id) }}"
                                       title="{{ trans('messages.view') }}"
                                       >
                                        <span class="glyphicon glyphicon-eye-open"></span>
                                    </a>
                                    <a class="btn btn-primary" 
                                       href="{{ action('WardOrderController@edit', $order->id) }}"
                                       title="{{ trans('messages.edit') }}"                                                
                                       >
                                        <span class="glyphicon glyphicon-pencil"></span>
                                    </a>
                                    <button type="submit" title="{{ trans('messages.delete') }}" class="btn btn-primary" onclick="return confirm('{{ trans('messages.confirm_delete', ['delete_wath' => $order->name]) }}');">
                                        <span class="glyphicon glyphicon-trash"></span>
                                    </button>
                                </div>
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
@endif

@endsection