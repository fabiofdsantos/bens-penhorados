'use strict';

var app = angular.module('bens-penhorados');

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