var editLookController = angular.module('editLookController', []);

editLookController.controller('editLookCtrl', ['$scope', '$http', '$q', 'notifyUser', function($scope, $http, $q, notifyUser) {

  $scope.editMode   = false;
  $scope.attributes = sapayol.look;
  $scope.options    = sapayol.look_options;
  $scope.order      = sapayol.order;

  $scope.enterEditMode = function() {
    $scope.selectedLeatherType = $scope.options.leather_types.filter(function(leather_type) {
      return leather_type.id == $scope.attributes.leather_type.id;
    })[0];

    $scope.selectedLeatherColor = $scope.options.leather_colors.filter(function(leather_color) {
      return leather_color.id == $scope.attributes.leather_color.id;
    })[0];

    $scope.selectedLiningColor = $scope.options.lining_colors.filter(function(lining_color) {
      return lining_color.id == $scope.attributes.lining_color.id;
    })[0];

    $scope.selectedHardwareColor = $scope.options.hardware_colors.filter(function(hardware_color) {
      return hardware_color.id == $scope.attributes.hardware_color.id;
    })[0];

    $scope.editMode = true;
  };

  $scope.updateLook = function() {
    updateAttributesOnServer().then(function(data) {
      $scope.attributes = {
        leather_type:   $scope.selectedLeatherType,
        leather_color:  $scope.selectedLeatherColor,
        lining_color:   $scope.selectedLiningColor,
        hardware_color: $scope.selectedHardwareColor
      }
      notifyUser.ofSuccessMessage('Look successfully updated');
        $scope.editMode = false;
      });
  };

  updateAttributesOnServer = function() {
    var deferred = $q.defer();
    $http.post('/orders/' + $scope.order.id + '/look', {
      _method: 'PATCH',
      leather_type:    $scope.selectedLeatherType.id,
      leather_color:   $scope.selectedLeatherColor.id,
      lining_color:    $scope.selectedLiningColor.id,
      hardware_color: $scope.selectedHardwareColor.id,
    }).success(function(response, status) {
      deferred.resolve(response);
    }).error(function(response, status) {
      notifyUser.ofApiErrors(response, status);
    });
    return deferred.promise;
  }
}]);
