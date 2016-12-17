<div class="large-10 medium-10 medium-centered small-12 columns jacket-video">
	<div class="player" ng-controller="videoCtrl">
	  <video poster="/images/video-posters/jackets/{{{ $jacket->model }}}.jpg" controls crossorigin preload="none">
	    <source src="/videos/jackets/{{{ $jacket->model }}}.webm" type="video/webm">
	    <source src="/videos/jackets/{{{ $jacket->model }}}.mp4"  type="video/mp4">
	    <a href="/videos/jackets/{{{ $jacket->model }}}.mp4">Download</a>
	  </video>
    @include('partials.global.play-button')
	</div>
</div>
