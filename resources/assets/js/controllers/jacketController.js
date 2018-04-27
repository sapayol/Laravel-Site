var jacketController = angular.module('jacketController', []);

jacketController.controller('jacketCtrl', ['$scope', '$http', '$q', 'Session', '$timeout', 'Auth', 'notifyUser', function($scope, $http, $q, Session, $timeout, Auth, notifyUser) {

  getLeatherColorId = function(name) {
    return name === 'black' ? 1 : 2;
  }

  const leatherDefaults = {
    'bleecker': getLeatherColorId('black'),
    'linden': getLeatherColorId('brown'),
    'mott': getLeatherColorId('black'),
    'e-161': getLeatherColorId('brown'),
  }

  var getColorFromURLHash = function() {
    if (window.location.hash) {
      const hash = window.location.hash.substring(1)
      const validHash = hash === 'black' || hash === 'brown'

      return validHash ? hash : false
    } else {
      return false
    }
  }

  $scope.init = function(model) {
    const sessionJacket = sapayol.session[model]
    const catalogJacket = sapayol.jackets ? sapayol.jackets[model] : sapayol.jacket
    $scope.jacket = typeof(sessionJacket) !== 'undefined' ? sessionJacket : catalogJacket
    var hashColor = getColorFromURLHash()
    if (hashColor) {
      $scope.jacket.leather_color = getLeatherColorId(hashColor)
    } else if (typeof(sessionJacket) !== 'undefined') {
      $scope.jacket = sessionJacket
    } else {
      $scope.jacket.leather_color = leatherDefaults[$scope.jacket.model]
    }
    $scope.leather_color = $scope.jacket.leather_color
  }

  $scope.getColorName = function(id) {
    return parseInt(id) === 1 ? 'black' : 'brown'
  }


  // Update the session on the server to match the changes that the user makes
  $scope.updateSessionCache = function() {
    var session = {}
    var jacket = $scope.jacket
    jacket.leather_color = parseInt($scope.leather_color)
    session[jacket.model] = jacket
    Session.store(session)
  }

  $scope.$on('changePageColor', function (event, color_id) {
    $scope.jacket.leather_color = parseInt(color_id);
    $scope.leather_color = parseInt(color_id);
  });

}]);
