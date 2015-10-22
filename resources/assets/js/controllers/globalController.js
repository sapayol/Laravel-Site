var globalController = angular.module('globalController', []);

globalController.controller('GlobalCtrl', ['$rootScope', '$document', 'Session', '$scope', '$timeout', 'notifyUser', function($rootScope, $document, Session, $scope, $timeout, notifyUser) {
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

		$rootScope.focus = function(element_id) {
			$timeout(function(){
				$('#' + element_id).focus();
			}, 500);
		}
}]);

