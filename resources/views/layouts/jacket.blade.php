@include('partials.global._head')
@include('partials.global.primary-nav')

<header class='row'>
	<h1 class='with-breadcrumbs'>
		<a href='/jackets' class='underlined'>Our Jackets</a>
		<span class='chevron chevron--right breadcrumb-chevron'></span>
		{{{ $jacket->name }}}
	</h1>
</header>

@include('partials.global.messages')

<main class='row' ng-controller='jacketCtrl'>
	@include('partials.jacket.image-carousel')
	@include('partials.jacket.summary')
	@include('partials.jacket.video')
	@include('partials.jacket.video-measurements')
	<div class="small-12 medium-11 large-10 columns medium-centered">
		@yield('main')
	</div>
	<div class="clearfix"></div>
	@include('partials.jacket.look')
</main>

@include('partials.global.footer')
@include('partials.global._foot')
