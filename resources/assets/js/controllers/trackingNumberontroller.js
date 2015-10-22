var trackingNumberController = angular.module('trackingNumberController', []);

trackingNumberController.controller('trackingNumberCtrl', ['$scope', '$http', '$q', 'notifyUser', function($scope, $http, $q, notifyUser) {

  $scope.order       = sapayol.order;

  $scope.submitTrackingNumber = function() {
    updateTrackingOnServer().then(function(data) {
        notifyUser.ofSuccessMessage('Message sent to tailor');
        $scope.tailorMode = false;
        $scope.taskMode = false;
        location.reload();
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
