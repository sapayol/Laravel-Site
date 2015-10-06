var homeController = angular.module('homeController', []);

homeController.controller('homeCtrl', ['$scope', function($scope) {

  /** Full screen hero video code **/
  /********************************************************************/

  // $( document ).ready(function() {

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

  // });

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



}]);
