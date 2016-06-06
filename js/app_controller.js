
            angular.module('webapp', ['testnav', 'ngRoute', 'ui.bootstrap']);
            angular.module('webapp').config(['$routeProvider', function ($routeProvider) {
                "use strict";
                $routeProvider.
                    when('/route1', {navitem: true, controller: false, name: 'Home', template: '<p>This is home page.</p>'}).
                    when('/route2', {navitem: true, controller: false, name: 'Documentation', template: '<p>This is documentation page.</p>'}).
                    when('/route3', {navitem: true, controller: false, name: 'About', template: '<p>This page indulges with the functions of this project.</p>'}).
                    when('/route4', {template: '<p>i am route 4 and not in the navbar</p>'}).
                    otherwise({redirectTo: '/home'});
            }]);
            
            angular.module('testnav', []).directive('navbar', [function () {
                "use strict";
                return {
                    restrict: 'AE',
                    replace: true,
                    transclude: false,
                    scope: {
                        title: '@'
                    },
                    controller: ['$scope', '$location', '$route', function ($scope, $location, $route) {
                                
                        $scope.navClass = function (page) {
                            var currentRoute = $location.path().substring(1).split('/')[0];
                            return page === currentRoute ? 'active' : '';
                        };
                                            
                        $scope.routes = [];
                        
                        angular.forEach($route.routes, function (value, key) {
                            if (value.navitem) {
                                var routeitem = {};
                                routeitem.path = value.originalPath;
                                routeitem.name = value.name;
                                routeitem.templateUrl = value.templateUrl;
                                routeitem.controller = value.controller;
                                $scope.routes.push(routeitem);
                            }
                        });
                        $scope.isCollapsed = true;
                    }],
                    template:
                        '<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">' +
                            '<div class="navbar-header">' +
                                '<button type="button" class="navbar-toggle" ng-init="navCollapsed = true" ng-click="navCollapsed = !navCollapsed">' +
                                    '<span class="sr-only">Toggle navigation</span>' +
                                    '<span class="icon-bar"></span>' +
                                    '<span class="icon-bar"></span>' +
                                    '<span class="icon-bar"></span>' +
                                '</button>' +
                                '<a id="Ludicbrand" class="navbar-brand" href="#/home">' +
                                    '<span class="thin" ng-bind="title"></span>' +
                                '</a>' +
                            '</div>' +
                            '<div class="collapse navbar-collapse" ng-class="!navCollapsed && \'in\'">' +
                                '<ul class="nav navbar-nav">' +
                                    '<li ng-repeat="route in routes" data-ng-class="navClass(\'{{route.name}}\')">' +
                                        '<a ng-href="#{{route.path}}" ng-bind="route.name"></a>' +
                                    '</li>' +
                                '</ul>' +
                            '</div>' +
                        '</nav>'
                };
            }]);    