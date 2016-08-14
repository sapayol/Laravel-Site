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
			  <video poster="/images/video-posters/home_page.jpg" controls crossorigin>
			    <source src="/videos/home_page.webm" type="video/webm">
			    <source src="/videos/home_page.mp4"  type="video/mp4">
			    <a href="/videos/home_page.mp4">Download</a>
			  </video>
			</div>
			<div class="title-container">
				<h1 class="hero-text">
					<span class="line1 thin">Leather jackets, tailored by master craftsmen to your measurements. Made from the most exclusive full‐grain, aniline dyed, vegetable tanned leather.</span>
				</h1>
				<a href="/jackets" class="button call-to-action">See Our Collection</a>
			</div>
		</div>
	</div>
@stop

@section('main')
	@include('partials.jackets.gallery')
@stop