@extends("layouts/default")

@section("title")
Our Leather &amp; Materials
@stop

@section("description")
{{-- NEED UPDATED DESCRIPTION!!! --}}
Learn more about our full-grain, vegetable tanned leather.
@stop

@section("header")
	<a ng-click="displayMenu = false">Our Leather &amp; Materials</a>
@stop

@section("main")
	<article class="large-12 medium-12 small-12 columns">
		@include('partials.info.leather')
		<hr class="thin">
		@include('partials.info.lining')
		<hr class="thin">
		@include('partials.info.hardware')
		<hr class="thin">
		@include('partials.info.ribbing')
		<hr class="thin">
		@include('partials.info.collar')
	</article>
@stop