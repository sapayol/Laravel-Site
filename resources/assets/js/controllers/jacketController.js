var jacketController = angular.module('jacketController', []);

jacketController.controller('jacketCtrl', ['$scope', '$http', '$q', 'Session', '$timeout', 'Auth', 'notifyUser', function($scope, $http, $q, Session, $timeout, Auth, notifyUser) {

  const jacket = sapayol.session[sapayol.jacket.name.toLowerCase()]

  const getColorName = function(id) {
    return id === '1' ? 'black' : 'brown';
  }

  // If the session has no jacket, set the default color to 'black'
  $scope.leather_color = typeof(jacket['leather_color']) !== 'undefined' ? getColorName(jacket['leather_color']) : 'black'

  $scope.$on('changePageColor', function (event, color_id) {
    $scope.leather_color = getColorName(color_id);
  });

}]);
