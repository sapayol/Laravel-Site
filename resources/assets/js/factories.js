var factories = angular.module('factories', [
	'sessionFactory'
]);

var sessionFactory = angular.module('sessionFactory', []);


sessionFactory.factory('Session', ['$http', '$q', function($http, $q) {

	session = {};

	session.getCurrent = function() {
		var deferred = $q.defer();
		$http.get('/session')
			.success(function(response, status) {
				deferred.resolve(response);
		  }).error(function(response, status) {
 				return response;
		  });
		return deferred.promise;
	}

	session.getValueOf = function(key) {
		var deferred = $q.defer();
		$http.get('/session/' + key)
			.success(function(response, status) {
				deferred.resolve(response);
		  }).error(function(response, status) {
 				return response;
		  });
		return deferred.promise;
	}

	session.store = function(paramsToStore) {
		var params = {};
		angular.forEach(paramsToStore, function(value, key) {
			params[key] = value;
		});
		var deferred = $q.defer();
		$http.post("/session", params).success(function(response, status) {
			deferred.resolve(response);
		}).error(function(response, status) {
			return response;
		});
		return deferred.promise;
  };

	session.delete = function(key) {
		var deferred = $q.defer();
		$http.delete("/session/" + key, {
		}).success(function(response, status) {
			deferred.resolve(response);
		}).error(function(response, status) {
			return response;
		});
		return deferred.promise;
  };

	return session;

}]);
