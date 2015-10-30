@include('partials.global._head')
@include('partials.global.primary-nav')
@include('partials.global.header')

<main class="row">
	@yield('order_summary')
	@yield('main')
	@yield('order_details')
</main>

@include('partials.global.footer')
@include('partials.global._foot')
