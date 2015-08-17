'use strict';

var app = angular.module('bens-penhorados');

app.factory('OtherFilters', ['$resource', function($resource) {
    return $resource(
        '../api/v1/attributes/other', {}, {
            'query': {
                method: 'GET',
                isArray: false
            }
        }
    );
}]);