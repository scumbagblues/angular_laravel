'use strict';

angular.module('Client',['ngResource','ngRoute'])
	.config(function($routeProvider){
		$routeProvider
		.when('/users',{
			templateUrl: 'views/user/index.html',
			controller: 'IndexUserCtrl'
		})
		.when('/users/new',{
			templateUrl: 'views/user/create.html',
			controller: 'CreateUserCtrl'
		})
		.when('/users/edit/:id',{
			templateUrl: 'views/user/create.html',
			controller: 'EditUserCtrl'
		})
		.otherwise({
			redirectTo: '/'
		});
	});