@extends('layouts/default')

@section('page_wrap_class')
	headless-page
@stop

@section('title')
404 Page Not Found
@stop

@section('main')
	<section class="large-7 medium-10 small-12 medium-centered columns">
		<h1>404 Page not found.</h1>
		<p>Looks like something went wrong. Please make sure the URL in the address bar is correct.</p>
		<p>Did you discover a problem on our site? Please let us know so we can help you avoid it in the future.</p>
		<div class="text-center">
			<a class="underlined" href="mailto:contact@sapayol.com" title="">Contact Us</a>
			<br><br>
			<p>or</p>
			<a href="/home" class="button expand-on-small">Return to SAPAYOL.com</a>
		</div>
	</section>
@stop