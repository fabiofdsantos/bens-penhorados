'use strict';

var app = angular.module('bens-penhorados');

app.controller('VehicleListCtrl', ['$scope', '$location', 'Vehicle', 'VehicleFilters', function($scope, $location, Vehicle, VehicleFilters) {
    $scope.items = [];
    $scope.totalItems = 0;
    $scope.itemsFrom = 0;
    $scope.itemsTo = 0;
    $scope.itemsPerPageValues = [5, 15, 25, 50, 100];

    init();

    var $toWatch = [
        'filterMake',
        'filterModel',
        'filterCategory',
        'filterType',
        'itemsPerPage'
    ];

    $scope.$watchGroup($toWatch, function(newValues, oldValues, scope) {
        if (!angular.equals(newValues, oldValues)) {
            setSearchVars(1);
        }
    });

    function init() {
        var search = $location.search();
        $scope.pagination = {
            current: search.page === undefined ? 1 : search.page,
        };
        $scope.itemsPerPage = search.limit === undefined ? 5 : parseInt(search.limit);
        $scope.filterMake = search.make;
        $scope.filterModel = search.model;
        $scope.filterCategory = search.category;
        $scope.filterType = search.type;

        getResultsPage($scope.pagination.current);
        getFilteringAttributes();
    }

    function setSearchVars(pageNumber) {
        $location.search({
            page: pageNumber,
            limit: $scope.itemsPerPage,
            make: $scope.filterMake,
            model: $scope.filterModel,
            category: $scope.filterCategory,
            type: $scope.filterType,
        });
    }

    function getResultsPage(pageNumber) {
        Vehicle.query({
            page: pageNumber,
            limit: $scope.itemsPerPage,
            make: $scope.filterMake,
            model: $scope.filterModel,
            category: $scope.filterCategory,
            type: $scope.filterType,
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
        setSearchVars(newPage);
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