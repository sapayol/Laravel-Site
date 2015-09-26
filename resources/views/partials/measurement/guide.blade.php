<?php $min = config('measurements.' . $step . '.min.' . $order->userMeasurements->units); ?>
<?php $max = config('measurements.' . $step . '.max.' . $order->userMeasurements->units); ?>

<article>
	<h3>@yield('title')</h3>
	<br>
	<div class="player">
    <video poster="/images/video-posters/measurements/{{{ $step }}}.png" controls crossorigin preload="none">
      <source src="/videos/measurements/{{{ $step }}}.webm" type="video/webm">
      <source src="/videos/measurements/{{{ $step }}}.mp4"  type="video/mp4">
      <a href="/videos/{{{ $step }}}.mp4">Download</a>
    </video>
	</div>
	<h2>@yield('title')</h2>
	<div class="measurement-instructions">
		@yield('instructions')
		<em>Usually between <strong>{{{ $min }}}</strong>  and <strong>{{{ $max }}}</strong> <small>{{{ $order->userMeasurements->units }}}</small></em>
	</div>
</article>