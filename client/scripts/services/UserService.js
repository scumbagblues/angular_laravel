'use strict';

angular.module('Client')
	.factory('UserResource', function($resource) {
		return $resource("http://laravelapi.app/users/:id", {
			id: "@Userid",
			names: "@Name"
		}, {
			update: {
				method: "PUT"
			}
		});
	});