var editUserController = angular.module('editUserController', []);

editUserController.controller('editUserCtrl', ['$scope', '$http', '$q', 'Session', '$timeout', 'Auth', 'notifyUser', function($scope, $http, $q, Session, $timeout, Auth, notifyUser) {

  init = function() {
    $scope.editMode = false;
    $scope.order    = sapayol.order;
    $scope.jacket   = sapayol.jacket;
    $scope.currentData = {
      user: sapayol.user,
      address: sapayol.address,
    }
  }

  $scope.enterEditMode = function() {
    $scope.newData = angular.copy($scope.currentData);
    $scope.editMode = true;
  }

  $scope.updateUser = function() {
    if ($scope.updateUserForm.email.$valid) {
      updateOrderOnServer($scope.newData).then(function(data) {
          $scope.currentData = angular.copy($scope.newData);
          notifyUser.ofSuccessMessage('Customer successfully updated');
          $scope.editMode = false;
        });
    } else {
      $scope.showErorrs = true;
    }
  }

  updateOrderOnServer = function(newData) {
    var deferred = $q.defer();
    $http.post('/orders/' + $scope.order.id, {
      _method: 'PATCH',
      name:     newData.user.name,
      email:    newData.user.email,
      address1: newData.address.address1,
      address2: newData.address.address2,
      city:     newData.address.city,
      postcode: newData.address.postcode,
      province: newData.address.province,
      country:  newData.address.country,
    }).success(function(response, status) {
      deferred.resolve(response);
    }).error(function(response, status) {
      notifyUser.ofApiErrors(response, status);
    });
    return deferred.promise;
  }





  $scope.updateInstructorOnBackend = function(instructorEnrollment) {
    if (typeof(instructorEnrollment.id) === 'undefined' ) {
      Enrollment.create(instructorEnrollment).then(function(enrollment) {
        $scope.updateViewWithNewInstructor(enrollment);
      });
    } else {
      Enrollment.update(instructorEnrollment).then(function(enrollment) {
        $scope.updateViewWithNewInstructor(enrollment);
      });
    }
  }

  $scope.updateViewWithNewInstructor = function(enrollment) {
    $scope.currentInstructor = $scope.selectedInstructor;
    $scope.instructorEnrollment = enrollment;
    notifyUser.ofSuccessMessage('New instructor assigned');
    $scope.editMode = false;
  }

  init();

}]);
