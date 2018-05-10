<div class="large-10 medium-11 medium-centered small-12 columns jacket-video">
	<div class="player" ng-controller="videoCtrl" ng-init="init()">
	  <video
      ng-src="@{{ getVideoUrl( video_leather_color, '{{{ $jacket->model }}}' ) }}"
      poster="/images/video-posters/jackets/@{{ video_leather_color }}/{{{ $jacket->model }}}_poster_1.jpg"
      controls
      crossorigin
      preload="none"
    >
	    <a href="/videos/jackets/{{{ $jacket->model }}}.mp4">Download</a>
	  </video>
    @include('partials.global.play-button')
	</div>
</div>
