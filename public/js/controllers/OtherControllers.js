'use strict';

var app = angular.module('bens-penhorados');

app.controller('OtherListCtrl', ['$scope', '$location', 'Other', 'OtherFilters', function($scope, $location, Other, OtherFilters) {
    $scope.items = [];
    $scope.totalItems = 0;
    $scope.itemsFrom = 0;
    $scope.itemsTo = 0;
    $scope.itemsPerPageValues = [10, 25, 50, 100];
    $scope.priceRange = getPriceRange();

    init();

    var $toWatch = [
        'filters.district',
        'filters.municipality',
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
        $scope.itemsPerPage = parseInt(search.limit) || 10;
        $scope.filters = {
            district: search.district,
            municipality: search.municipality,
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
        Other.query(getSearchObject(pageNumber), function(data) {
            $scope.result = data;
            $scope.noResults = ((data.items.length) ? false : true);
        }, function(error) {});
    }

    function getFilteringAttributes() {
        OtherFilters.query({
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
            purchasetype: $scope.filters.purchaseType,
            withimages: $scope.filters.withImages,
            nosuspended: $scope.filters.ignoreSuspended,
            minprice: getMinPrice(),
            maxprice: getMaxPrice(),
            noprice: $scope.filters.noPrice,
            q: $scope.filters.searchQuery,
        };
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

    $scope.pageChangeHandler = function(newPage) {
        setSearchVars(newPage);
    };
}]);

app.controller('OtherCtrl', ['$rootScope', '$scope', '$routeParams', '$http', '$location', 'Other', function($rootScope, $scope, $routeParams, $http, $location, Other) {
    Other.get({
        slug: $routeParams.slug
    }, function(data) {
        $scope.other = data;
        $rootScope.pageTitle = data.generic.title;

        if ($rootScope.isAuth) {
            isFavorite();
        }
    }, function(error) {
        if (error.status === 404) {
            $location.path("/404");
        }
    });

    function isFavorite() {
        $http.post('../api/v1/user/favorites/check', {
            code: $scope.other.generic.code,
        }).then(function(response) {
            $scope.isFavorite = response.data || undefined;
        });
    }

    $scope.addFavorite = function() {
        $http.post('../api/v1/user/favorites/add', {
            code: $scope.other.generic.code,
        }).success(function(response) {
            $scope.isFavorite = true;
        }).error(function(response) {
            if (response.error) {
                $location.path('/iniciar-sessao');
            }
        });
    };

    $scope.removeFavorite = function() {
        $http.post('../api/v1/user/favorites/remove', {
            code: $scope.other.generic.code,
        }).success(function(response) {
            $scope.isFavorite = false;
        }).error(function(response) {
            if (response.error) {
                $location.path('/iniciar-sessao');
            }
        });
    };
}]);