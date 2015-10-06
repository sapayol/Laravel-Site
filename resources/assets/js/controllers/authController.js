var authController = angular.module('authController', []);

authController.controller('authCtrl', ['$scope', '$http', '$q', 'Session', '$timeout', 'Auth', 'notifyUser', function($scope, $http, $q, Session, $timeout, Auth, notifyUser) {

  $scope.resetPassword = function() {
    if ($scope.userInfoForm.email.$valid) {
      Auth.reset($scope.user.email)
        .then(function(data) {
          notifyUser.of(data);
          $scope.reset = false;
        });
    } else {
      $scope.showUserErorrs = true;
    }
  }

}]);
