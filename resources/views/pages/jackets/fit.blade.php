@extends('layouts/default')

@section('title')
	{{{ $jacket->name }}}
@stop

@section('main')

	<section class="large-12 medium-12 small-12 columns measurement-entry">
		<h2>Enter Your Measurements</h2>
		@include('partials.jacket.measurement-form')
	</section>

	@include('partials.jacket.measurement-tracker')

@stop




