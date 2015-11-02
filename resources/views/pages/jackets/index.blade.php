@extends('layouts/default')

@section('title')
	Jackets
@stop

@section('header')
	<h1>Our Jackets</h1>
@stop

@section('main')
	<article class="large-12 medium-12 small-12 columns">
		<p class="medium-text-center">Choose the model you would like to customize and have tailor&ndash;made.</p>
		<ul class="small-block-grid-1 medium-block-grid-2 large-block-grid-4">
			@foreach ($jackets as $jacket)
			  <li class="text-center">
					@if ($jacket->active)
						<a href="/jackets/{{{ $jacket->model }}}">
							<img class="responsive-image" src="/images/photos/jackets/{{{ $jacket->model }}}/thumbnail.jpg">
						</a>
						<h2>
							<a class="underlined" href="/jackets/{{{ $jacket->model }}}">
								{{{ $jacket->name }}}
							</a>
						</h2>
					@else
						<div class="jacket-placeholder-container">
							<img class="jacket-placeholder" src="/images/photos/jackets/{{{ $jacket->model }}}/{{{ $jacket->model }}}.svg">
							<h2>{{{ $jacket->name }}}</h2>
							<h3><em>Coming Soon</em></h3>
							<br>
						</div>
					@endif
			  </li>
			@endforeach
		</ul>
	<hr>
	</article>
	<div class="clearfix"></div>
	<section  ng-hide="notifyForm" class="text-center">
		<a class="underlined" href="" ng-click="notifyForm = true">Notify me when new models arrive</a>
		<br>
		<br>
	</section>
	<section ng-show="notifyForm" class="large-4 medium-6 small-12 medium-centered columns animated fadeIn">
		@include('partials.jackets.mailchimp-jacket-form')
	</section>
@stop
