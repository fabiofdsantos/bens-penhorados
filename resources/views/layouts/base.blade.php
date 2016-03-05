<!DOCTYPE html>
<html data-ng-app="bens-penhorados">

    <head>
        <title>{{ $seoTitle or 'Venda de Bens Penhorados em Portugal' }}</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        @if(isset($metaDescription) && !empty($metaDescription))
        <meta name="description" content="{{ $metaDescription }}">
        @endif

        <meta name="robots" content="{{ $metaRobots or 'index, follow' }}">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <link rel="stylesheet" href="/css/main.css">
        <link rel="stylesheet" href="/css/animate.css">

        <link rel="stylesheet" href="/css/loading-bar.css">
    </head>

    <body>
        <!--[if lt IE 7]> <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p> <![endif]-->

        <nav class="navbar navbar-default navbar-fixed-top">
            @include('layouts.partials.nav')
        </nav>
            @yield('main')
        <footer>
            @include('layouts.partials.footer')
        </footer>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

        <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.4.3/angular.js"></script>
        <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.4.3/angular-route.min.js"></script>
        <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.4.3/angular-resource.min.js"></script>
        <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.4.3/angular-animate.min.js"></script>
        <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.4.3/angular-touch.min.js"></script>
        <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.4.3/angular-cookies.min.js"></script>

        <script src="/js/modules/dirPagination.js"></script>
        <script src="/js/modules/loading-bar.min.js"></script>
        <script src="/js/modules/focusIf.js"></script>

        <script src="//cdnjs.cloudflare.com/ajax/libs/angular-ui-bootstrap/0.13.0/ui-bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/angular-ui-bootstrap/0.13.0/ui-bootstrap-tpls.min.js"></script>

        <script src="/js/main.js"></script>
        <script src="/js/filters.js"></script>

        <!-- Controllers -->
        <script src="/js/controllers/UserControllers.js"></script>
        <script src="/js/controllers/PropertyControllers.js"></script>
        <script src="/js/controllers/VehicleControllers.js"></script>
        <script src="/js/controllers/OtherControllers.js"></script>
    </body>

</html>
