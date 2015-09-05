'use strict';

var app = angular.module('bens-penhorados');

app.controller('UserCtrl', ['$rootScope', '$scope', '$http', '$location', '$cookies', function($rootScope, $scope, $http, $location, $cookies) {

    $scope.accountCreated = $cookies.get('account_created');
    $cookies.remove('account_created');


    $scope.register = function() {
        $http.post('../api/v1/auth/register', {
            name: $scope.name || "",
            email: $scope.email || "",
            password: $scope.password || "",
            password_again: $scope.passwordAgain || "",
        }).success(function(response) {
            $location.path('/iniciar-sessao');
            $cookies.put('account_created', response.success);
        }).error(function(response) {
            $scope.errorName = (response.name === undefined ? undefined : response.name[0]);
            $scope.errorEmail = (response.email === undefined ? undefined : response.email[0]);
            $scope.errorPassword = (response.password === undefined ? undefined : response.password[0]);
            $scope.errorPasswordAgain = (response.password_again === undefined ? undefined : response.password_again[0]);
        });
    }

    $scope.login = function() {
        $http.post('../api/v1/auth/login', {
            email: $scope.email || "",
            password: $scope.password || "",
            remember: $scope.remember || "",
        }).success(function(response) {
            isAuth();
            $location.path('/');
        }).error(function(response) {
            $scope.errorWrongCredentials = (response.wrongCredentials === undefined ? undefined : response.wrongCredentials[0]);
            $scope.errorEmail = (response.email === undefined ? undefined : response.email[0]);
            $scope.errorPassword = (response.password === undefined ? undefined : response.password[0]);
        });
    }

    function isAuth() {
        $http.get('../api/v1/auth/check').then(function(response) {
            $rootScope.isAuth = response.data || undefined;
        });
    }
}]);

app.controller('FavoriteListCtrl', ['$scope', '$http', '$location', function($scope, $http, $location) {
    $scope.items = [];
    $scope.totalItems = 0;
    $scope.itemsFrom = 0;
    $scope.itemsTo = 0;
    $scope.itemsPerPage = 10;

    var search = $location.search();
    $scope.pagination = {
        current: search.page || 1,
    };

    getResultsPage($scope.pagination.current);

    function getResultsPage(pageNumber) {
        $http.get('../api/v1/user/favorites', {
            params: getSearchObject(pageNumber)
        }).success(function(response) {
            $scope.result = response;
            $scope.noResults = (response.items.length ? false : true);
        }).error(function(response) {
            if (response.error) {
                $location.path('/iniciar-sessao');
            }
        });
    }

    function getSearchObject(pageNumber) {
        return {
            page: pageNumber,
        }
    }

    $scope.pageChangeHandler = function(newPage) {
        setSearchVars(newPage);
    };

    function setSearchVars(pageNumber) {
        $location.search(getSearchObject(pageNumber));
    }

    $scope.removeAll = function() {
        $http.get('../api/v1/user/favorites/remove-all');
        setSearchVars(1);
    }
}]);