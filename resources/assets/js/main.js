(function() {
  'use strict';

  var sapayolApp = angular.module('sapayolApp', [
    'controllers',
    'services',
    'directives',
    'factories',
    'duScroll',
    'cgNotify',
    'angularPayments',
    'angular-loading-bar',
    'ngMask'
  ])
  .run(['$timeout', function($timeout) {
    $timeout(function() {
			$(document).ready(function(){
			  $('.jacket-carousel').slick({
          dots: true,
			  	arrows: true,
			  	mobileFirst: true,
          focusOnSelect: false
			  });
        $(document).foundation();
        if ('ontouchstart' in window) {
          FastClick.attach(document.body);
        }
      });
    }, 500);
  }]);


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

  // Full screen hero image code
  $( document ).ready(function() {
    function scaleImageContainer() {
      var height = $(window).height();
      var unitHeight = parseInt(height) + 'px';
      $('.hero-image-container').css('height',unitHeight);
    };
    scaleImageContainer();
  });

  String.prototype.capitalize = function() {
      return this.charAt(0).toUpperCase() + this.slice(1);
  }

  String.prototype.snakeToText = function() {
      return this.replace("_", " ").capitalize();
  }


})();