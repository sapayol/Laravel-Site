<article class="large-12 medium-12 small-12 columns">
	<h3>@yield('title')</h3>
	<br>
	@if ($step != 'height')
		<div class="player">
	    <video poster="/images/video-posters/measurements/{{{ $step }}}.png" controls crossorigin>
        <source src="/videos/measurements/{{{ $step }}}.webm" type="video/webm">
        <source src="/videos/measurements/{{{ $step }}}.mp4"  type="video/mp4">
        <a href="/videos/{{{ $step }}}.mp4">Download</a>
	    </video>
		</div>
		<h2>@yield('title')</h2>
		<div class="measurement-instructions">
			@yield('instructions')
		</div>
	@endif
	@yield('additional_copy')
</article>