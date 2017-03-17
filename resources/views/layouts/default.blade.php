@include('partials.global._head')
@include('partials.global.primary-nav')

<header class="row">
	<h1>@yield('header')</h1>
</header>

@include('partials.global.messages')

	@yield('full-width-hero')

<div class="row">
  <main class="large-12 medium-12 small-12 columns">
	 @yield('main')
  </main>
</div>

@include('partials.global.footer')
@include('partials.global._foot')
