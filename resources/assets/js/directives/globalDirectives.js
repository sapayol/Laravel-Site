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
		rounded = Math.round( number * 1e2 ) / 1e2;
		return  Math.round(rounded * 8) / 8;
	}

	decimalToFraction = function(decimal) {
		var rightDecimalPart = (decimal % 1).toFixed(2);
		if (decimal < .13) {
			return 0;
		} else if (decimal > .88) {
			return 1;
		}

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
			if (fraction == 0 ) {
				$elm[0].innerHTML =  parseInt(userValue)
			} else if (fraction == 1) {
				$elm[0].innerHTML = parseInt(userValue) + 1;
			} else {
				result = fraction ? parseInt(userValue) + " " + fraction : parseInt(userValue);
				$elm[0].textContent = result;
				if (fraction) {
					$elm[0].innerHTML = parseInt(userValue) + " <small>" + fraction + "</small>";
				} else {
					$elm[0].innerHTML = parseInt(userValue);
				};
			}
    }
  }
});