@extends('layouts/default')

@section("page_wrap_class")
	nav-item-page
@stop

@section('title')
Our Jackets
@stop

@section('description')
Our selection of premium leather jacket styles, including double rider, flight jacket (bomber), and moto (coffee racer).
@stop

@section('header')
	<a ng-click="displayMenu = false">Our Jackets</a>
@stop

@section('main')
	<article class="large-12 medium-12 small-12 columns">
		<p class="medium-text-center">Choose the style you would like to customize and have tailor-made.</p>
		<ul class="small-block-grid-1 medium-block-grid-2 large-block-grid-4">
			@foreach ($jackets as $jacket)
			  <li class="text-center">
					@if ($jacket->active)
						<a href="/jackets/{{{ $jacket->model }}}">
							<img src="/images/photos/jackets/{{{ $jacket->model }}}/thumbnail.jpg" alt="Jacket Placeholder Image">
						</a>
						<h2>
							<a class="underlined" href="/jackets/{{{ $jacket->model }}}">
								{{{ $jacket->name }}}
							</a>
						</h2>
					@else
						<div class="jacket-placeholder-container">
							<img class="jacket-placeholder" src="/images/photos/jackets/{{{ $jacket->model }}}/{{{ $jacket->model }}}.svg" alt="Jacket Placeholder Image">
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
	<?php  $show_form = strpos(request()->fullUrl(), 'jacket-updates') ?>

	@if (!$show_form)
		<section ng-hide="notifyForm" class="text-center" id="jacket-updates">
			<a class="underlined" href="" ng-click="notifyForm = true">Get notified when new jacket styles arrive</a><br><br>
		</section>
	@endif
	@if ($show_form)
		<section class="large-4 medium-7 small-12 medium-centered columns animated fadeIn">
	@else
		<section ng-show="notifyForm" class="large-4 medium-7 small-12 medium-centered columns animated fadeIn">
	@endif
		@include('partials.jackets.mailchimp-jacket-form')
	</section>
@stop
