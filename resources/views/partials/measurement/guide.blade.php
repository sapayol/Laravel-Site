<div>
	<h3>@yield('title')</h3>
	<div class="player" ng-controller="videoCtrl">
    <video poster="/images/video-posters/measurements/{{{ $step }}}.jpg" controls crossorigin preload="none">
      <source src="/videos/measurements/{{{ $step }}}.mp4"  type="video/mp4">
      <a href="/videos/{{{ $step }}}.mp4">Download</a>
    </video>
    @include('partials.global.play-button')
	</div>
	<h2>@yield('title')</h2>
</div>