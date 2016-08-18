<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf_token" content="{{ csrf_token() }}">

        <title>@yield('title')</title>

        <link href="{{ URL::asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ URL::asset('assets/css/bootstrap-table.css') }}" rel="stylesheet">
        <link href="{{ URL::asset('assets/css/styles.css') }}" rel="stylesheet">

        <!--Icons-->
        <script src="{{ URL::asset('assets/js/lumino.glyphs.js') }}"></script>

        <!--[if lt IE 9]>
        <script src="{{ URL::asset('assets/js/html5shiv.js') }}"></script>
        <script src="{{ URL::asset('assets/js/respond.min.js') }}"></script>
        <![endif]-->

    </head>

    <body>
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#"><span>@lang('messages.app_name')</span> (@lang('messages.admin'))</a>
                    <ul class="user-menu">
                        <li class="dropdown pull-right">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> {{ Auth::user()->name }} <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> @lang('messages.profile')</a></li>
                                <li><a href="#"><svg class="glyph stroked gear"><use xlink:href="#stroked-gear"></use></svg> @lang('messages.settings')</a></li>
                                <li><a href="{{ url('/logout') }}"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> @lang('messages.logout')</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>

            </div><!-- /.container-fluid -->
        </nav>

        <div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
            @section('menu')
            <form role="search">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search">
                </div>
            </form>
            <ul class="nav menu">
                <li class="active"><a href=""><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> @lang('messages.dashboard')</a></li>
                <li class="parent ">
                    <a href="#">
                        <span data-toggle="collapse" href="#sub-item-1"><svg class="glyph stroked table"><use xlink:href="#stroked-table"></use></svg> @lang('messages.tables')</span>  
                    </a>
                    <ul class="children collapse" id="sub-item-1">
                        <li>
                            <a class="" href="{{ action('UserController@index') }}">
                                <svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> {{ trans_choice('messages.users', 2) }}
                            </a>
                        </li>
                        <li>
                            <a class="" href="{{ action('PharmacyController@index') }}">
                                <svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> {{ trans_choice('messages.pharmacies', 2) }}
                            </a>
                        </li>
                        <li>
                            <a class="" href="{{ action('WardController@index') }}">
                                <svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> {{ trans_choice('messages.wards', 2) }}
                            </a>
                        </li>
                        <li>
                            <a class="" href="{{ action('PatientController@index') }}">
                                <svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> {{ trans_choice('messages.patients', 2) }}
                            </a>
                        </li> 
                        <li>
                            <a class="" href="{{ action('ProductCategoryController@index') }}">
                                <svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> {{ trans_choice('messages.product_categories', 2) }}
                            </a>
                        </li>
                        <li>
                            <a class="" href="{{ action('ProductController@index') }}">
                                <svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> {{ trans_choice('messages.products', 2) }}
                            </a>
                        </li>
                        <li>
                            <a class="" href="{{ action('StorehouseController@index') }}">
                                <svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> {{ trans_choice('messages.storehouses', 2) }}
                            </a>
                        </li>
                        <li>
                            <a class="" href="{{ action('ProductProviderController@index') }}">
                                <svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> {{ trans_choice('messages.product_providers', 2) }}
                            </a>
                        </li>
                        <li>
                            <a class="" href="{{ action('PharmacyOrderController@index') }}">
                                <svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> {{ trans_choice('messages.pharmacy_orders', 2) }}
                            </a>
                        </li>
                        <li>
                            <a class="" href="{{ action('PharmacyOrderLineController@index') }}">
                                <svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> {{ trans_choice('messages.pharmacy_order_lines', 2) }}
                            </a>
                        </li>
                        <li>
                            <a class="" href="{{ action('WardOrderController@index') }}">
                                <svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> {{ trans_choice('messages.ward_orders', 2) }}
                            </a>
                        </li>
                        <li>
                            <a class="" href="{{ action('WardOrderLineController@index') }}">
                                <svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> {{ trans_choice('messages.ward_order_lines', 2) }}
                            </a>
                        </li>  
                    </ul>
                </li>
                <li role="presentation" class="divider"></li>
                <li><a href="{{ url('/') }}"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg> @lang('messages.home_page')</a></li>
            </ul>
            @show
        </div><!--/.sidebar-->

        <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
            @yield('content')
        </div><!--/.main-->

        <script src="{{ URL::asset('assets/js/jquery-1.11.1.min.js') }}"></script>
        <script src="{{ URL::asset('assets/js/bootstrap.min.js') }}"></script>
        <script src="{{ URL::asset('assets/js/bootstrap-table.js') }}"></script>
    </body>

</html>
