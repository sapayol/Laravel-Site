var jacketController = angular.module('jacketController', []);

jacketController.controller('jacketCtrl', ['$scope', function($scope) {

  // $(document).ready(function($){
  //   // var trigger = $('.stick-to-bottom').position().top - 128;
  //   if (!$('.stick-to-bottom')) {
  //     return
  //   }
  //   var trigger = $('.stick-to-bottom').position().top + 500;
  //   var stickyButtonBottom = $('.stick-to-bottom').offset().top - 160;
  //   var stickyNav = function(){
  //     var scrollTop = $(window).scrollTop();
  //     if (scrollTop >= trigger) {
  //         $('.stick-to-bottom').show();
  //         $('.stick-to-bottom').addClass('sticky');
  //     } else {
  //         $('.stick-to-bottom').hide();
  //         $('.stick-to-bottom').removeClass('sticky');
  //     }
  //   };

  //   stickyNav();

  //   $(window).scroll(function() {
  //       stickyNav();
  //   });
  // });

}]);
