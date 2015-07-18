<?php $action = Request::route()->getAction()['as'] ?>

@include('00-atoms.meta._head')

@include('01-molecules.navigation.primary-nav')

@if ($action == 'pages.home')
	<div class="page-wrap on-home-page" ng-class="{descended: displayMenu}">
@else
	<div class="page-wrap" ng-class="{descended: displayMenu}">
@endif
	<header class="row">
	  <h1 class="page-title">
			<?php $action = Request::route()->getAction()['as'] ?>
		  @if ($action == 'pages.who-we-are')
				Who We Are
			@elseif ($action == 'pages.how-it-works')
				How It Works
			@elseif ($action == 'jackets.show')
			  Tailored Jackets
			@elseif ($action == 'jackets.look')
				@yield('title')
		  @endif
	  </h1>
	</header>

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
