'use strict';

var app = angular.module('bens-penhorados');

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
