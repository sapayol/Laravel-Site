
<div class="large-12 medium-12 small-12 columns">
	<a class="video-caption underlined" ng-show="!measurementsVisible" ng-click="measurementsVisible = !measurementsVisible">Measurements Seen In the Video </a>
</div>

<section ng-show="measurementsVisible">
	@yield('measurement_data')
	@foreach ($video_measurements as $column)
		<ul ng-if="metricUnits" class="no-bullet value-list tight-list large-6 medium-6 small-6 columns">
			@foreach ($column as $key => $value)
				<li><small class="list-key">{{{ ucwords(str_replace('_', ' ', $key)) }}}</small> {{{ $value }}} <small>cm</small></li>
			@endforeach
		</ul>
	@endforeach
	@foreach ($video_measurements as $column)
		<ul ng-if="!metricUnits" class="no-bullet value-list tight-list large-6 medium-6 small-6 columns">
			@foreach ($column as $key => $value)
				<li><small class="list-key">{{{ ucwords(str_replace('_', ' ', $key)) }}}</small> {{{ round($value  / 2.54, 1) }}} <small>in</small></li>
			@endforeach
		</ul>
	@endforeach
	<div class="small-12 medium-12 large-12 columns">
		<p>Model wears a size {{{ $model_size }}} with the following adjustments:</p>
		<ul ng-if="metricUnits" class="no-bullet value-list tight-list left">
			@foreach ($video_adjustments as $key => $value)
				<li><small class="list-key">{{{ ucwords(str_replace('_', ' ', $key)) }}}</small> {{{ $value }}} <small>cm</small></li>
			@endforeach
		</ul>
		<ul ng-if="!metricUnits" class="no-bullet value-list tight-list left">
			@foreach ($video_adjustments as $key => $value)
				<li><small class="list-key">{{{ ucwords(str_replace('_', ' ', $key)) }}}</small> {{{ round($value / 2.54, 1) }}} <small>in</small></li>
			@endforeach
		</ul>
		<button ng-click="metricUnits = !metricUnits" class="right button tiny radius">cm / in</button>
		<a ng-show="measurementsVisible" class="right" ng-click="measurementsVisible = !measurementsVisible">Hide measurements</a>
	</div>
</section>