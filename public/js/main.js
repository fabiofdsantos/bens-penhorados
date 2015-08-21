var app = angular.module('bens-penhorados', [
    'ngRoute',
    'ngResource',
    'ngCookies',
    'angularUtils.directives.dirPagination',
    'angular-loading-bar',
    'ui.bootstrap',
    'bens-penhorados-filters'
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
            title: 'Bens Penhorados pelas Finanças',
            templateUrl: 'partials/home.html',
            controller: 'HomeCtrl'
        })
        .when('/404', {
            title: 'Oops. Página não encontrada!',
            templateUrl: 'partials/404.html'
        })
        .when('/login', {
            title: 'Iniciar sessão',
            templateUrl: 'partials/login.html',
            controller: 'LoginCtrl'
        })
        .when('/register', {
            title: 'Criar conta de utilizador',
            templateUrl: 'partials/register.html'
        })
        .when('/imoveis', {
            title: 'Imóveis Penhorados pelas Finanças',
            templateUrl: 'partials/properties.html',
            controller: 'PropertyListCtrl'
        })
        .when('/imoveis/:slug', {
            templateUrl: 'partials/property-view.html',
            controller: 'PropertyCtrl'
        })
        .when('/veiculos', {
            title: 'Veículos Penhorados pelas Finanças',
            templateUrl: 'partials/vehicles.html',
            controller: 'VehicleListCtrl'
        })
        .when('/veiculos/:slug', {
            templateUrl: 'partials/vehicle-view.html',
            controller: 'VehicleCtrl'
        })
        .when('/outros', {
            title: 'Outros Bens Penhorados pelas Finanças',
            templateUrl: 'partials/others.html',
            controller: 'OtherListCtrl'
        })
        .when('/outros/:slug', {
            templateUrl: 'partials/other-view.html',
            controller: 'OtherCtrl'
        })
        .otherwise({
            redirectTo: '/404'
        });
}]);

app.run(['$rootScope', function($rootScope) {
    $rootScope.$on('$routeChangeSuccess', function(event, current, previous) {
        $rootScope.pageTitle = current.$$route.title;
    });
}]);

app.controller('HomeCtrl', function($scope, $http) {
    $http.get('../api/v1/home').then(function(response) {
        $scope.latest = response.data.latest;
        $scope.endingSoon = response.data.endingSoon;
    });
});