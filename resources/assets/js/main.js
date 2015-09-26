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

        plyr.setup({
          controls: ["play", "fullscreen"]
        });
        $(document).foundation();
        FastClick.attach(document.body);
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

$(document).scroll(function(){
    if($(this).scrollTop()>=$('.stick-to-bottom').position().top){

    }
})

$(document).ready(function($){
  //Sticky
  console.log('offset: ' + $('.stick-to-bottom').offset().top);
  console.log('position: ' + $('.stick-to-bottom').position().top);
  var trigger = $('.stick-to-bottom').position().top - 128;
  console.log('position adjust: ' + trigger);
  console.log('window: ' + $(window).height());
  console.log('document: ' + $(document).height());

  var stickyButtonBottom = $('.stick-to-bottom').offset().top - 160;
  // var stickyButtonBottom = $('.stick-to-bottom').offset().top - $(window).height();
  var stickyNav = function(){
    var scrollTop = $(window).scrollTop();

    if (scrollTop >= trigger) {
        console.log(trigger);
        $('.stick-to-bottom').show();
        $('.stick-to-bottom').addClass('sticky');
    } else {
        console.log(scrollTop);
        $('.stick-to-bottom').hide();
        $('.stick-to-bottom').removeClass('sticky');
    }
  };

  stickyNav();

  $(window).scroll(function() {
      stickyNav();
  });
});


/** Full screen hero video code **/
/********************************************************************/

$( document ).ready(function() {

  // Resive video
  scaleVideoContainer();

  initBannerVideoSize('.hero-video-container .poster img');
  initBannerVideoSize('.hero-video-container .filter');
  initBannerVideoSize('.hero-video-container video');

  $(window).on('resize', function() {
    scaleVideoContainer();
    scaleBannerVideoSize('.hero-video-container .poster img');
    scaleBannerVideoSize('.hero-video-container .filter');
    scaleBannerVideoSize('.hero-video-container video');
  });

});

  /** Reusable Functions **/
  /********************************************************************/

  function scaleVideoContainer() {
    var height = $(window).height();
    var unitHeight = parseInt(height) + 'px';
    $('.hero-video-container').css('height',unitHeight);
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
      $('.hero-video-container video').addClass('fadeIn animated');
    });
  }

})();

