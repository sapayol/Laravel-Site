var globalDirectives = angular.module('globalDirectives', []);

globalDirectives.directive('setClassWhenAtTop', ['$window', function($window) {
  var $win = angular.element($window); // wrap window object as jQuery object
  return {
    restrict: 'A',
    link: function (scope, element, attrs) {
      var topClass = attrs.setClassWhenAtTop, // get CSS class from directive's attribute value
          offsetTop = element.offset().top; // get element's offset top relative to document
      $win.on('scroll', function (e) {
        element[($win.scrollTop() >= offsetTop) ? 'addClass' : 'removeClass'](topClass);
      });
    }
  };
}]);
