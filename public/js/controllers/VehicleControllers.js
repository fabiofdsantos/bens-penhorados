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
        'filterColor',
        'filterFuel',
        'filterDistrict',
        'filterMunicipality',
        'filterStartYear',
        'filterEndYear',
        'filterIsGoodCondition',
        'filterPurchaseType',
        'filterWithImages',
        'filterIgnoreSuspended',
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
        $scope.filterDistrict = search.district;
        $scope.filterMunicipality = search.municipality;
        $scope.filterMake = search.make;
        $scope.filterModel = search.model;
        $scope.filterColor = search.color;
        $scope.filterCategory = search.category;
        $scope.filterType = search.type;
        $scope.filterFuel = search.fuel;
        $scope.filterStartYear = parseInt(search.start) || undefined;
        $scope.filterEndYear = parseInt(search.end) || undefined;
        $scope.filterIsGoodCondition = search.goodcondition || undefined;
        $scope.filterPurchaseType = search.purchasetype;
        $scope.filterWithImages = parseInt(search.withimages) || undefined;
        $scope.filterIgnoreSuspended = parseInt(search.nosuspended) || undefined;

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
            make: $scope.filterMake,
            district: $scope.filterDistrict,
        }, function(data) {
            $scope.filteringAttr = data;
        }, function(error) {});
    }

    function getSearchObject(pageNumber) {
        return {
            page: pageNumber,
            limit: $scope.itemsPerPage,
            district: $scope.filterDistrict,
            municipality: $scope.filterMunicipality,
            make: $scope.filterMake,
            model: $scope.filterModel,
            category: $scope.filterCategory,
            type: $scope.filterType,
            color: $scope.filterColor,
            fuel: $scope.filterFuel,
            start: $scope.filterStartYear,
            end: $scope.filterEndYear,
            goodcondition: $scope.filterIsGoodCondition,
            purchasetype: $scope.filterPurchaseType,
            withimages: $scope.filterWithImages,
            nosuspended: $scope.filterIgnoreSuspended,
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