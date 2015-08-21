'use strict';

var app = angular.module('bens-penhorados');

app.controller('VehicleListCtrl', ['$scope', '$location', '$cookies', 'Vehicle', 'VehicleFilters', function($scope, $location, $cookies, Vehicle, VehicleFilters) {
    $scope.items = [];
    $scope.totalItems = 0;
    $scope.itemsFrom = 0;
    $scope.itemsTo = 0;
    $scope.itemsPerPageValues = [5, 15, 25, 50, 100];
    $scope.priceRange = getPriceRange();
    $scope.alerts = {
        hideGenericFilterAlert: $cookies.get('hide_generic_filter_alert'),
        hideVehicleFilterAlert: $cookies.get('hide_vehicle_filter_alert'),
    };

    init();

    var $toWatch = [
        'filters.make',
        'filters.model',
        'filters.category',
        'filters.type',
        'filters.color',
        'filters.fuel',
        'filters.district',
        'filters.municipality',
        'filters.minYear',
        'filters.maxYear',
        'filters.isGoodCondition',
        'filters.purchaseType',
        'filters.withImages',
        'filters.ignoreSuspended',
        'filters.minPrice',
        'filters.maxPrice',
        'filters.noPrice',
        'filters.searchQuery',
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
            minYear: parseInt(search.minyear) || undefined,
            maxYear: parseInt(search.maxyear) || undefined,
            isGoodCondition: search.goodcondition || undefined,
            purchaseType: search.purchasetype,
            withImages: parseInt(search.withimages) || undefined,
            ignoreSuspended: parseInt(search.nosuspended) || undefined,
            minPrice: parseInt(search.minprice) || undefined,
            maxPrice: parseInt(search.maxprice) || undefined,
            noPrice: parseInt(search.noprice) || undefined,
            searchQuery: search.q,
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
            category: $scope.filters.category,
            type: $scope.filters.type,
            color: $scope.filters.color,
            fuel: $scope.filters.fuel,
            minyear: getMinYear(),
            maxyear: getMaxYear(),
            goodcondition: $scope.filters.isGoodCondition,
            purchasetype: $scope.filters.purchaseType,
            withimages: $scope.filters.withImages,
            nosuspended: $scope.filters.ignoreSuspended,
            minprice: getMinPrice(),
            maxprice: getMaxPrice(),
            noprice: $scope.filters.noPrice,
            q: $scope.filters.searchQuery,
        };
    }

    function getMinYear() {
        if ($scope.filters.minYear === undefined) {
            return;
        }

        if ($scope.filters.maxYear === undefined) {
            return $scope.filters.minYear;
        }

        if ($scope.filters.minYear <= $scope.filters.maxYear) {
            return $scope.filters.minYear;
        }

        return $scope.filters.maxYear;
    }

    function getMaxYear() {
        if ($scope.filters.maxYear === undefined) {
            return;
        }

        if ($scope.filters.minYear === undefined) {
            return $scope.filters.maxYear;
        }

        if ($scope.filters.maxYear >= $scope.filters.minYear) {
            return $scope.filters.maxYear;
        }

        return $scope.filters.minYear;
    }

    function getMinPrice() {
        if ($scope.filters.noPrice !== undefined || $scope.filters.minPrice === undefined) {
            return;
        }

        if ($scope.filters.maxPrice === undefined) {
            return $scope.filters.minPrice;
        }

        if ($scope.filters.minPrice <= $scope.filters.maxPrice) {
            return $scope.filters.minPrice;
        }

        return $scope.filters.maxPrice;
    }

    function getMaxPrice() {
        if ($scope.filters.noPrice !== undefined || $scope.filters.maxPrice === undefined) {
            return;
        }

        if ($scope.filters.minPrice === undefined) {
            return $scope.filters.maxPrice;
        }

        if ($scope.filters.maxPrice >= $scope.filters.minPrice) {
            return $scope.filters.maxPrice;
        }

        return $scope.filters.minPrice;
    }

    function getPriceRange() {
        var prices = [];
        var i = 1;
        while (i <= 150000) {
            prices.push(i);
            if (i === 1) {
                i += 99;
            } else if (i < 1000) {
                i += 100;
            } else if (i < 5000) {
                i += 500;
            } else if (i < 10000) {
                i += 1000;
            } else if (i < 50000) {
                i += 10000;
            } else {
                i += 50000;
            }
        }

        return prices;
    }

    $scope.resetGenericFilters = function() {
        var filtersToReset = ['district', 'municipality', 'ignoreSuspended',
            'withImages', 'purchaseType', 'noPrice', 'minPrice', 'maxPrice',
            'searchQuery',
        ];

        angular.forEach(filtersToReset, function(value, key) {
            $scope.filters[value] = undefined;
        });
    }

    $scope.resetVehicleFilters = function() {
        var filtersToReset = ['make', 'model', 'category', 'type', 'color',
            'fuel', 'minYear', 'maxYear', 'isGoodCondition',
        ];

        angular.forEach(filtersToReset, function(value, key) {
            $scope.filters[value] = undefined;
        });
    }

    $scope.pageChangeHandler = function(newPage) {
        setSearchVars(newPage);
    };

    $scope.closeAlert = function(name) {
        if (name == 'generic') {
            $cookies.put('hide_generic_filter_alert', true);
            $scope.alerts.hideGenericFilterAlert = true;
        }
        if (name == 'vehicles') {
            $cookies.put('hide_vehicle_filter_alert', true);
            $scope.alerts.hideVehicleFilterAlert = true;
        }
    }
}]);

app.controller('VehicleCtrl', ['$rootScope', '$scope', '$routeParams', '$location', 'Vehicle', function($rootScope, $scope, $routeParams, $location, Vehicle) {
    Vehicle.get({
        slug: $routeParams.slug
    }, function(data) {
        $scope.vehicle = data;
        $rootScope.pageTitle = data.generic.title;
    }, function(error) {
        if (error.status === 404) {
            $location.path("/404");
        }
    });
}]);