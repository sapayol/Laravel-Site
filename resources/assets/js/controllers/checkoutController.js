var checkoutController = angular.module('checkoutController', []);

checkoutController.controller('checkoutCtrl', ['$scope', '$http', '$q', '$document', 'notifyUser', 'Session',  function($scope, $http, $q, $document, notifyUser, Session) {

	$scope.card = typeof(sapayol.session['card']) !== 'undefined' ? sapayol.session['card'] : {};

	init = function() {
		$scope.address = {};
		if (sapayol.user !== null) {
			$scope.address.name = sapayol.user.name;
		};
		if (sapayol.address !== null) {
			$scope.address = sapayol.address;
			$scope.shippingInfoSubmitted = true;
			if (typeof($scope.card) !== 'undefined' && typeof($scope.card.id) !== 'undefined') {
				$scope.paymentInfoSubmitted = true;
				$document.scrollToElement(angular.element('#order-summary'), 80, 500);
			} else{
				$document.scrollToElement(angular.element('#payment-info'), 80, 500);
			}
		};
	}

	$scope.submitShippingInfo = function(order_id) {
	  if ($scope.shippingInfoForm.$valid) {
	  	addShippingInfoToOrder($scope.address, order_id).then(function(response){
				$scope.shippingInfoSubmitted = true;
				$document.scrollToElement(angular.element('#payment-info'), 80, 500);
	  	});
	  } else {
	  	$scope.showShippingErorrs = true;
	  }
	};


	addShippingInfoToOrder = function(address, order_id) {
		var deferred = $q.defer();
		$http.post('/orders/' + order_id, {
			_method: 'PATCH',
			name:     address.name,
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
			Session.store({card: $scope.card});
			$scope.paymentInfoSubmitted = true;
			console.log(response);
		}
	};

	init();

}]);
