var editMeasurementsController = angular.module('editMeasurementsController', []);

editMeasurementsController.controller('editMeasurementsCtrl', ['$scope', '$http', '$q', 'notifyUser', function($scope, $http, $q, notifyUser) {


  $scope.init = function(measurement_type) {
    $scope.productEditMode         = false;
    $scope.bodyEditMode         = false;
    $scope.order            = sapayol.order;
    $scope.measurement_type = measurement_type;
    $scope.currentData = {
      body: sapayol.body_measurements,
      product: sapayol.product_measurements,
    }
  }

  $scope.enterEditMode = function(type) {
    $scope.newData = angular.copy($scope.currentData);
    $scope.productEditMode = type === 'product';
    $scope.bodyEditMode = type === 'body';
  }

  $scope.updateMeasurements = function(measurement_type) {
    updateMeasurementsOnServer($scope.newData, measurement_type).then(function(data) {
        $scope.currentData = angular.copy($scope.newData);
        notifyUser.ofSuccessMessage('Customer successfully updated');
        $scope.bodyEditMode = false;
        $scope.productEditMode = false;
      });
  }

  updateMeasurementsOnServer = function(newData, measurement_type) {
    var deferred = $q.defer();
    const measurements = newData[measurement_type]
    console.log('measurements', measurements)
    $http.post('/orders/' + $scope.order.id + '/fit/', {
      _method:       'PATCH',
      type:          measurement_type,
      height:        measurements.height || null,
      half_shoulder: measurements.half_shoulder || null,
      back_width:    measurements.back_width || null,
      chest:         measurements.chest || null,
      stomach:       measurements.stomach || null,
      back_length:   measurements.back_length || null,
      waist:         measurements.waist || null,
      arm:           measurements.arm || null,
      biceps:        measurements.biceps || null,
      note:          measurements.note || null
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
