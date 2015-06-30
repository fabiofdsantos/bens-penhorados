var app = angular.module('bens-penhorados', [
    'ngRoute',
    'ngResource',
    'angularUtils.directives.dirPagination',
    'angular-loading-bar',
    'ui.bootstrap'
]);

app.config(['cfpLoadingBarProvider', function(cfpLoadingBarProvider) {
    cfpLoadingBarProvider.includeSpinner = true;
}]);

app.config(function(paginationTemplateProvider) {
    paginationTemplateProvider.setPath('js/modules/dirPagination.tpl.html');
});

app.config(['$locationProvider', '$routeProvider', function($locationProvider, $routeProvider) {
    $locationProvider.html5Mode({
      enabled: true
    });
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
            controller: 'VehicleListCtrl'
        })
        .when('/vehicles/:id', {
            templateUrl: 'partials/vehicles-single.html',
            controller: 'VehicleCtrl'
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
