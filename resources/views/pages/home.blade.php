@extends('layouts/home')

@section('page_wrap_class')
	headless-page
@stop

@section('title')
Leather Jackets
@stop

@section('description')
SAPAYOL offers made-to-measure, customizable leather jackets, tailored by master craftsmen from the finest vegetable tanned leather.
@stop

@section('full-width-hero')
	<div class="hero-video-container row">
		<div class="filter">
			<div class="player" ng-controller="videoCtrl">
			  <video poster="/images/video-posters/jackets/{{ $randomModel }} poster 1.jpg" controls crossorigin>
			    <source src="/videos/jackets/{{ $randomModel }}.webm" type="video/webm">
			    <source src="/videos/jackets/{{ $randomModel }}.mp4"  type="video/mp4">
			    <a href="/videos/jackets/{{ $randomModel }}.mp4">Download</a>
			  </video>
				@include('partials.global.play-button')
			  </div>
			</div>
			<div class="title-container large-8 medium-10 medium-centered columns">
				<h2 class="hero-text">
					<span class="line1 thin">Leather jackets, tailored by master craftsmen to your measurements. <br>Made from the most exclusive full‐grain, aniline dyed, vegetable tanned leather.</span>
				</h2>
			</div>
		</div>
	</div>
@stop

@section('main')
	@include('partials.jackets.gallery')
@stop