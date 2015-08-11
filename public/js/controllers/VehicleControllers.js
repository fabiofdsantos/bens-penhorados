'use strict';

var app = angular.module('bens-penhorados');

app.controller('VehicleListCtrl', ['$scope', '$http', 'Vehicle', 'VehicleFilters', function($scope, $http, Vehicle, VehicleFilters) {
    $scope.items = [];
    $scope.totalItems = 0;
    $scope.itemsFrom = 0;
    $scope.itemsTo = 0;
    $scope.itemsPerPageValues = [5, 15, 25, 50, 100];
    $scope.itemsPerPage = 5;

    getResultsPage(1);

    $scope.pagination = {
        current: 1
    };

    getFilteringAttributes();

    $scope.$watchGroup(['filterMake', 'filterModel', 'filterCategory', 'filterType'], function(newValues, oldValues, scope) {
        if (!angular.equals(newValues, oldValues)) {
            getFilteringAttributes();
            getResultsPage(1);
        }
    });

    function getResultsPage(pageNumber) {
        Vehicle.query({
            page: pageNumber,
            limit: $scope.itemsPerPage,
            make: $scope.filterMake,
            model: $scope.filterModel,
        }, function(data) {
            $scope.result = data;
            $scope.noResults = ((data.items.length) ? false : true);
        }, function(error) {});
    }

    function getFilteringAttributes() {
        VehicleFilters.query({
            make: $scope.filterMake,
        }, function(data) {
            $scope.filteringAttr = data;
        }, function(error) {});
    }

    $scope.pageChangeHandler = function(newPage) {
        getResultsPage(newPage);
    };
}]);

app.controller('VehicleCtrl', ['$rootScope', '$scope', '$routeParams', '$location', 'Vehicle', function($rootScope, $scope, $routeParams, $location, Vehicle) {
    Vehicle.get({
        slug: $routeParams.slug
    }, function(data) {
        $scope.vehicle = data;
        $rootScope.pageTitle = data.title;
    }, function(error) {
        if (error.status === 404) {
            $location.path("/404");
        }
    });
}]);