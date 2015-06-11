{!! view('00-atoms.meta._head') !!}

{!! view('01-molecules.navigation.primary-nav') !!}

<header class="row">
	@yield('header')
</header>

<main class="row">
	@yield('main')
</main>

<footer class="row">
	@yield('footer')
</footer>

{!! view('00-atoms.meta._foot') !!}
