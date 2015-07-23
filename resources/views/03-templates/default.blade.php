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
		@yield('main')
	</main>

	<footer class="text-center">
		<a ng-click="scrollToTop()" class="back-to-top-link" scroll-to-top>
			<p class="chevron chevron--top"></p>
			Back to Top
		</a>
	</footer>
</div>

@include('00-atoms.meta._foot')
