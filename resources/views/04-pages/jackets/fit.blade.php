@extends('03-templates/default')

@section('title')
	{{{ $jacket->name }}}
@stop

@section('main')

	<section class="large-12 medium-12 small-12 columns measurement-entry">
		<h2>Enter Your Measurements</h2>
		@include('02-organisms.jacket.measurement-form')
	</section>

	@include('02-organisms.jacket.measurement-tracker')

@stop




