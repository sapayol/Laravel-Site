(function() {
  'use strict';

  var sapayolApp = angular.module('sapayolApp', [])
  .run(['$timeout', function($timeout) {
    $timeout(function() {
      $(document).foundation();
    }, 500);
  }]);

})();

