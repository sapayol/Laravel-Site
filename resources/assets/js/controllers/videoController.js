var videoController = angular.module('videoController', []);

videoController.controller('videoCtrl', ['$scope', function($scope) {
	$(document).ready(function(){
  	plyr.setup({
  		controls: ["play", "fullscreen", "volume"]
	  });
    var media = document.querySelectorAll(".player")[0].plyr.media;
    var playerControls = $(".player-controls");
    media.addEventListener("playing", function() {
      playerControls.addClass('descended');
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
  });

}]);


