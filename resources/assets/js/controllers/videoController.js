var videoController = angular.module('videoController', []);

videoController.controller('videoCtrl', ['$scope', function($scope) {
	$(document).ready(function(){
  	plyr.setup({
  		controls: ["play", "fullscreen", "volume"]
    });
    var media = document.querySelectorAll(".player")[0].plyr.media;
    var player = $(".player");
    var playerControls = $(".player-controls");
    media.addEventListener("playing", function() {
      playerControls.addClass('descended');
    });
    media.addEventListener("loadstart", function() {
      console.log('video loading')
      player.addClass('loading');
    });
    media.addEventListener("canplay", function() {
      console.log('video done loading')
      player.removeClass('loading');
    });

    $scope.onPlayClick = function () {
      media.play()
    }

    // This script gets the svg icons that are the video player controls
    var a = new XMLHttpRequest(),
        b = document.body;
      a.open("GET", "https://cdn.plyr.io/1.3.3/sprite.svg", true);
      a.send();
      a.onload = function(){
        var c = document.createElement("div");
        c.style.display = "none";
        c.innerHTML = a.responseText;
        b.insertBefore(c, b.childNodes[0]);
      }

    getColorById = function (id) {
      return parseInt(id) === 1 ? 'black' : 'brown'
    }

    const catalog_jacket = sapayol.jacket

    if (catalog_jacket) {
      const session_jacket = sapayol.session[catalog_jacket.model]

      $scope.video_leather_color = getColorById(
        session_jacket ? session_jacket.leather_color : catalog_jacket.leather_color
      )

      $scope.$on('changePageColor', function (event, color_id) {
        $scope.video_leather_color = getColorById(color_id)
      });
    }

  });

}]);


