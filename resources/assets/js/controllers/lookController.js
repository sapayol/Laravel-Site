var lookController = angular.module('lookController', []);

lookController.controller('lookAndFitCtrl', ['$scope', '$http', '$q', function($scope, $http, $q) {
	$scope.selectedColumn = 0;
	$scope.jacket = {
		leather_type: 'lamb heavy',
    leather_color:  'black',
    lining_color:  'black',
    hardware_color: 'silver',
    size: 44
	};
}]);
