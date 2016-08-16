@extends('layouts.admin')

@section('title', trans_choice('messages.pharmacies', 1))

@section('content')

            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">{{ trans_choice('messages.pharmacies', 1) }}</h1>
                </div>
            </div><!--/.row-->

            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading text-center">{{ $pharmacy->name }}</div>
                        <div class="panel-body">
                            <table class="table table-striped table-bordered">
                                    <tr>
                                        <th>@lang('messages.id')</th>
                                        <td>{{ $pharmacy->id }}</td>
                                    </tr>
                                    <tr>
                                        <th>@lang('messages.uic')</th>
                                        <td><span class="glyphicon glyphicon-barcode"></span> {{ $pharmacy->uic }}</td>
                                    </tr>
                                    <tr>
                                        <th>@lang('messages.accountable_person_name')</th>
                                        <td><span class="glyphicon glyphicon-user"></span> {{ $pharmacy->accountable_person_name }}</td>
                                    </tr>
                                    <tr>
                                        <th>@lang('messages.address')</th>
                                        <td><span class="glyphicon glyphicon-home"></span> {{ $pharmacy->address }}</td>
                                    </tr>
                                    <tr>
                                        <th>@lang('messages.phone')</th>
                                        <td><span class="glyphicon glyphicon-earphone"></span> {{ $pharmacy->phone }}</td>
                                    </tr>
                                    <tr>
                                        <th>{{ trans_choice('messages.storehouses', 2) }}</th>
                                        <td>
                                            @if(isset($pharmacy->storehouses))
                                            <ul class="list-unstyled">
                                                @foreach($pharmacy->storehouses as $key => $storehouse)
                                                <li><a class="btn btn-link" href="{{ action('StorehouseController@show', $storehouse->id) }}">{{ $storehouse->name }}</a></li>
                                                @endforeach
                                            </ul>
                                            @endif
                                        </td>
                                    </tr> 
                                    <tr>
                                        <th>@lang('messages.created_at')</th>
                                        <td><span class="glyphicon glyphicon-time"></span> {{ $pharmacy->created_at }}</td>
                                    </tr>
                                    <tr>
                                        <th>@lang('messages.updated_at')</th>
                                        <td><span class="glyphicon glyphicon-time"></span> {{ $pharmacy->updated_at }}</td>
                                    </tr>
                            </table>
                            
                        </div>
                        
                        <div class="panel-footer">
                            <a class="btn btn-default" 
                               href="{{ action('PharmacyController@index') }}" 
                               title="{{ trans('messages.back') }}"
                               >
                                @lang('messages.back_to_all', ['name' => trans_choice('messages.pharmacies', 2)])
                            </a>
                        </div>
                        
                    </div>
                </div>
            </div><!--/.row-->
            
@endsection
