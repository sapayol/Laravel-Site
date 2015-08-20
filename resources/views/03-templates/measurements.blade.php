<?php $action = Request::route()->getAction()['as'] ?>

@include('00-atoms.meta._head')

@include('01-molecules.navigation.primary-nav')

	@include('02-organisms.global.header')
	<main class="row" ng-controller="measurementCtrl" ng-init="init({{{ $order->userMeasurements->$step }}})">
		<article class="measurement-entry large-12 medium-12 small-12 columns">
			<h3>@yield('title')</h3>
			<div class="player">
		    <video poster="/images/video-posters/measurements/{{{ $step }}}.png" controls crossorigin>
	        <source src="/videos/{{{ $step }}}.webm" type="video/webm">
	        <source src="/videos/{{{ $step }}}.mp4"  type="video/mp4">
	        <a href="/videos/{{{ $step }}}.mp4">Download</a>
		    </video>
			  <button type="button" class="text-button"  ng-click="instructions = !instructions">
		    	<span ng-show="!instructions">Show</span> <span ng-show="instructions">Hide</span> Instructions
		    </button>
			</div>
			<div ng-show="instructions" class="measurement-instructions animated slideInDown">
				@yield('instructions')
			</div>
			<form action="/orders/{{{ $order->id}}}/fit" method="POST">
				<input type="hidden" name="_token" value="{!! csrf_token() !!}">
				<label for="{{{ $step }}}" class="text-input-label" ng-class="{ wider : measurementFraction.length > 0 }">
					<span class="label-title">@yield('title')</span>
					<input name="measurements[{{{ $step }}}]" id="{{{ $step }}}" type="number" @yield('input_options') placeholder="00.00" ng-maxlength="7" step="0.01" ng-model="measurement" required ng-change="change(measurement)" ng-value="{{{ $order->userMeasurements->$step }}}">
					<span class="measurement-fraction" ng-if="measurementFraction.length > 0"><span>or</span> @{{ measurementFraction }}</span>
					<span class="input-units">{{{ $order->userMeasurements->units }}}</span>
				</label>
				<br><br>
				<button type="submit" class="black button expand">Submit Measurement <span class="chevron chevron--right"></span></button>
			</form>
		</article>
	</main>

	@include('02-organisms.jacket.measurement-tracker')

@include('00-atoms.meta._foot')
