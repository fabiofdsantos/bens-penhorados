'use strict';

var app = angular.module('bens-penhorados');

app.controller('VehicleListCtrl', ['$scope', '$http', 'Vehicle', function($scope, $http, Vehicle) {
    $scope.items = [];
    $scope.totalItems = 0;
    $scope.itemsFrom = 0;
    $scope.itemsTo = 0;
    $scope.itemsPerPageValues = [5, 15, 25, 50, 100];
    $scope.itemsPerPage = 5;
    $scope.pagination = {
        current: 1
    };

    getResultsPage(1);

    $scope.$watch('itemsPerPage', function(newValue, oldValue) {
        if (!angular.equals(newValue, oldValue)) {
            getResultsPage(1);
        }
    });

    function getResultsPage(pageNumber) {
        $scope.result = Vehicle.query({
            page: pageNumber,
            limit: $scope.itemsPerPage
        });
    }

    $scope.pageChanged = function(newPage) {
        getResultsPage(newPage);
    };
}]);

app.controller('VehicleCtrl', ['$scope', '$http', '$routeParams', 'Vehicle', function($scope, $http, $routeParams, Vehicle) {
    $scope.vehicle = Vehicle.get({
        id: $routeParams.id
    });
}]);
