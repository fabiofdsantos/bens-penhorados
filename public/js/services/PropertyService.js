'use strict';

var app = angular.module('bens-penhorados');

app.factory('Property', ['$resource', function($resource) {
    return $resource(
        '../api/v1/properties/:slug', {
            id: '@_slug'
        }, {
            'query': {
                method: 'GET',
                isArray: false
            }
        }
    );
}]);