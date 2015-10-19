<section ng-show="measurementsVisible" class="animated slideInDown">
	@yield('measurement_data')
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
					<span decimal-to-fraction="{{{ $value * .393 }}}">{{{ $value * .393 }}}</span> "
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
						<span decimal-to-fraction="{{{ $value * .393}}}">{{{ $value * .393}}}</span>
					@endif
					{{{ $value !== '' ? '"' : '' }}}
				</li>
				@endforeach
		</ul>
	<div class="large-12 medium-12 small-12 columns">
		<button ng-click="metricUnits = !metricUnits" class="right button tiny">cm / in</button>
		<a ng-show="measurementsVisible" class="left underlined" ng-click="measurementsVisible = !measurementsVisible">Hide measurements</a>
	</div>
</section>