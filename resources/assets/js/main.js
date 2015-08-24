(function() {
  'use strict';

  var sapayolApp = angular.module('sapayolApp', [
    'controllers',
    'services',
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
			  $('.home-carousel').slick({
          dots: true,
			  	arrows: false,
			  	mobileFirst: true,
			  });
			});
      $(document).foundation();
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

  plyr.setup({
    controls: ["play", "fullscreen"]
  });


/** Full screen hero video code **/
/********************************************************************/

$( document ).ready(function() {

  // Resive video
  scaleVideoContainer();

  initBannerVideoSize('.video-container .poster img');
  initBannerVideoSize('.video-container .filter');
  initBannerVideoSize('.video-container video');

  $(window).on('resize', function() {
    scaleVideoContainer();
    scaleBannerVideoSize('.video-container .poster img');
    scaleBannerVideoSize('.video-container .filter');
    scaleBannerVideoSize('.video-container video');
  });

});

  /** Reusable Functions **/
  /********************************************************************/

  function scaleVideoContainer() {
    var height = $(window).height();
    var unitHeight = parseInt(height) + 'px';
    $('.homepage-hero-module').css('height',unitHeight);
  }

  function initBannerVideoSize(element){
    $(element).each(function(){
      $(this).data('height', $(this).height());
      $(this).data('width', $(this).width());
    });

    scaleBannerVideoSize(element);
  }

  function scaleBannerVideoSize(element){
    var windowWidth = $(window).width(),
        windowHeight = $(window).height(),
        videoWidth,
        videoHeight;

    $(element).each(function(){
      var videoAspectRatio = $(this).data('height')/$(this).data('width'),
      windowAspectRatio = windowHeight/windowWidth;
      if (videoAspectRatio > windowAspectRatio) {
        videoWidth = windowWidth;
        videoHeight = videoWidth * videoAspectRatio;
        $(this).css({'top' : -(videoHeight - windowHeight) / 2 + 'px', 'margin-left' : 0});
      } else {
        videoHeight = windowHeight;
        videoWidth = videoHeight / videoAspectRatio;
        $(this).css({'margin-top' : 0, 'margin-left' : -(videoWidth - windowWidth) / 2 + 'px'});
      }
      $(this).width(videoWidth).height(videoHeight);
      $('.homepage-hero-module .video-container video').addClass('fadeIn animated');
    });
  }

})();

