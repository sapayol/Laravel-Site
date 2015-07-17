{!! view('00-atoms.meta._head') !!}

{!! view('01-molecules.navigation.primary-nav') !!}

<div class="page-wrap" ng-class="{descended: displayMenu}">
	<header class="row">
		@yield('header')
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


{!! view('00-atoms.meta._foot') !!}
