(function() {
  'use strict';

  var sapayolApp = angular.module('sapayolApp', [
    'controllers',
    'duScroll',
    'angularPayments',
    'angular-loading-bar',
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

  // Smooth scrolling on anchor tags
  $(function() {
    $('a[href*=#]:not([href=#])').click(function() {
      if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
        var target = $(this.hash);
        target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
        if (target.length) {
          $('html,body').animate({
            scrollTop: target.offset().top
          }, 1000);
          return false;
        }
      }
    });
  });


})();

