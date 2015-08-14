var checkoutController = angular.module('checkoutController', []);

checkoutController.controller('checkoutCtrl', ['$scope', '$http', '$q', '$document', 'notifyUser',  function($scope, $http, $q, $document, notifyUser) {

	init = function() {
		if (sapayol.user !== null) {
			$scope.user = sapayol.user;
			$scope.userInfoSubmitted = true;
			$document.scrollToElement(angular.element('#shipping-info'), 80, 500);
		};
		if (sapayol.address !== null) {
			$scope.address = sapayol.address;
			$scope.shippingInfoSubmitted = true;
			$document.scrollToElement(angular.element('#payment-info'), 80, 500);
		};
	}

	$scope.submitUserInfo = function(order_id) {
	  if ($scope.userInfoForm.$valid) {
	  	addUserInfoToOrder($scope.user, order_id).then(function(response){
				$scope.userInfoSubmitted = true;
				$document.scrollToElement(angular.element('#shipping-info'), 80, 500);
	  	});
	  } else {
	  	$scope.showUserErorrs = true;
	  }
	};

	$scope.submitShippingInfo = function(order_id) {
	  if ($scope.shippingInfoForm.$valid) {
	  	addShippingInfoToOrder($scope.address, order_id).then(function(response){
	  		console.log(response);
				$scope.shippingInfoSubmitted = true;
				$document.scrollToElement(angular.element('#payment-info'), 80, 500);
	  	});
	  } else {
	  	$scope.showShippingErorrs = true;
	  }
	};

	addUserInfoToOrder = function(user, order_id) {
		var deferred = $q.defer();
		$http.post('/orders/' + order_id, {
			_method: "PATCH",
			name: user.name,
			email: user.email,
		}).success(function(response, status) {
			deferred.resolve(response);
		}).error(function(response, status) {
			notifyUser.ofApiErrors(response, status);
		});
		return deferred.promise;
	}

	addShippingInfoToOrder = function(address, order_id) {
		var deferred = $q.defer();
		$http.post('/orders/' + order_id, {
			_method: 'PATCH',
			address1: address.address1,
			address2: address.address2,
			city:     address.city,
			postcode: address.postcode,
			province: address.province,
			country:  address.country,
		}).success(function(response, status) {
			deferred.resolve(response);
		}).error(function(response, status) {
			notifyUser.ofApiErrors(response, status);
		});
		return deferred.promise;
	}

	Stripe.setPublishableKey('pk_test_G2k7gKlVNK1rpGMDeF5FDIhO');

	$scope.stripeResponseHandler = function(status, response) {
		if(response.error) {
	  	if (status == 400) {
		  	notifyUser.ofErrorMessage(response.error);
	  	} else {
		  	notifyUser.ofErrorMessage(response.error.message);
	  	};
	  } else {
			$scope.card = response.card;
			$scope.stripe_token = response.id;
			$scope.paymentInfoSubmitted = true;
			console.log(response);
		}
	};

	init();

}]);
