@extends("layouts/default")

@section("title")
Our Leather
@stop

@section("description")
{{-- NEED UPDATED DESCRIPTION!!! --}}
Learn more about our full-grain, vegetable tanned leather.
@stop

@section("header")
	<a ng-click="displayMenu = false">Our Leather</a>
@stop

@section("main")
		@include('partials.info.leather')
		<hr class="thin">
		@include('partials.info.care-instructions')
	</article>
@stop