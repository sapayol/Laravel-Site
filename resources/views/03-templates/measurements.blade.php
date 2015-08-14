<?php $action = Request::route()->getAction()['as'] ?>

@include('00-atoms.meta._head')

@include('01-molecules.navigation.primary-nav')

	@if ($action == 'pages.home')
		<div class="page-wrap on-home-page" ng-class="{descended: displayMenu}">
	@elseif (strpos($action, 'jackets') !== false && $action != 'jackets.show')
		<div class="page-wrap on-jacket-page" ng-class="{descended: displayMenu}">
	@else
		<div class="page-wrap" ng-class="{descended: displayMenu}">
	@endif

	@include('02-organisms.global.header')

	<main class="row">
		<article class="measurement-entry large-12 medium-12 small-12 columns">
			<h3>@yield('title')</h3>
			<div class="player">
		    <video poster="/images/video-posters/@yield('slug').png" controls crossorigin>
	        <source src="/videos/@yield('slug').mp4" type="video/mp4">
	        <a href="/videos/@yield('slug').mp4">Download</a>
		    </video>
			</div>
			<div ng-show="instructions" class="measurement-instructions animated slideInDown">
				@yield('instructions')
			</div>
			<form action="/orders/{{{ $order->id}}}/fit/@yield('next_slug')" method="POST">
				<input type="hidden" name="_token" value="{!! csrf_token() !!}">
				<label for="@yield('slug')" class="text-input-label">
					<span class="label-title">@yield('title')</span>
					<input name="measurements[@yield('slug')]" id="@yield('slug')" type="tel" placeholder="00.00" ng-model="measurement" maxlength="5" mask="99.99" required>
					<span class="input-units">{{{ $order->measurement->units }}}</span>
				</label>
		    <button type="button" class="text-button"  ng-click="instructions = !instructions">
		    	<span ng-show="!instructions">Show</span> <span ng-show="instructions">Hide</span> Instructions
		    </button>
				<button type="submit" class="black button expand">Submit Measurement <span class="chevron chevron--right"></span></button>
			</form>
		</article>
	</main>

	@include('02-organisms.jacket.measurement-tracker')

@include('00-atoms.meta._foot')
