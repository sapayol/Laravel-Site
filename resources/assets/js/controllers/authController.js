var authController = angular.module('authController', []);

authController.controller('authCtrl', ['$scope', '$http', '$q', '$timeout', 'Auth', 'notifyUser', function($scope, $http, $q, $timeout, Auth, notifyUser) {

	  $scope.submitAuthRequest = function(request) {
	  	if (request === 'logout') return logout($scope.user);
	  	if ($scope.userInfoForm.$valid) {
		  	if (request === 'register') register($scope.user);
		  	if (request === 'login')    login($scope.user);
		  	if (request === 'reset')    resetPassword($scope.user);
		  } else {
	  		$scope.showUserErorrs = true;
	  		focus('emailField');
		  }
	  }

	  $scope.proceedToOrder = function() {
	 		$timeout(function() {
		 		createOrderForm.submit();
	 		}, 100);
	  }

	  register = function(input) {
 			 Auth.register(input.email, input.password)
 			 	.then(function(user) {
 			 		$scope.user = user;
					$scope.proceedToOrder();
    		});
	  };

	  login = function(input) {
    	Auth.login(input.email, input.password)
    		.then(function(user) {
 			 		$scope.user = user;
					$scope.proceedToOrder();
    		});
    }

	  resetPassword = function(input) {
  		Auth.reset(input.email)
    		.then(function(data) {
    			notifyUser.of(data);
    			$scope.reset = false;
    		});
	  }

    logout = function () {
  		Auth.logout()
    		.then(function(data) {
					deleteCurrentUser();
    			notifyUser.of('You were logged out');
    		});
    };

}]);


