var adminTasksController = angular.module('adminTasksController', []);

adminTasksController.controller('adminTasksCtrl', ['$scope', '$http', '$q', 'notifyUser', function($scope, $http, $q, notifyUser) {

  // $scope.editMode    = false;
  $scope.order       = sapayol.order;
  // $scope.currentData = {
  //   user: sapayol.user,
  //   address: sapayol.address
  // };

  // $scope.enterEditMode = function() {
  //   $scope.newData = angular.copy($scope.currentData);
  //   $scope.editMode = true;
  // }

  $scope.submitTailorMessage = function() {
    sendMessageOnServer().then(function(data) {
        notifyUser.ofSuccessMessage('Message sent to tailor');
        $scope.tailorMode = false;
        $scope.taskMode = false;
      });
  }

  sendMessageOnServer = function() {
    var deferred = $q.defer();
    $http.post('/admin/orders/' + $scope.order.id + '/tailor', {
      inclusions: $scope.inclusions,
      note: $scope.note
    }).success(function(response, status) {
      deferred.resolve(response);
    }).error(function(response, status) {
      notifyUser.ofApiErrors(response, status);
    });
    return deferred.promise;
  }

  $scope.submitTracking = function() {
    sendMessageOnServer().then(function(data) {
        notifyUser.ofSuccessMessage('Message sent to tailor');
        $scope.tailorMode = false;
        $scope.taskMode = false;
      });
  }

  updateTrackingOnServer = function() {
    var deferred = $q.defer();
    $http.post('/admin/orders/' + $scope.order.id + '/tracking', {
      tracking_number: $scope.trackingNumber,
    }).success(function(response, status) {
      deferred.resolve(response);
    }).error(function(response, status) {
      notifyUser.ofApiErrors(response, status);
    });
    return deferred.promise;
  }

}]);
