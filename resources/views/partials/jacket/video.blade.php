<section class="small-12 medium-12 large-12 columns">
	<div class="player">
	  <video poster="/images/video-posters/jackets/{{{ $jacket->model }}}.jpg" controls crossorigin preload="none">
	    <source src="/videos/jackets/{{{ $jacket->model }}}.webm" type="video/webm">
	    <source src="/videos/jackets/{{{ $jacket->model }}}.mp4"  type="video/mp4">
	    <a href="/videos/jackets/{{{ $jacket->model }}}.mp4">Download</a>
	  </video>
	</div>
</section>