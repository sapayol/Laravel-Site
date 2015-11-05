var checkoutController = angular.module('checkoutController', []);

checkoutController.controller('checkoutCtrl', ['$scope', '$http', '$q', '$document', 'notifyUser', 'Session', '$timeout', function($scope, $http, $q, $document, notifyUser, Session, $timeout) {

	$scope.card         = typeof(sapayol.session['card'])         !== 'undefined' ? sapayol.session['card'] : {};
	$scope.stripe_token = typeof(sapayol.session['stripe_token']) !== 'undefined' ? sapayol.session['stripe_token'] : {};

	init = function() {
		$scope.address = {};
		if (sapayol.address !== null) {
			$scope.address          = sapayol.address;
			$scope.addressSubmitted = true;
			$scope.addressDisabled  = true;
			saved_card_info = (
				   typeof($scope.stripe_token) !== 'undefined'
				&& typeof($scope.card)         !== 'undefined'
				&& typeof($scope.card.id)      !== 'undefined') ? true : false;
			if (saved_card_info) {
				$scope.paymentInfoSubmitted = true;
				$scope.paymentInfoDisabled  = true;
				$timeout(function(){
					$('#number').val('XXXX XXXX XXXX ' + $scope.card.last4);
					$('#expiry').val($scope.card.exp_month + '/' + $scope.card.exp_year);
					$('#cvc').val('XXX');
				}, 300);
				$document.scrollToElement($('#order-summary'), 80, 500);
			} else {
				$document.scrollToElement($('#address'), 80, 500);
			}
		};
    $(document).foundation();
		if (sapayol.user !== null) {
			$scope.address.name = sapayol.user.name;
		};
	}

	$scope.changePaymentInfo = function() {
		$document.scrollToElement($('#payment-info'), 80, 500);
		$scope.paymentInfoDisabled = false;
		$scope.paymentInfoSubmitted = false;
		$scope.card = null;
		$('#number').val(null);
		$('#expiry').val(null);
		$('#cvc').val(null);
		Session.store({card: $scope.card});
	}

	$scope.changeAddress = function() {
		$document.scrollToElement($('#address'), 80, 500);
		$scope.addressDisabled = false;
	}

	$scope.submitAddress = function(order_id) {
	  if ($scope.addressForm.$valid) {
	  	if ($scope.paymentInfoSubmitted) {
				$document.scrollToElement($('#order-summary'), 80, 500);
	  	} else {
	  		addAddressToOrder($scope.address, order_id).then(function(response){
					$scope.addressSubmitted = true;
					$scope.addressDisabled = true;
					$document.scrollToElement($('#payment-info'), 80, 500);
	  		});
	  	}
	  } else {
	  	$scope.showAddressErorrs = true;
	  }
	};


	addAddressToOrder = function(address, order_id) {
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
			$scope.card                 = response.card;
			$scope.stripe_token         = response.id;
			$scope.paymentInfoSubmitted = true;
			$scope.paymentInfoDisabled  = true;

			Session.store({
				card:         $scope.card,
				stripe_token: $scope.stripe_token
			});
		}
	};

	$scope.closeModal = function() {
		$('#cvcModal').foundation('reveal', 'close');
	};

	init();

}]);
