'use strict';

angular.module('Client')
	.controller('IndexUserCtrl',function($scope,UserResource,$location, $timeout){
		$scope.Users = UserResource.query();

		$scope.removeUser = function(id){
			UserResource.delete({
				id:id
			});
			Materialize.toast('User removed',5000, 'red accent-4');
			$timeout(function(){
				$location.path('/users');
			},1000);
		};
	})
	.controller('CreateUserCtrl',function($scope, UserResource, $location, $timeout){
		$scope.title = "Create User";
		$scope.button = "Save";
		$scope.showbutton = false; 
		$scope.User={};
		$scope.saveUser = function(){
			UserResource.save($scope.User);
			Materialize.toast('User created',5000, 'green accent-4');
			$timeout(function(){
				$location.path('/users');
			},1000);
		};
	})
	.controller('EditUserCtrl', function($scope, UserResource, $location, $timeout, $routeParams){
		$scope.title = "Edit User";
		$scope.button = "Edit";
		$scope.showbutton = true; 
		$scope.User = UserResource.get({
			id: $routeParams.id
		});

		$scope.saveUser = function(){
			UserResource.update($scope.User);
			Materialize.toast('User updated',5000, 'green accent-4');
			$timeout(function(){
				$location.path('/users');
			},1000);
		}
	});