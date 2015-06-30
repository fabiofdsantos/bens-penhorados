<!DOCTYPE html>

<head>
    <base href="/" />
    <title>Bens Penhorados</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">

    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/animate.css">

    <link rel="stylesheet" href="css/loading-bar.css">
</head>

<body ng-app="bens-penhorados">
    <!--[if lt IE 7]>
        <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->

    <div ng-include='"templates/header.html"'></div>
    <div ng-view></div>
    <div ng-include='"templates/footer.html"'></div>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

    <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.3.13/angular.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.3.13/angular-route.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.3.13/angular-resource.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.3.13/angular-animate.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.3.13/angular-touch.min.js"></script>

    <script src="js/modules/dirPagination.js"></script>
    <script src="js/modules/loading-bar.min.js"></script>

    <script src="//cdnjs.cloudflare.com/ajax/libs/angular-ui-bootstrap/0.13.0/ui-bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/angular-ui-bootstrap/0.13.0/ui-bootstrap-tpls.min.js"></script>

    <script src="js/main.js"></script>

    <!-- Controllers -->
    <script src="js/controllers/VehicleController.js"></script>

    <!-- Services -->
    <script src="js/services/VehicleService.js"></script>

</body>

</html>
