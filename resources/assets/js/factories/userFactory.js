var userFactory = angular.module('userFactory', []);

userFactory.factory('User', ['$http', '$q', 'notifyUser', function($http, $q, notifyUser) {


	var user   = {};
	var form   = ["*"];
	var schema = {
		type: "object",
		properties: {
			title: {
				type: "string",
				required: true,
				minLength: 3,
				title: "Title",
				description: "User title"
			}
		}
	};

	user.setCurrent = function(userArray) {
		user = userArray;
	}

	user.getCurrent = function() {
		return user;
	}

	user.getSchema = function() {
		return schema;
	}

	user.getForm = function() {
		return form;
	}

	//===========================================================================//
	//																	  CRUD 																	 //
	//===========================================================================//

	user.index = function(currentPage, orderBy, reverse) {
		var deferred = $q.defer();
		$http.get('/users?page=' + currentPage + orderBy + reverse)
			.success(function(response, status) {
				deferred.resolve(response);
		  }).error(function(response, status) {
 				notifyUser.ofApiErrors(response, status);
		  });
		return deferred.promise;
	}

	user.instructorIndex = function() {
		var deferred = $q.defer();
		$http.get('/users?role=instructor')
			.success(function(response, status) {
				deferred.resolve(response);
		  }).error(function(response, status) {
 				notifyUser.ofApiErrors(response, status);
		  });
		return deferred.promise;
	}

	user.create = function(model) {
		var deferred = $q.defer();
		$http.post("/users", {
			title: model.title
		}).success(function(response, status) {
			deferred.resolve(response);
		}).error(function(response, status) {
			notifyUser.ofApiErrors(response, status);
		});
		return deferred.promise;
  };

	user.update = function(model) {
		var deferred = $q.defer();
		$http.patch("/users/" + model.id, {
			title: model.title
		}).success(function(response, status) {
			deferred.resolve(response);
		}).error(function(response, status) {
			notifyUser.ofApiErrors(response, status);
		});
		return deferred.promise;
  };

	user.delete = function(user) {
		var deferred = $q.defer();
		$http.delete("/users/" + user.id, {
		}).success(function(response, status) {
			deferred.resolve(response);
		}).error(function(response, status) {
			notifyUser.ofApiErrors(response, status);
		});
		return deferred.promise;
  };

	user.search = function(queryType, query) {
		var deferred = $q.defer();
		$http.get('/users?query_type=' + queryType + '&q=' + query)
			.success(function(response, status) {
				deferred.resolve(response);
		  }).error(function(response, status) {
 				notifyUser.ofApiErrors(response, status);
		  });
		return deferred.promise;
	}

	user.createDsoAccount = function(id) {
		var deferred = $q.defer();
		$http.post("/users/" + id + "/create_dso_account").success(function(response, status) {
			deferred.resolve(response);
		}).error(function(response, status) {
			notifyUser.ofApiErrors(response, status);
		});
		return deferred.promise;
  };

	return user;

}]);
