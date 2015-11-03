var videoController = angular.module('videoController', []);

videoController.controller('VideoCtrl', ['$rootScope', '$document', 'Session', '$scope', '$timeout', 'notifyUser', function($rootScope, $document, Session, $scope, $timeout, notifyUser) {
    plyr.setup({
      controls: ["play", "fullscreen"]
    });

    var media = document.querySelectorAll(".player")[0].plyr.media;
    var playerControls = $(".player-controls");
    media.addEventListener("playing", function() {
      playerControls.addClass('descended');
    });
}]);


