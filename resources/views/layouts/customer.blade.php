<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf_token" content="{{ csrf_token() }}">

        <title>@yield('title')</title>

        <link href="{{ URL::asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">

        <!--[if lt IE 9]>
        <script src="{{ URL::asset('assets/js/html5shiv.js') }}"></script>
        <script src="{{ URL::asset('assets/js/respond.min.js') }}"></script>
        <![endif]-->

    </head>

    <body>
        <nav class="navbar navbar-default">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">@lang('messages.app_name')</a>
                </div>
                <div class="collapse navbar-collapse" id="navbar-collapse">
                    <ul class="nav navbar-nav navbar-left">
                        <li><a href="{{ action('Customer\ProductController@index') }}">{{ trans_choice('messages.products', 2) }}</a></li>
                    </ul>
                    <ul class="user-menu nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user"</span> {{ Auth::user()->name }} <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#"><span class="glyphicon glyphicon-user"</span> @lang('messages.profile')</a></li>
                                <li><a href="#"><span class="glyphicon glyphicon-cog"</span> @lang('messages.settings')</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="{{ url('/logout') }}"><span class="glyphicon glyphicon-log-out"</span> @lang('messages.logout')</a></li>
                            </ul>
                        </li>
                        <li><a href="{{ action('Customer\ShoppingCartController@getCartContent') }}"><span class="glyphicon glyphicon-shopping-cart"></span> @lang('messages.cart')</a></li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>

        <div class="container">
            @yield('content')
        </div><!--/.main-->

        <!-- Modal -->
        <div id="dlg-shopping" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="alert alert-success" role="alert">
                    <h4>{{ Session::get('added_product_message') }}</h4>
                </div>
            </div>
        </div>

        <script src="{{ URL::asset('assets/js/jquery-1.11.1.min.js') }}"></script>
        <script src="{{ URL::asset('assets/js/bootstrap.min.js') }}"></script>
        <script src="{{ URL::asset('assets/js/bootstrap-spinner.min.js') }}"></script>
        
        @if(Session::has('added_product_message'))

        <script>
$(window).load(function () {
    $('#dlg-shopping').modal('show');
    setTimeout(function () {
        $('#dlg-shopping').modal('hide');
    }, 1500);
});
        </script>

        @endif
        
        @yield('scripts')
    </body>

</html>
