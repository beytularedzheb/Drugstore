@extends('layouts.admin')

@section('title', trans_choice('messages.reports', 1))

@section('content')

<div class="panel panel-default">
    <div class="panel-heading"><h3>@lang('messages.not_available_products')</h3></div>
    <div class="panel-body">
        {!! Form::open(['method' => 'POST', 'action' => ['ReportController@postNotAvailableProducts']]) !!}

        <select class="form-control" name="category_id" onchange="submit()">
            <option value=""></option>
            @foreach (App\ProductCategory::all() as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>

        {!! Form::close() !!}
    </div>

</div><!--/.row-->

@if (isset($products))
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-body">                            
                <table data-toggle="table" data-show-toggle="true" data-show-columns="true" data-search="true" data-pagination="true" data-sort-name="name" data-sort-order="desc">
                    <thead>
                        <tr>
                            <th data-field="id" data-sortable="true">@lang('messages.id')</th>
                            <th data-field="name"  data-sortable="true">@lang('messages.name')</th>
                            <th data-field="description" data-sortable="true">@lang('messages.description')</th>
                            <th data-field="unit_price_in_leva"  data-sortable="true">@lang('messages.unit_price_in_leva')</th>
                            <th data-field="unit" data-sortable="true">@lang('messages.unit')</th>
                            <th data-field="available_quantity" data-sortable="true">@lang('messages.available_quantity')</th>
                            <th data-field="category_id" data-sortable="true">{{ trans_choice('messages.product_categories', 1) }}</th>
                            <th data-field="storehouse_id" data-sortable="true">{{ trans_choice('messages.storehouses', 1) }}</th>
                            <th data-visible="false" data-field="created_at" data-sortable="true">@lang('messages.created_at')</th>
                            <th data-visible="false" data-field="updated_at" data-sortable="true">@lang('messages.updated_at')</th>
                            <th data-switchable="false">
                                <a class="btn btn-primary btn-block" href="{{ action('ProductController@create') }}">
                                    <span class="glyphicon glyphicon-plus"></span> @lang('messages.create')
                                </a>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)

                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->description }}</td>
                            <td>{{ $product->unit_price_in_leva }}</td>
                            <td>{{ $product->unit }}</td>
                            <td>{{ $product->available_quantity }}</td>
                            <td>{{ $product->productCategory->name or '' }}</td>
                            <td>{{ $product->storehouse->name or '' }}</td>
                            <td>{{ $product->created_at }}</td>
                            <td>{{ $product->updated_at }}</td>
                            <td class="text-center">
                                {!! Form::open(['method' => 'DELETE', 'route' => ['product.destroy', $product->id]]) !!}
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a class="btn btn-primary" 
                                       href="{{ action('ProductController@show', $product->id) }}"
                                       title="{{ trans('messages.view') }}"
                                       >
                                        <span class="glyphicon glyphicon-eye-open"></span>
                                    </a>
                                    <a class="btn btn-primary" 
                                       href="{{ action('ProductController@edit', $product->id) }}"
                                       title="{{ trans('messages.edit') }}"                                                
                                       >
                                        <span class="glyphicon glyphicon-pencil"></span>
                                    </a>
                                    <button type="submit" title="{{ trans('messages.delete') }}" class="btn btn-primary" onclick="return confirm('{{ trans('messages.confirm_delete', ['delete_wath' => $product->name]) }}');">
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