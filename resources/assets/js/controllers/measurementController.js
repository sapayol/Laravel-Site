var measurementController = angular.module('measurementController', []);

measurementController.controller('measurementCtrl', ['$scope', '$timeout', function($scope, $timeout) {


	$scope.measurementFraction = null;

	$scope.submitMeasurement = function(step) {
		$scope.displayRequiredError = false;
		if ($scope.step == 'height' && $scope.units === 'in') {
			const feet = $scope.feet ? $scope.feet : 0
			const inches = $scope.inches ? $scope.inches : 0
			$scope.measurement = (parseInt(feet * 12) + parseInt(inches));
			$timeout(function(){
				finalForm.submit();
			}, 100);
		} else if ($scope.measurementForm[step].$error.required) {
			$timeout(function(){
				$scope.displayRequiredError = true;
			}, 100);
		} else if ($scope.measurementForm.$valid) {
			finalForm.submit();
		} else {
			$scope.showFormErorrs = true;
		}
	}

	$scope.init = function(step, units, measurement) {
		$scope.step = step;
		$scope.units = units;
		$scope.change(measurement);
		if ($scope.step == 'height' && $scope.units === 'in') {
			$scope.feet = parseInt(measurement/12);
			$scope.inches = parseInt(measurement%12);
		} else {
			$scope.measurement = measurement;
		}
	}

	$scope.change = function(measurement) {
		$scope.displayMinMaxError = false;
	 	if (typeof(measurement) !== 'undefined' ) {
			result = Math.round( measurement * 1e2 ) / 1e2;
			$scope.measurement = result;
			decimal = Math.round(result * 8) / 8;
			if (getFractionFromDecimal(decimal) !== '') {
				$scope.measurementFraction = getFractionFromDecimal(decimal);
			};
		} else {
			$scope.measurementFraction = null;
		}
	}

	getFractionFromDecimal = function(decimal) {
		var rightDecimalPart = (decimal % 1).toFixed(2);
		if (rightDecimalPart === '0.13') {
			result = '1/8';
		} else if (rightDecimalPart === '0.25') {
			result = '1/4';
		} else if (rightDecimalPart === '0.38') {
			result = '3/8';
		} else if (rightDecimalPart === '0.50') {
			result = '1/2';
		} else if (rightDecimalPart === '0.63') {
			result = '5/8';
		} else if (rightDecimalPart === '0.75') {
			result = '3/4';
		} else if (rightDecimalPart === '0.88') {
			result = '7/8';
		} else {
			return false;
		}

		return parseInt(decimal) + "  " + result;
	}

	highestCommonFactor = function(a,b) {
    if (b==0) return a;
    return highestCommonFactor(b,a%b);
	}


}]);


