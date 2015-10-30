var tailorMessageController = angular.module('tailorMessageController', []);

tailorMessageController.controller('tailorMessageCtrl', ['$scope', '$http', '$q', 'notifyUser', function($scope, $http, $q, notifyUser) {

  $scope.order = sapayol.order;

  $scope.submitTailorMessage = function() {
    sendMessageOnServer().then(function(data) {
        notifyUser.ofSuccessMessage('Message sent to tailor');
        $scope.$parent.tailorNote = false;
        $scope.$parent.taskMode = false;
        $scope.note = null;
        $scope.inclusions = null;
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

}]);
