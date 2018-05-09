@extends('layouts/home')

@section('page_wrap_class')
	headless-page
@stop

@section('title')
Leather Jackets
@stop

@section('description')
SAPAYOL offers made-to-measure, customizable leather jackets, tailored by master craftsmen from the finest full-grain, vegetable tanned leather.
@stop

@section('full-width-hero')
	<div class="hero-video-container row">
		<div class="filter">
			<div class="player" ng-controller="videoCtrl">
			  <video poster="/images/video-posters/jackets/black/{{ $randomModel }}_poster_1.jpg" controls crossorigin>
			    <source src="/videos/jackets/black/{{ $randomModel }}.mp4"  type="video/mp4">
			    <a href="/videos/jackets/black/{{ $randomModel }}.mp4">Download</a>
			  </video>
				@include('partials.global.play-button')
			  </div>
			</div>
			<div class="title-container large-8 medium-10 medium-centered columns">
				<h2 class="hero-text">
					<span class="line1 thin">Leather jackets, tailored by master craftsmen to your measurements. <br>Made from the most exclusive full-grain, aniline dyed, vegetable tanned lamb leather.</span>
				</h2>
			</div>
		</div>
	</div>
	@include('partials.jackets.gallery')
	<br><br>
@stop

@section('main')
@stop