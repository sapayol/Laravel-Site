var adminTasksController = angular.module('adminTasksController', []);

adminTasksController.controller('adminTasksCtrl', ['$scope', '$http', '$q', 'Session', '$timeout', 'Auth', 'notifyUser', function($scope, $http, $q, Session, $timeout, Auth, notifyUser) {
    $scope.tailorNote = false;
    $scope.taskMode = false;
    $scope.trackingInfo = false;
}]);
