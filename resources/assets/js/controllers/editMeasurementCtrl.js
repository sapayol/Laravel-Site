var editMeasurementsController = angular.module('editMeasurementsController', []);

editMeasurementsController.controller('editMeasurementsCtrl', ['$scope', '$http', '$q', 'notifyUser', function($scope, $http, $q, notifyUser) {

  $scope.editMode    = false;
  $scope.order       = sapayol.order;
  $scope.currentData = {
    user_measurements: sapayol.user_measurements
  }

  $scope.enterEditMode = function() {
    $scope.newData = angular.copy($scope.currentData);
    $scope.editMode = true;
  }

  $scope.updateMeasurements = function(type) {
    updateOrderOnServer($scope.newData, type).then(function(data) {
        $scope.currentData = angular.copy($scope.newData);
        notifyUser.ofSuccessMessage('Customer successfully updated');
        $scope.editMode = false;
      });
  }

  updateOrderOnServer = function(newData, measurement_type) {
    var deferred = $q.defer();
    $http.post('/orders/' + $scope.order.id + '/fit/', {
      _method:       'PATCH',
      type:          measurement_type,
      height:        newData.user_measurements.height,
      half_shoulder: newData.user_measurements.half_shoulder,
      back_width:    newData.user_measurements.back_width,
      chest:         newData.user_measurements.chest ,
      stomach:       newData.user_measurements.stomach ,
      back_length:   newData.user_measurements.back_length,
      waist:         newData.user_measurements.waist,
      arm:           newData.user_measurements.arm,
      biceps:        newData.user_measurements.biceps,
      note:          newData.user_measurements.note
    }).success(function(response, status) {
      deferred.resolve(response);
    }).error(function(response, status) {
      notifyUser.ofApiErrors(response, status);
    });
    return deferred.promise;
  }

  $scope.notSorted = function(obj){
    if (!obj) {
        return [];
    }
    return Object.keys(obj);
  }

}]);
