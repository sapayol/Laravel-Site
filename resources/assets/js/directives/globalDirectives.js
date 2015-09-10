var globalDirectives = angular.module('globalDirectives', []);

globalDirectives.directive('scrollToTop', function() {
  return {
    restrict: 'A',
    link: function(scope, $elm) {
      $elm.on('click', function() {
        $("body").animate({scrollTop: 0}, "slow");
      });
    }
  }
});

globalDirectives.directive('decimalToFraction', function() {

	roundDownToQuarter = function(number) {
		result = Math.round( number * 1e2 ) / 1e2;
		return Math.round(result * 8) / 8;
	}

	decimalToFraction = function(decimal) {
		var rightDecimalPart = (decimal % 1).toFixed(2);
		if (rightDecimalPart === '0.13') {
			return '1/8';
		} else if (rightDecimalPart === '0.25') {
			return '1/4';
		} else if (rightDecimalPart === '0.38') {
			return '3/8';
		} else if (rightDecimalPart === '0.50') {
			return '1/2';
		} else if (rightDecimalPart === '0.63') {
			return '5/8';
		} else if (rightDecimalPart === '0.75') {
			return '3/4';
		} else if (rightDecimalPart === '0.88') {
			return '7/8';
		} else {
			return false;
		}
	}

	userValueToFraction = function(userValue) {
		number  = (userValue % 1).toFixed(2);
		decimal = roundDownToQuarter(number);
		return decimalToFraction(decimal);
	}

  return {
    restrict: 'A',
    link: function(scope, $elm, attrs, tabsCtrl) {
			userValue = attrs.decimalToFraction;
			fraction  = userValueToFraction(userValue);
			result = fraction ? parseInt(userValue) + " " + fraction : parseInt(userValue);
			$elm[0].textContent = result;
    }
  }
});