var globalController = angular.module('globalController', []);

globalController.controller('GlobalCtrl', ['$rootScope', '$document', 'Session', '$scope', 'notifyUser', function($rootScope, $document, Session, $scope, notifyUser) {
		$rootScope.flushSession = function() {
			Session.delete('flush').then(function(){
				notifyUser.of('Session flushed');
			});
		};

		$rootScope.getSession = function() {
			Session.getCurrent().then(function(session){
				console.log(session);
			});
		};
}]);

