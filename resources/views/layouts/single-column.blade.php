@include('partials.global._head')
@include('partials.global.primary-nav')
@include('partials.global.header')
@include('partials.global.messages')

	@yield('full-width-hero')

<main class="row">
	<div class="small-12 medium-10 large-7 medium-centered columns">
		@yield('main')
	</div>
</main>

@include('partials.global.footer')
@include('partials.global._foot')
