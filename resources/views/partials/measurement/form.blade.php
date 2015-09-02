<form action="/orders/{{{ $order->id}}}/fit" method="POST" name="finalForm" class="hidden">
	<input type="hidden" name="_token" value="{!! csrf_token() !!}">
	<input type="hidden" name="measurements[{{{ $step }}}]" value="@{{ measurement }}">
</form>
<form ng-submit="submitMeasurement('measurements[{{{ $step }}}]')" name="measurementForm" class="large-12 medium-12 small-12 columns">
	@if ($step == 'height' && $order->userMeasurements->units == 'in')
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
	<label for="{{{ $step }}}" class="text-input-label">
		<span class="label-title">@yield('title')</span>
		<?php $min = config('measurements.' . $step . '.min.' . $order->userMeasurements->units); ?>
		<?php $max = config('measurements.' . $step . '.max.' . $order->userMeasurements->units); ?>
		<input name="measurements[{{{ $step }}}]" id="{{{ $step }}}" type="number" min="{{{ $min }}}" max="{{{ $max }}}" placeholder="00.00" ng-maxlength="7" step="0.01" ng-model="measurement" required ng-change="change(measurement)" ng-value="{{{ $order->userMeasurements->$step }}}">
		<span class="input-units">{{{ $order->userMeasurements->units }}}</span>
	</label>
	<br><br>
	<div class="alert-box info" data-alert  ng-if="measurementFraction.length > 0">
		We will round this to <strong>@{{ measurementFraction }}</strong> <small>{{{ $order->userMeasurements->units }}}</small>
	</div>
	<div class="alert-box alert animated shake" data-alert ng-if="displayMinMaxError">
		{{{ ucwords(str_replace('_', ' ', $step)) }}} should be between <strong>{{{ $min }}}</strong>  and <strong>{{{ $max }}}</strong> <small>{{{ $order->userMeasurements->units }}}</small>
	</div>
	@endif
	<div class="text-center">
		<button type="button" ng-click="submitMeasurement('measurements[{{{ $step }}}]')" class="black button expand">Submit 	Measurement <span class="chevron chevron--right"></span></button>
		<a class="under-button-link underlined">Order Now, Measure Later</a>
	</div>
</form>