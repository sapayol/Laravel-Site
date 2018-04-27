var lookController = angular.module('lookController', [])

lookController.controller('lookAndFitCtrl', ['$rootScope', '$scope', '$http', '$q', 'Session', '$timeout', 'Auth', 'notifyUser', function($rootScope, $scope, $http, $q, Session, $timeout, Auth, notifyUser) {

  getLiningColorId = function(name) {
    return name === 'black' ? 12 : 18
  }

  const liningDefaults = {
    'black': getLiningColorId('black'),
    'brown': getLiningColorId('brown'),
  }

  getLeatherColorId = function(name) {
    return name === 'black' ? 1 : 2;
  }

  attributeIsSaved = function(attribute_name) {
    const model = sapayol.jacket.model
    const sessionJacket = sapayol.session[model]
    if (typeof(sessionJacket) === 'undefined') {
      return false
    }

    if (typeof(sessionJacket[attribute_name]) === 'undefined') {
      return false
    }

    return true
  }

  const leatherDefaults = {
    'bleecker': getLeatherColorId('black'),
    'linden': getLeatherColorId('brown'),
    'mott': getLeatherColorId('black'),
    'e-161': getLeatherColorId('brown'),
  }

  $scope.init = function(leather_type, leather_color, lining_color, hardware_color, collar_color) {
    // The users session info from the server
    $scope.jacket = sapayol.jacket
    const model = sapayol.jacket.model
    const sessionJacket = sapayol.session[model]

    $scope.jacket.leather_type   = attributeIsSaved('leather_type')   ? sessionJacket.leather_type   : 6 // Lamb
    $scope.jacket.leather_color  = attributeIsSaved('leather_color')  ? sessionJacket.leather_color  : parseInt(leatherDefaults[model])
    $scope.jacket.lining_color   = attributeIsSaved('lining_color')   ? sessionJacket.lining_color   : getLiningColorId(getAttributeName($scope.jacket.leather_color))
    $scope.jacket.hardware_color = attributeIsSaved('hardware_color') ? sessionJacket.hardware_color : 9 // Silver
    $scope.jacket.collar_color   = attributeIsSaved('collar_color')   ? sessionJacket.collar_color   : getAttributeName($scope.jacket.leather_color) === 'black' ? 14 : 16
    $scope.updateSessionCache()
    $scope.showBack = false
  }

  getAttributeName = function(id) {
    const result = sapayol.attributes.find(function(attribute) {
      return parseInt(attribute.id) === parseInt(id)
    })

    return result ? result.name : null
  }

  $scope.changeJacketColor = function() {
    $rootScope.$broadcast('changePageColor', $scope.jacket.leather_color)
    const onJacketPage = window.location.href.indexOf('jackets') > -1
    const jacketColor = getAttributeName($scope.jacket.leather_color)
    if (onJacketPage) {
      window.location.hash = jacketColor
    }
    $scope.jacket.lining_color = jacketColor === 'black' ? 12 : 18
    $scope.jacket.collar_color = parseInt($scope.jacket.collar_color) === 0 ? 0 : jacketColor === 'black' ? 14 : 17
    $scope.updateSessionCache()
  }

  // Update the session on the server to match the changes that the user makes
  $scope.updateSessionCache = function() {
    var jacket = {}
    $scope.setPreviewImageName()
    jacket[sapayol.jacket.model] = $scope.jacket
    const leather_color = getAttributeName($scope.jacket.leather_color)
    $scope.compatibleLinings = leather_color === 'black' ? ['black', 'bordeaux'] : ['brown', 'orange']
    $scope.compatibleCollars = leather_color === 'black' ? ['black', 'gray'] : ['brown', 'cream']
    Session.store(jacket)
  }

  $scope.setPreviewImageName = function() {
    const lining_color = getAttributeName($scope.jacket.lining_color)
    const hardware_color = getAttributeName($scope.jacket.hardware_color)
    if ($scope.jacket.model === 'linden') {
      const collar_name = getAttributeName($scope.jacket.collar_color)
      var collar_color = 'fur-2'
      if (parseInt($scope.jacket.collar_color) === 0) {
        collar_color = 'none'
      } else if (collar_name === 'brown') {
        collar_color = 'fur-1'
      }

      $scope.front_image = lining_color + '-' + hardware_color + '-' + collar_color
      const sameBack = $scope.jacket.model === 'e-161'

      $scope.back_image = sameBack ? 'back' : 'back-' + collar_color
    } else {
      $scope.front_image = lining_color + '-' + hardware_color
      const sameBack = $scope.jacket.model === 'e-161'
      $scope.back_image = sameBack ? 'back' : 'back-' + hardware_color
    }
  }

  $scope.submitAuthRequest = function(request) {
    if (request === 'logout') return logout($scope.user)
    if ($scope.userInfoForm.$valid) {
      register($scope.user)
    } else {
      $scope.showUserErorrs = true
      focus('emailField')
    }
  }

  $scope.proceedToOrder = function() {
    $timeout(function() {
      createOrderForm.submit()
    }, 100)
  }

  register = function(input) {
     Auth.register(input.email, input.password)
      .then(function(user) {
        $scope.$parent.user = user
        $scope.proceedToOrder()
      })
  }

  login = function(input) {
    Auth.login(input.email, input.password)
      .then(function(user) {
        $scope.$parent.user = user
        $scope.proceedToOrder()
      })
  }

  logout = function () {
    Auth.logout()
      .then(function(data) {
        deleteCurrentUser()
        notifyUser.of('You were logged out')
      })
  }

  $scope.resetPassword = function() {
    if ($scope.userInfoForm.email.$valid) {
      Auth.reset($scope.user.email)
        .then(function(data) {
          notifyUser.of(data)
          $scope.reset = false
        })
    } else {
      $scope.showUserErorrs = true
    }
  }
}])
