var jacketController = angular.module('jacketController', []);

jacketController.controller('jacketCtrl', ['$scope', '$http', '$q', 'Session', '$timeout', 'Auth', 'notifyUser', function($scope, $http, $q, Session, $timeout, Auth, notifyUser) {

  $scope.init = function(model) {
    $scope.jacket = typeof(sapayol.session[model]) !== 'undefined' ? sapayol.session[model] : sapayol.jackets[model];
    $scope.leather_color = $scope.jacket ? $scope.getColorName($scope.jacket.leather_color) : '1'
  }

  $scope.getColorName = function(id) {
    return id === '1' ? 'black' : 'brown';
  }

  // If the session has no jacket, set the default color to 'black'
  $scope.leather_color = typeof($scope.jacket) !== 'undefined' ? $scope.getColorName($scope.jacket['leather_color']) : 'black'

  $scope.$on('changePageColor', function (event, color_id) {
    $scope.leather_color = $scope.getColorName(color_id);
  });

}]);
