var editMeasurementsController = angular.module('editMeasurementsController', []);

editMeasurementsController.controller('editMeasurementsCtrl', ['$scope', '$http', '$q', 'notifyUser', function($scope, $http, $q, notifyUser) {


  $scope.init = function(measurement_type) {
    $scope.editMode         = false;
    $scope.order            = sapayol.order;
    $scope.measurement_type = measurement_type;
    $scope.currentData      = measurement_type == 'body' ? sapayol.body_measurements : sapayol.product_measurements;
  }

  $scope.enterEditMode = function() {
    $scope.newData = angular.copy($scope.currentData);
    $scope.editMode = true;
  }

  $scope.updateMeasurements = function() {
    updateOrderOnServer($scope.newData, $scope.measurement_type).then(function(data) {
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
      height:        newData.height,
      half_shoulder: newData.half_shoulder,
      back_width:    newData.back_width,
      chest:         newData.chest,
      stomach:       newData.stomach ,
      back_length:   newData.back_length,
      waist:         newData.waist,
      arm:           newData.arm,
      biceps:        newData.biceps,
      note:          newData.note
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
