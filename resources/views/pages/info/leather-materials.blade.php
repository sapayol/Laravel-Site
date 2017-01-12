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
		@include('partials.info.leather')
		@include('partials.info.leather-accordion')
		<hr class="thin">
		@include('partials.info.lining')
		<hr class="thin">
		@include('partials.info.hardware')
		<hr class="thin">
		@include('partials.info.knits')
		<hr class="thin">
		@include('partials.info.collar')
		<hr class="thin">
		@include('partials.info.care-instructions')
	</article>


@stop