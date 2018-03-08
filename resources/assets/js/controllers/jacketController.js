var jacketController = angular.module('jacketController', []);

jacketController.controller('jacketCtrl', ['$scope', '$http', '$q', 'Session', '$timeout', 'Auth', 'notifyUser', function($scope, $http, $q, Session, $timeout, Auth, notifyUser) {

  var getHashColor = function() {
    if (window.location.hash) {
      const hash = window.location.hash.substring(1)
      const validHash = hash === 'black' || hash === 'brown'

      return validHash ? hash : false
    } else {
      return false
    }
  }

  getColorId = function(name) {
    return name === 'black' ? '1' : '2';
  }

  $scope.init = function(model) {
    $scope.jacket = typeof(sapayol.session[model]) !== 'undefined' ? sapayol.session[model] : sapayol.jackets[model];
    var hashColor = getHashColor()
    if (hashColor) {
      $scope.leather_color = getColorId(hashColor)
      $scope.jacket.leather_color = getColorId(hashColor)
    } else {
      $scope.leather_color = $scope.jacket ? $scope.jacket.leather_color : '1'
    }
  }

  $scope.getColorName = function(id) {
    return id === '1' ? 'black' : 'brown';
  }


  // Update the session on the server to match the changes that the user makes
  $scope.updateSessionCache = function() {
    var session = {}
    var jacket = $scope.jacket
    jacket.leather_color = $scope.leather_color
    session[jacket.model] = jacket
    Session.store(session);
  }

  $scope.$on('changePageColor', function (event, color_id) {
    $scope.leather_color = color_id;
  });

}]);
