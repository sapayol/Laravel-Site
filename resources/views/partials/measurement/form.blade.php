<form action="/orders/{{{ $order->id}}}/fit" method="POST" name="finalForm" class="hidden">
	<input type="hidden" name="_token" value="{!! csrf_token() !!}">
	<input type="hidden" name="measurements[{{{ $step }}}]" value="@{{ measurement }}">
</form>
<form ng-submit="submitMeasurement('measurements[{{{ $step }}}]')" name="measurementForm" class="measurement-form">
	@yield('additional_copy')
	@if ($step == 'height' && $order->bodyMeasurements->units == 'in')
		<fieldset>
			<legend>Height</legend>
			<label for="height-feet" class="text-input-label">
				<span class="label-title">Feet</span>
				<input name="measurements[height][feet]" id="height-feet" type="tel" placeholder="00" maxlength="2" min="4" max="8" required ng-model="feet">
			</label>
			<label for="height-inches" class="text-input-label">
				<span class="label-title">Inches</span>
				<input name="measurements[height][inches]" id="height-inches" type="tel" placeholder="00" maxlength="2" min="0" max="11" required ng-model="inches">
			</label>
		</fieldset>
	@else
		<br>
		<label for="{{{ $step }}}" class="text-input-label">
			<span class="label-title">@yield('title')</span>
			<input name="measurements[{{{ $step }}}]" id="{{{ $step }}}" type="number" placeholder="00.00" ng-maxlength="7" {{{ $step=='height' ? 'max="10"' : '' }}} step="0.01" ng-model="measurement" required ng-change="change(measurement)" ng-value="{{{ $order->bodyMeasurements->$step }}}">
			<span class="input-units">{{{ $order->bodyMeasurements->units }}}</span>
		</label>
		<br><br>
		<div ng-if="measurementFraction.length > 0">
			We will round this to <strong>@{{ measurementFraction }}</strong> <small>{{{ $order->bodyMeasurements->units }}}</small>
		</div>
	@endif
	<div class="text-center">
		<button type="button" ng-click="submitMeasurement('measurements[{{{ $step }}}]')" class="black button expand-on-small">Submit Measurement <span class="chevron chevron--right"></span></button>
		<br class="hide-for-small-only">
		@if ($order->status == 'started')
			<a href="/orders/{{{ $order->id }}}/checkout" class="under-button-link underlined">Order Now, Measure Later</a>
		@endif
	</div>
</form>