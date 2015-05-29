var app = angular.module('bens-penhorados', [
    'ngRoute'
]);

app.config(['$routeProvider', function($routeProvider) {
    $routeProvider
        .when('/', {
            templateUrl: 'partials/home.html',
            controller: 'HomeCtrl'
        })
        .when('/login', {
            templateUrl: 'partials/login.html',
            controller: 'LoginCtrl'
        })
        .when('/register', {
            templateUrl: 'partials/register.html'
        })
        .otherwise('/404', {
            templateUrl: 'partials/404.html'
        });
}]);

app.controller('HomeCtrl', function($scope, $http) {
    $http.get('../api/v1/home').then(function(response) {
        $scope.newItems = response.data.newItems;
        $scope.endingSoon = response.data.endingSoon;
    });
});
