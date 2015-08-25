var lookController = angular.module('lookController', []);

lookController.controller('lookAndFitCtrl', ['$scope', '$http', '$q', 'Session', '$timeout', 'Auth', 'notifyUser', function($scope, $http, $q, Session, $timeout, Auth, notifyUser) {

	// The users session info from the server
	$scope.jacket = sapayol.jacket;
	oldInput = typeof(sapayol.session[$scope.jacket.model]) !== 'undefined' ? sapayol.session[$scope.jacket.model] : {};

	$scope.init = function(leather_type, leather_color, lining_color, hardware_color) {
		$scope.jacket.leather_type   = typeof(oldInput.leather_type)   !== 'undefined' ? oldInput.leather_type   : leather_type;
		$scope.jacket.leather_color  = typeof(oldInput.leather_color)  !== 'undefined' ? oldInput.leather_color  : leather_color;
		$scope.jacket.lining_color   = typeof(oldInput.lining_color)   !== 'undefined' ? oldInput.lining_color   : lining_color;
		$scope.jacket.hardware_color = typeof(oldInput.hardware_color) !== 'undefined' ? oldInput.hardware_color : hardware_color;
	}

	// Update the session on the server to match the changes that the user makes
	$scope.updateSessionCache = function() {
		var jacket = {};
		jacket[sapayol.jacket.model] = $scope.jacket;
		Session.store(jacket);
	}

  $scope.submitAuthRequest = function(request) {
  	if (request === 'logout') return logout($scope.user);
  	if ($scope.userInfoForm.$valid) {
  		register($scope.user);
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
