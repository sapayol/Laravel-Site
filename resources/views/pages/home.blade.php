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
	<div class="hero-video-container">
		<div class="filter">
			<div class="player" ng-controller="videoCtrl">
			  <video poster="/images/video-posters/jackets/{{ $randomModel }}.jpg" controls crossorigin>
			    <source src="/videos/jackets/{{ $randomModel }}.webm" type="video/webm">
			    <source src="/videos/jackets/{{ $randomModel }}.mp4"  type="video/mp4">
			    <a href="/videos/jackets/{{ $randomModel }}.mp4">Download</a>
			  </video>
			</div>
			<div class="title-container">
				<h2 class="hero-text">
					<span class="line1 thin">Leather jackets, tailored by master craftsmen to your measurements. Made from the most exclusive full‐grain, aniline dyed, vegetable tanned leather.</span>
				</h2>
			</div>
		</div>
	</div>
@stop

@section('main')
	@include('partials.jackets.gallery')
@stop