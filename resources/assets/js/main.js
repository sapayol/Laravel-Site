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
        appInit();
      });
    }, 500);
  }]);

  function appInit() {
    scaleImageContainer();

    //Initialize carousel
    $('.jacket-carousel').slick({
      dots: true,
      arrows: true,
      mobileFirst: true,
      focusOnSelect: false
    });
    // Initialize Foundation
    $(document).foundation();

    // Initialize FastClick
    if ('ontouchstart' in window) {
      FastClick.attach(document.body);
    }

    // Smooth scrolling on anchor tags
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

  };

  // Full screen hero image code
  function scaleImageContainer() {
    var height = $(window).height();
    var unitHeight = parseInt(height) + 'px';
    $('.hero-image-container').css('height',unitHeight);
  };

  String.prototype.capitalize = function() {
      return this.charAt(0).toUpperCase() + this.slice(1);
  }

  String.prototype.snakeToText = function() {
      return this.replace("_", " ").capitalize();
  }


})();