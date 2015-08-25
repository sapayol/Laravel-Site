<?php $action = Request::route()->getAction()['as'] ?>

@include('00-atoms.meta._head')

@include('01-molecules.navigation.primary-nav')

	@include('02-organisms.global.header')
	<main class="row" ng-controller="measurementCtrl" ng-init="init({{{ $order->userMeasurements->$step }}})">
		<article class="measurement-entry large-12 medium-12 small-12 columns">
			<h3>@yield('title')</h3>
			<div class="player">
		    <video poster="/images/video-posters/measurements/{{{ $step }}}.png" controls crossorigin>
	        <source src="/videos/measurements/{{{ $step }}}.webm" type="video/webm">
	        <source src="/videos/measurements/{{{ $step }}}.mp4"  type="video/mp4">
	        <a href="/videos/{{{ $step }}}.mp4">Download</a>
		    </video>
			  <button type="button" class="text-button"  ng-click="instructions = !instructions">
		    	<span ng-show="!instructions">Show</span> <span ng-show="instructions">Hide</span> Instructions
		    </button>
			</div>
			<div ng-show="instructions" class="measurement-instructions animated slideInDown">
				@yield('instructions')
			</div>
			<form action="/orders/{{{ $order->id}}}/fit" method="POST" name="finalForm">
				<input type="hidden" name="_token" value="{!! csrf_token() !!}">
				<input type="hidden" name="measurements[{{{ $step }}}]" value="@{{ measurement }}">
			</form>
			<form ng-submit="submitMeasurement('measurements[{{{ $step }}}]')" name="measurementForm">
				<span>Your measurement </span>
				<label for="{{{ $step }}}" class="text-input-label">
					<span class="label-title">@yield('title')</span>
					<?php $min = config('measurements.' . $step . '.min.' . $order->userMeasurements->units); ?>
					<?php $max = config('measurements.' . $step . '.max.' . $order->userMeasurements->units); ?>
					<input name="measurements[{{{ $step }}}]" id="{{{ $step }}}" type="number" min="{{{ $min }}}" max="{{{ $max }}}" placeholder="00.00" ng-maxlength="7" step="0.01" ng-model="measurement" required ng-change="change(measurement)" ng-value="{{{ $order->userMeasurements->$step }}}">
					<span class="input-units">{{{ $order->userMeasurements->units }}}</span>
				</label>
				<br>
				<span ng-if="measurementFraction.length > 0">We will round this to @{{ measurementFraction }} <small>{{{ $order->userMeasurements->units }}}</small> </span>
				<br><br>
				<div class="alert-box alert" data-alert ng-if="displayMinMaxError">
					Measurements are usually between {{{ $min }}}  and {{{ $max }}} {{{ $order->userMeasurements->units }}}
				  <a href="#" class="close">&times;</a>
				</div>
				<button type="button" ng-click="submitMeasurement('measurements[{{{ $step }}}]')" class="black button expand">Submit Measurement <span class="chevron chevron--right"></span></button>
			</form>
		</article>
	</main>

	@include('02-organisms.jacket.measurement-tracker')
	@include('02-organisms.jacket.measurement-tracker2')
	@include('02-organisms.jacket.measurement-tracker3')
	@include('02-organisms.jacket.measurement-tracker4')
	@include('02-organisms.jacket.measurement-tracker5')
	@include('02-organisms.jacket.measurement-tracker6')

@include('00-atoms.meta._foot')
