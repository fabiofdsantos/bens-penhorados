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
        'filters.make',
        'filters.model',
        'filters.category',
        'filters.type',
        'filters.color',
        'filters.fuel',
        'filters.district',
        'filters.unicipality',
        'filters.startYear',
        'filters.endYear',
        'filter.isGoodCondition',
        'filters.purchaseType',
        'filters.withImages',
        'filters.ignoreSuspended',
        'itemsPerPage',
    ];

    $scope.$watchGroup($toWatch, function(newValues, oldValues, scope) {
        if (!angular.equals(newValues, oldValues)) {
            setSearchVars(1);
        }
    });

    function init() {
        var search = $location.search();
        $scope.pagination = {
            current: search.page || 1,
        };
        $scope.itemsPerPage = parseInt(search.limit) || 5;
        $scope.filters = {
            district: search.district,
            municipality: search.municipality,
            make: search.make,
            model: search.model,
            color: search.color,
            category: search.category,
            type: search.type,
            fuel: search.fuel,
            startYear: parseInt(search.start) || undefined,
            endYear: parseInt(search.end) || undefined,
            isGoodCondition: search.goodcondition || undefined,
            purchaseType: search.purchasetype,
            withImages: parseInt(search.withimages) || undefined,
            ignoreSuspended: parseInt(search.nosuspended) || undefined,
        };
        getResultsPage($scope.pagination.current);
        getFilteringAttributes();
    }

    function setSearchVars(pageNumber) {
        $location.search(getSearchObject(pageNumber));
    }

    function getResultsPage(pageNumber) {
        Vehicle.query(getSearchObject(pageNumber), function(data) {
            $scope.result = data;
            $scope.noResults = ((data.items.length) ? false : true);
        }, function(error) {});
    }

    function getFilteringAttributes() {
        VehicleFilters.query({
            make: $scope.filters.make,
            district: $scope.filters.district,
        }, function(data) {
            $scope.filteringAttr = data;
        }, function(error) {});
    }

    function getSearchObject(pageNumber) {
        return {
            page: pageNumber,
            limit: $scope.itemsPerPage,
            district: $scope.filters.district,
            municipality: $scope.filters.municipality,
            make: $scope.filters.make,
            model: $scope.filters.model,
            category: $scope.filters.mategory,
            type: $scope.filters.type,
            color: $scope.filters.color,
            fuel: $scope.filters.fuel,
            start: $scope.filters.startYear,
            end: $scope.filters.endYear,
            goodcondition: $scope.filters.isGoodCondition,
            purchasetype: $scope.filters.purchaseType,
            withimages: $scope.filters.withImages,
            nosuspended: $scope.filters.ignoreSuspended,
        };
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