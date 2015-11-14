<div  class="large-10 medium-10 medium-centered small-12 columns">
	<br class="show-for-small">
	<a class="video-caption underlined animated slideInDown" ng-show="!measurementsVisible" ng-click="measurementsVisible = !measurementsVisible">Measurements in the images &amp; video </a>
</div>
<section ng-show="measurementsVisible" class="animated slideInDown large-10 medium-10 medium-centered small-12 columns">
	@yield('measurement_data')
	<div class="row collapse">
		<ul ng-if="metricUnits" class="no-bullet value-list tight-list large-6 medium-6 small-6 columns">
			<li><strong><small>Model Measurements</small></strong></li>
			@foreach ($body_measurements as $key => $value)
				<li><small class="list-key">{{{ ucwords(str_replace('_', ' ', $key)) }}}</small> {{{ $value }}} <small>cm</small></li>
			@endforeach
		</ul>
		<ul ng-if="metricUnits" class="no-bullet value-list tight-list large-6 medium-6 small-6 columns">
			<li><strong><small>Jacket Measurements</small></strong></li>
			@foreach ($jacket_measurements as $key => $value)
				<li><small class="list-key">{{{ ucwords(str_replace('_', ' ', $key)) }}}</small> {{{ $value !== '' ? $value : '--' }}} <small>{{{ $value !== '' ? 'cm' : '' }}}</small></li>
				@endforeach
		</ul>

		<ul ng-if="!metricUnits" class="no-bullet value-list tight-list large-6 medium-6 small-6 columns">
			<li><strong><small>Model Measurements</small></strong></li>
			@foreach ($body_measurements as $key => $value)
				<li>
					<small class="list-key">{{{ ucwords(str_replace('_', ' ', $key)) }}}</small>
					<span decimal-to-fraction="{{{ $value / 2.54 }}}">{{{ $value / 2.54 }}}</span> "
				</li>
			@endforeach
		</ul>
		<ul ng-if="!metricUnits" class="no-bullet value-list tight-list large-6 medium-6 small-6 columns">
			<li><strong><small>Jacket Measurements</small></strong></li>
			@foreach ($jacket_measurements as $key => $value)
				<li>
					<small class="list-key">{{{ ucwords(str_replace('_', ' ', $key)) }}}</small>
					@if ($value == '')
						--
					@else
						<span decimal-to-fraction="{{{ $value / 2.54}}}">{{{ $value / 2.54}}}</span>
					@endif
					{{{ $value !== '' ? '"' : '' }}}
				</li>
				@endforeach
		</ul>
		<button ng-click="metricUnits = !metricUnits" class="right button tiny">cm / in</button>
		<a ng-show="measurementsVisible" class="left underlined" ng-click="measurementsVisible = !measurementsVisible">Hide measurements</a>
	</div>
</section>