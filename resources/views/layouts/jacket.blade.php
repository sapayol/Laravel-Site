@include('partials.global._head')
@include('partials.global.primary-nav')
@include('partials.global.header')

<main class="row">
	@include('partials.jacket.image-carousel')
	@include('partials.jacket.summary')
	@include('partials.jacket.video')
	@include('partials.jacket.video-measurements')
	@yield('main')
	@include('partials.jacket.cta')
</main>

@include('partials.global.footer')
@include('partials.global._foot')
