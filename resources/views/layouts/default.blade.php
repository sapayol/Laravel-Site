@include('partials.global._head')
@include('partials.global.primary-nav')
@include('partials.global.header')
@include('partials.global.messages')

	@yield('full-width-hero')

<main class="row">
	@yield('main')
</main>

@include('partials.global.footer')
@include('partials.global._foot')
