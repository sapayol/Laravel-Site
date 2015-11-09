@include('partials.global._head')
@include('partials.global.primary-nav')

<header class="row">
	<h1>@yield('header')</h1>
</header>

@include('partials.global.messages')

<main class="row">
	@yield('order_summary')
	@yield('main')
	@yield('order_details')
</main>

@include('partials.global.footer')
@include('partials.global._foot')
