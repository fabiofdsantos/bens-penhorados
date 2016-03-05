@extends('layouts.search')

@section('advanced-search')
<div class="panel panel-default">
    <div class="panel-heading">Pesquisa avançada</div>
    <div class="panel-body form-horizontal">

        <div type="info" data-ng-hide="alerts.hideVehicleFilterAlert" class="alert ng-isolate-scope alert-info alert-dismissable" role="alert">
            <button type="button" class="close" ng-click="closeAlert('vehicles')">
                <span aria-hidden="true">×</span>
                <span class="sr-only">Fechar</span>
            </button>
            <div>
                <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>
                <span class="sr-only">Aviso</span>
                <small>Existem veículos que não se encontram catalogados por determinados atributos (ex. categoria). Para uma pesquisa mais ampla opte sempre que possível por selecionar a opção:
                    <strong>Todos(as)</strong>.</small>
            </div>
        </div>

        <div class="form-group">
            <label for="make" class="col-sm-4 control-label">Marca</label>
            <div class="col-sm-8">
                <select data-ng-disabled="!filteringAttr.vehicle.makes" class="form-control" data-ng-model="filters.make" data-ng-options="key as value for (key , value) in filteringAttr.vehicle.makes">
                    <option value="">-- Todas as marcas --</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label for="model" class="col-sm-4 control-label">Modelo</label>
            <div class="col-sm-8">
                <select data-ng-disabled="!filteringAttr.vehicle.models" class="form-control" data-ng-model="filters.model" data-ng-options="key as value for (key , value) in filteringAttr.vehicle.models">
                    <option value="">-- Todos os modelos --</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label for="fuel" class="col-sm-4 control-label">Combustível</label>
            <div class="col-sm-8">
                <select data-ng-disabled="!filteringAttr.vehicle.fuels" class="form-control" data-ng-model="filters.fuel" data-ng-options="key as value for (key , value) in filteringAttr.vehicle.fuels">
                    <option value="">-- Todos os combustíveis --</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label for="category" class="col-sm-4 control-label">Categoria</label>
            <div class="col-sm-8">
                <select data-ng-disabled="!filteringAttr.vehicle.categories" class="form-control" data-ng-model="filters.category" data-ng-options="key as value for (key , value) in filteringAttr.vehicle.categories">
                    <option value="">-- Todas as categorias --</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label for="type" class="col-sm-4 control-label">Tipo</label>
            <div class="col-sm-8">
                <select data-ng-disabled="!filteringAttr.vehicle.types" class="form-control" data-ng-model="filters.type" data-ng-options="key as value for (key , value) in filteringAttr.vehicle.types">
                    <option value="">-- Todos os tipos --</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label for="color" class="col-sm-4 control-label">Cor</label>
            <div class="col-sm-8">
                <select data-ng-disabled="!filteringAttr.vehicle.colors" class="form-control" data-ng-model="filters.color" data-ng-options="key as value for (key , value) in filteringAttr.vehicle.colors">
                    <option value="">-- Todas as cores --</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label for="year" class="col-sm-4 control-label">Ano</label>
            <div class="col-sm-8">
                <div class="form-inline input-group">
                    <select class="form-control" data-ng-model="filters.minYear" data-ng-options="n for n in [] | range:1950:2015">
                        <option value="">Min.</option>
                    </select>
                    <span class="input-group-addon">até</span>
                    <select class="form-control" data-ng-model="filters.maxYear" data-ng-options="n for n in [] | range:1950:2015">
                        <option value="">Máx.</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="condition" class="col-sm-4 control-label">Estado</label>
            <div class="col-sm-8">
                <div class="input-group">
                    <div class="radio">
                        <label>
                            <input type="radio" data-ng-model="filters.isGoodCondition" data-ng-value="undefined"> Ambos / Não definido
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" data-ng-model="filters.isGoodCondition" value="1"> Bom / Razoável
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" data-ng-model="filters.isGoodCondition" value="0"> Mau
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-12 text-right">
                <button type="button" class="btn btn-default" data-ng-click="resetVehicleFilters()">Limpar filtros</button>
            </div>
        </div>

    </div>
</div>
@stop

@section('js')
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.0/angular-resource.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.0/angular-cookies.min.js"></script>

<script src="/js/modules/dirPagination.js"></script>
<script src="/js/modules/loading-bar.min.js"></script>
<script src="/js/modules/focusIf.js"></script>

<script type="text/javascript">
var app = angular.module('bens-penhorados', ['ngResource', 'focus-if',
    'angularUtils.directives.dirPagination', 'angular-loading-bar', 'ngCookies'
    ], function($interpolateProvider) {
            $interpolateProvider.startSymbol('[[-');
            $interpolateProvider.endSymbol('-]]');
        }).filter('range', function() {
            return function(min, max) {
                var range = [];
                min = parseInt(min);
                max = parseInt(max);
                for (var i = max; i >= min; i--) {
                    range.push(i);
                }
                return range;
            }
        });

app.config(['cfpLoadingBarProvider', function(cfpLoadingBarProvider) {
    cfpLoadingBarProvider.includeSpinner = true;
}]);

app.config(function(paginationTemplateProvider) {
    paginationTemplateProvider.setPath('/js/modules/dirPagination.tpl.html');
});

app.factory('Vehicle', ['$resource', function($resource) {
    return $resource(
        '../api/v1/vehicles/:slug', {
            id: '@_slug'
        }, {
            'query': {
                method: 'GET',
                isArray: false
            }
        }
    );
}]);

app.factory('VehicleFilters', ['$resource', function($resource) {
    return $resource(
        '../api/v1/attributes/vehicle', {}, {
            'query': {
                method: 'GET',
                isArray: false
            }
        }
    );
}]);

app.controller('SearchCtrl', ['$scope', '$location', '$cookies', 'Vehicle', 'VehicleFilters',
    function($scope, $location, $cookies, Vehicle, VehicleFilters) {
        $scope.items = [];
        $scope.totalItems = 0;
        $scope.itemsFrom = 0;
        $scope.itemsTo = 0;
        $scope.itemsPerPageValues = [10, 25, 50, 100];
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
            'pagination',
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

            getResultsPage($scope.pagination.current);
            getFilteringAttributes();
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

    }
]);
</script>
@stop
