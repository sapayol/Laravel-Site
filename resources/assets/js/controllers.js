var controllers = angular.module('controllers', [
	'sapayolControllers',
]);

var sapayolControllers = angular.module('sapayolControllers', []);

sapayolControllers.controller('lookAndFitCtrl', ['$scope', '$http', '$q', function($scope, $http, $q) {
	$scope.selectedColumn = 0;
	$scope.jacket = {
		leather_type: 'lamb heavy',
    leather_color:  'black',
    lining_color:  'black',
    hardware_color: 'silver',
    size: 44
	};
}]);

sapayolControllers.controller('checkoutCtrl', ['$scope', '$http', '$q', function($scope, $http, $q) {

	$scope.submitUserInfo = function() {
	  if ($scope.userInfoForm.$valid) {
	  	addUserInfoToOrder($scope.user);
			$scope.userInfoSubmitted = true;
	  } else {
	  	$scope.showShippingErorrs = true;
	  }
	};

	$scope.submitShippingInfo = function() {
	  if ($scope.shippingInfoForm.$valid) {
	  	addShippingInfoToOrder($scope.shippingInfo);
			$scope.shippingInfoSubmitted = true;
	  } else {
	  	$scope.showShippingErorrs = true;
	  }
	};

	$scope.submitPaymentInfo = function() {
		$scope.checkoutStep = 4;
	};

	addUserInfoToOrder = function() {
		// perform ajax request to update back-end
	}

	addShippingInfoToOrder = function() {
		// perform ajax request to update back-end
	}

}]);
