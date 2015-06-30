'use strict';

var app = angular.module('bens-penhorados');

app.factory('Vehicle', ['$resource', function($resource) {
    return $resource(
        '../api/v1/vehicles/:id', {
            id: '@_id'
        }, {
            'query': {
                method: 'GET',
                isArray: false
            }
        }
    );
}]);
