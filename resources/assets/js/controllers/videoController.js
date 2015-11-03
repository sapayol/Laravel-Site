var videoController = angular.module('videoController', []);

videoController.controller('videoCtrl', ['$scope', function($scope) {
		$(document).ready(function(){
	  	plyr.setup({
    		controls: ["play", "fullscreen"]
		  });
	    var media = document.querySelectorAll(".player")[0].plyr.media;
	    var playerControls = $(".player-controls");
	    media.addEventListener("playing", function() {
	      playerControls.addClass('descended');
	    });
	  });
}]);


