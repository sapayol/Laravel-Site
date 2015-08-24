var measurementController = angular.module('measurementController', []);

measurementController.controller('measurementCtrl', ['$scope', '$timeout', function($scope, $timeout) {


	$scope.measurementFraction = null;

	$scope.submitMeasurement = function(step) {
		if ($scope.measurementForm[step].$error.min || $scope.measurementForm[step].$error.max ) {
			$scope.displayMinMaxError = true;
		} else if ($scope.measurementForm.$valid) {
			$scope.measurementForm.submit();
		}
	}

	$scope.init = function(measurement) {
		$scope.measurement = measurement;
		$scope.change(measurement);
	}

	$scope.change = function(measurement) {
		$scope.displayMinMaxError = false;
	 	if (typeof(measurement) !== 'undefined' ) {
			result = Math.round( measurement * 1e2 ) / 1e2;
			$scope.measurement = result;
			resultEight = Math.round(result * 8) / 8;
			$scope.measurementFraction = getFractionFromDecimal(resultEight);
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
			result = '';
		}

		return parseInt(decimal) + "  " + result;
	}

	highestCommonFactor = function(a,b) {
    if (b==0) return a;
    return highestCommonFactor(b,a%b);
	}


}]);


