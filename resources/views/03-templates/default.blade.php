<?php $action = Request::route()->getAction()['as'] ?>

@include('00-atoms.meta._head')

@include('01-molecules.navigation.primary-nav')

@include('02-organisms.global.header')

	@yield('full-width-hero')

	<main class="row">
		@yield('main')
	</main>

	@yield('footer')

@include('00-atoms.meta._foot')
