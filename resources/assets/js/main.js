(function() {
  'use strict';

  var sapayolApp = angular.module('sapayolApp', [
    'controllers',
  ])
  .run(['$timeout', function($timeout) {
    $timeout(function() {
			$(document).ready(function(){
			  $('.home-carousel').slick({
			  	dots: true,
			  	mobileFirst: true,
			  });
			});
      // $(document).foundation();
    }, 500);
  }])
  .directive('scrollToTop', function() {
    return {
      restrict: 'A',
      link: function(scope, $elm) {
        $elm.on('click', function() {
          $("body").animate({scrollTop: 0}, "slow");
        });
      }
    }
  });

})();

