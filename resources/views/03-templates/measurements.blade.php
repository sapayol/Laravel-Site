<?php $action = Request::route()->getAction()['as'] ?>

@include('00-atoms.meta._head')

@include('01-molecules.navigation.primary-nav')

	@include('02-organisms.global.header')
	<main class="row" ng-controller="measurementCtrl" ng-init="init({{{ $order->userMeasurements->$step }}})">
		<article class="measurement-entry large-12 medium-12 small-12 columns">
			<h3>@yield('title')</h3>
			<br>
			@if ($step != 'height')
				<div class="player">
			    <video poster="/images/video-posters/measurements/{{{ $step }}}.png" controls crossorigin>
		        <source src="/videos/measurements/{{{ $step }}}.webm" type="video/webm">
		        <source src="/videos/measurements/{{{ $step }}}.mp4"  type="video/mp4">
		        <a href="/videos/{{{ $step }}}.mp4">Download</a>
			    </video>
				  <button type="button" class="text-button"  ng-click="instructions = !instructions">
			    	Click to <span ng-show="!instructions">read</span><span ng-show="instructions">hide</span> Instructions
			    </button>
				</div>
				<div ng-show="instructions" class="measurement-instructions animated slideInDown">
					@yield('instructions')
				</div>
			@endif

			@yield('additional_copy')

			@if ($step == 'height' && $order->userMeasurements->units == 'in')
				<form action="/orders/{{{ $order->id}}}/fit"  method="POST" name="measurementForm">
					<fieldset>
						<legend>Height</legend>
						<p>How tall are you?</p>
						<label for="height-feet" class="text-input-label">
							<span class="label-title">Feet</span>
							<input name="measurements[height][ft]" id="height-feet" type="number" placeholder="00" maxlength="2" min="4" max="8" required>
						</label>
						<label for="height-feet" class="text-input-label">
							<span class="label-title">Inches</span>
							<input name="measurements[height][ft]" id="height-feet" type="number" placeholder="00" maxlength="2" min="0" max="11" required>
						</label>
					</fieldset>
					<button type="submit" class="black button expand">Submit Measurement <span class="chevron chevron--right"></span></button>
				</form>
			@else
				<form action="/orders/{{{ $order->id}}}/fit" method="POST" name="finalForm">
					<input type="hidden" name="_token" value="{!! csrf_token() !!}">
					<input type="hidden" name="measurements[{{{ $step }}}]" value="@{{ measurement }}">
				</form>
				<form ng-submit="submitMeasurement('measurements[{{{ $step }}}]')" name="measurementForm">
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
					<button type="button" ng-click="submitMeasurement('measurements[{{{ $step }}}]')" class="black button expand">Submit Measurement <span class="chevron chevron--right"></span></button>
				</form>
			@endif


		</article>


		<section class="large-12 medium-12 small-12 columns inverted-colors">
			@include('02-organisms.jacket.measurement-tracker')
		</section>
	</main>




@include('00-atoms.meta._foot')
