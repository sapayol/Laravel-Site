
<form action="/orders/{{{ $order->id}}}/fit" method="POST" name="finalForm" class="hidden">
	<input type="hidden" name="_token" value="{!! csrf_token() !!}">
	<input type="hidden" name="measurements[{{{ $step }}}]" value="@{{ measurement }}">
</form>
<form ng-submit="submitMeasurement('measurements[{{{ $step }}}]')" name="measurementForm" class="measurement-form">
	@yield('additional_copy')
	<div class="alert alert-box animated fadeIn" ng-if="showFormErorrs">
	Enter measurements as a decimal.<br>
	<small>&nbsp;&nbsp; For example: 39.3 (not 39 &frac14; or 39,3)</small> <br>
	Don’t enter any letters or symbols.
	</div>
	@if ($step == 'height' && $order->bodyMeasurements->units == 'in')
		<fieldset class="label-row">
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
			<span class="left label-title">@yield('title')</span>
			<span class="right alert animated shake" ng-if="showFormErorrs && measurement !== ''">Invalid measurement</span>
			<span class="right alert animated shake" ng-if="displayRequiredError">Measurement required</span>
			<input name="measurements[{{{ $step }}}]" id="{{{ $step }}}" type="number" placeholder="00.00" ng-maxlength="7" {{{ $step=='height' ? 'max="10"' : '' }}} step="0.01" ng-model="measurement" required ng-change="change(measurement)" ng-value="{{{ $order->bodyMeasurements->$step }}}">
			<span class="input-units">{{{ $order->bodyMeasurements->units }}}</span>
		</label>
		<br>
		<div ng-if="measurementFraction.length > 0">
			We will round this to <strong>@{{ measurementFraction }}</strong> <small>{{{ $order->bodyMeasurements->units }}}</small>
		</div>
	@endif
	<div class="text-center">
		<button type="button" ng-click="submitMeasurement('measurements[{{{ $step }}}]')" class="black small button expand">Submit Measurement <span class="chevron chevron--right"></span></button>
		<br class="hide-for-small-only">
		@if ($order->status == 'started')
			<a href="/orders/{{{ $order->id }}}/checkout" class="under-button-link underlined">Order Now, Measure Later</a>
		@endif
	</div>
</form>