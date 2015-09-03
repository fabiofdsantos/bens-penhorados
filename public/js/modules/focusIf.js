/*!
 * ng-focus-if v1.0.2 (modified version)
 * https://github.com/hiebj/ng-focus-if
 * Copyright (c) 2015 Jonathan Hieb, Fábio Santos
 * License: MIT
 */
(function() {
    'use strict';
    angular
        .module('focus-if', [])
        .directive('focusIf', focusIf);

    function focusIf($timeout) {
        function link($scope, $element, $attrs) {
            var dom = $element;
            if ($attrs.focusIf) {
                $scope.$watch($attrs.focusIf, focus);
            } else {
                focus(true);
            }

            function focus(condition) {
                if (condition) {
                    $timeout(function() {
                        var currVal = dom.val();
                        dom.focus().val("").val(currVal);
                    }, $scope.$eval($attrs.focusDelay) || 0);
                }
            }
        }
        return {
            restrict: 'A',
            link: link
        };
    }
})();