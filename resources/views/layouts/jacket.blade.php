@include('partials.global._head')
@include('partials.global.primary-nav')

<header class="row">
	<h1 class="with-breadcrumbs">
		<a href="/jackets" class="underlined">Our Jackets</a>
		<span class="chevron chevron--right breadcrumb-chevron"></span>
		{{{ $jacket->name }}}
	</h1>
</header>

@include('partials.global.messages')

<main class="row" ng-controller="jacketCtrl">
	<div class="large-10 medium-10 medium-centered small-12 columns">
		@include('partials.jacket.image-carousel')
		@include('partials.jacket.summary')
		@include('partials.jacket.video')
		@include('partials.jacket.video-measurements')
		@yield('main')
		@include('partials.jacket.cta')
	</div>
</main>

@include('partials.global.footer')
@include('partials.global._foot')
