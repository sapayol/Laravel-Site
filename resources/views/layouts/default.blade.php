@include('partials.global._head')
@include('partials.global.primary-nav')

<header class="row">
	<h1>@yield('header')</h1>
</header>

@include('partials.global.messages')

	@yield('full-width-hero')

<main class="large-12 medium-12 small-12 columns">
	@yield('main')
</main>

@include('partials.global.footer')
@include('partials.global._foot')
