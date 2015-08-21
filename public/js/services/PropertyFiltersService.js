'use strict';

var app = angular.module('bens-penhorados');

app.factory('PropertyFilters', ['$resource', function($resource) {
    return $resource(
        '../api/v1/attributes/property', {}, {
            'query': {
                method: 'GET',
                isArray: false
            }
        }
    );
}]);