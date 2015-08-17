'use strict';

var app = angular.module('bens-penhorados');

app.factory('Other', ['$resource', function($resource) {
    return $resource(
        '../api/v1/others/:slug', {
            id: '@_slug'
        }, {
            'query': {
                method: 'GET',
                isArray: false
            }
        }
    );
}]);