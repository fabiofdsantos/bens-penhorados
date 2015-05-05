var app = angular.module('bens-penhorados', [
    'ngRoute'
]);

app.config(['$routeProvider', function($routeProvider) {
    $routeProvider
        .when("/", {
            templateUrl: "partials/home.html",
            controller: "HomeCtrl"
        })
        .otherwise("/404", {
            templateUrl: "partials/404.html"
        });
}]);

app.controller('HomeCtrl', function( /* $scope, $location, $http */ ) {

});
