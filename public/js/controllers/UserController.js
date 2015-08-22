'use strict';

var app = angular.module('bens-penhorados');

app.controller('UserCtrl', ['$scope', '$http', '$location', '$cookies', function($scope, $http, $location, $cookies) {

    $scope.accountCreated = $cookies.get('account_created');
    $cookies.remove('account_created');

    $scope.register = function() {
        $http.post('../api/v1/auth/register', {
            name: $scope.name,
            email: $scope.email,
            password: $scope.password,
            password_again: $scope.passwordAgain,
        }).success(function(response) {
            $location.path('/iniciar-sessao');
            $cookies.put('account_created', response.msg);
        }).error(function(response) {
            $scope.errorName = response.name[0] || undefined;
            $scope.errorEmail = response.email[0] || undefined;
            $scope.errorPassword = response.password[0] || undefined;
            $scope.errorPasswordAgain = response.password_again[0] || undefined;
        });
    }

    $scope.login = function() {
        $http.post('../api/v1/auth/login', {
            email: $scope.email,
            password: $scope.password,
            remember: $scope.remember,
        }).success(function(response) {}).error(function(response) {
            $scope.errorEmail = response.email[0] || undefined;
            $scope.errorPassword = response.password[0] || undefined;
        });
    }
}]);