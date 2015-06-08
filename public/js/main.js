var app = angular.module('bens-penhorados', [
    'ngRoute',
    'angularUtils.directives.dirPagination',
    'angular-loading-bar'
]);

app.config(['cfpLoadingBarProvider', function(cfpLoadingBarProvider) {
    cfpLoadingBarProvider.includeSpinner = true;
}]);

app.config(function(paginationTemplateProvider) {
    paginationTemplateProvider.setPath('js/modules/dirPagination.tpl.html');
});

app.config(['$routeProvider', function($routeProvider) {
    $routeProvider
        .when('/', {
            templateUrl: 'partials/home.html',
            controller: 'HomeCtrl'
        })
        .when('/404', {
            templateUrl: 'partials/404.html'
        })
        .when('/login', {
            templateUrl: 'partials/login.html',
            controller: 'LoginCtrl'
        })
        .when('/register', {
            templateUrl: 'partials/register.html'
        })
        .when('/vehicles', {
            templateUrl: 'partials/vehicles.html',
            controller: 'VehiclesCtrl'
        })
        .otherwise({
            redirectTo: '/404'
        });
}]);

app.controller('HomeCtrl', function($scope, $http) {
    $http.get('../api/v1/home').then(function(response) {
        $scope.newItems = response.data.newItems;
        $scope.endingSoon = response.data.endingSoon;
    });
});

app.controller('VehiclesCtrl', function($scope, $http) {
    $scope.items = [];
    $scope.totalItems = 0;
    $scope.itemsFrom = 0;
    $scope.itemsTo = 0;
    $scope.itemsPerPage = 5;
    $scope.pagination = {
        current: 1
    };
    $scope.itemsPerPageValues = [{
        "id": 5,
        "name": "5"
    }, {
        "id": 15,
        "name": "15"
    }, {
        "id": 25,
        "name": "25"
    }, {
        "id": 50,
        "name": "50"
    }, {
        "id": 100,
        "name": "100"
    }];

    getResultsPage(1);

    $scope.$watch('itemsPerPage', function(newValue, oldValue) {
        if (!angular.equals(newValue, oldValue)) {
            getResultsPage(1);
        }
    });

    $scope.pageChanged = function(newPage) {
        getResultsPage(newPage);
    };

    function getResultsPage(pageNumber) {
        $http.post('../api/v1/vehicles', {
            page: pageNumber,
            limit: $scope.itemsPerPage,
        }).then(function(response) {
            $scope.items = response.data.items;
            $scope.totalItems = response.data.total;
            $scope.itemsFrom = response.data.from;
            $scope.itemsTo = response.data.to;
        });
    }
});
