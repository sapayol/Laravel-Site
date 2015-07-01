(function() {
  'use strict';

  var sapayolApp = angular.module('sapayolApp', [])
  .run(['$timeout', function($timeout) {
    $timeout(function() {
			$(document).ready(function(){
			  $('.home-carousel').slick({
			  	dots: true,
			  	mobileFirst: true,
			  });
			});
      $(document).foundation();
    }, 500);


  }]);

})();

