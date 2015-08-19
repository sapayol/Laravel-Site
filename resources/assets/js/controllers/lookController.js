var lookController = angular.module('lookController', []);

lookController.controller('lookAndFitCtrl', ['$scope', '$http', '$q', 'Session', function($scope, $http, $q, Session) {

	// The users session info from the server

	$scope.jacket = sapayol.jacket;
	oldInput = typeof(sapayol.session[$scope.jacket.model]) !== 'undefined' ? sapayol.session[$scope.jacket.model] : {};

	$scope.jacket.leather_type   = typeof(oldInput.leather_type)   !== 'undefined' ? oldInput.leather_type   : 'lamb heavy';
	$scope.jacket.leather_color  = typeof(oldInput.leather_color)  !== 'undefined' ? oldInput.leather_color  : 'black';
	$scope.jacket.lining_color   = typeof(oldInput.lining_color)   !== 'undefined' ? oldInput.lining_color   : 'black';
	$scope.jacket.hardware_color = typeof(oldInput.hardware_color) !== 'undefined' ? oldInput.hardware_color : 'silver';
	$scope.jacket.size           = typeof(oldInput.size)           !== 'undefined' ? oldInput.size           : 44;

	// Update the session on the server to match the changes that the user makes
	$scope.updateSessionCache = function() {
		var jacket = {};
		jacket[sapayol.jacket.model] = $scope.jacket;
		Session.store(jacket);
	}

}]);
