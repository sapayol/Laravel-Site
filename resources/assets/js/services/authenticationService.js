var authenticationService = angular.module('authenticationService', []);


authenticationService.factory('Auth', ['$http', '$q', 'notifyUser', function($http, $q, notifyUser) {

	var auth   = {};

  //===========================================================================//
	//																	  AUTH 																	 //
	//===========================================================================//

  auth.register = function(email, password) {
		var deferred = $q.defer();
		$http.post("/auth/register", {
			email:    email,
			password: password,
		}).success(function(response, status) {
			deferred.resolve(response);
		}).error(function(response, status) {
    	notifyUser.ofApiErrors(response, status);
		});
		return deferred.promise;
  };

	auth.login = function(email, password, remember) {
		var deferred = $q.defer();
		$http.post("/auth/login", {
			email:    email,
			password: password,
			remember: remember
		}).success(function(response, status) {
			deferred.resolve(response);
		}).error(function(response, status) {
    	notifyUser.ofApiErrors(response, status);
		});
		return deferred.promise;
  };

  auth.reset = function(email) {
		var deferred = $q.defer();
		$http.post("/password/email", {
			email: email,
		}).success(function(response, status) {
			deferred.resolve(response);
		}).error(function(response, status) {
    	notifyUser.ofApiErrors(response, status);
		});
		return deferred.promise;
  };

	auth.logout = function() {
		var deferred = $q.defer();
		$http.get("/auth/logout")
		.success(function(response, status) {
			deferred.resolve(response);
		}).error(function(response, status) {
    	notifyUser.ofApiErrors(response, status);
		});
		return deferred.promise;
  };

	return auth;

}]);
