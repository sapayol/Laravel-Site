@extends('03-templates/default')

@section('title')
	{{{ $jacket->name }}}
@stop

@section('header')
	<div class="large-12 medium-12 small-12 columns">
		<h1>{{{ $jacket->name }}}</h1>
	</div>
@stop

@section('main')


	<div class="large-12 medium-12 small-12 columns">
		<h3>Checkout</h3>
	</div>

	<a href="" class="button success radius">Submit</a>

@stop


@section('footer')
	<div class="alert-box info" data-alert>
	  <h3><strong><small>Page Description</small></strong></h3>
		<h4>
			<small>
				Page where user enters payment and shipping info
			</small>
		</h4>

		<h3><strong><small>Purpose Served</small></strong></h3>
		<h4>
			<small>
				- Visualize the jacket <br>
				- Answer every important question about the jacket <br>
				- Convince the audience of the exclusive qualities of the jacket
			</small>
		</h4>
		<a href="#" class="close">&times;</a>
	</div>
@stop



