@extends('03-templates/default')

@section('title')
	{{{ $jacket->name }}}
@stop

@section('header')
	<h1>{{{ $jacket->name }}}</h1>
@stop

@section('main')

	<img src="http://placehold.it/800x400&text={{{ $jacket->model }}}">

	<h2>${{{ $jacket->price }}}</h2>

	<a href="{!! route('jackets.look', $jacket->model) !!}" class="button radius success">Customize Look</a>
@stop

@section('footer')
	<div class="alert-box info" data-alert>
	  <h3><strong><small>Page Description</small></strong></h3>
		<h4>
			<small>
				Enable a close look at the jacket and all the important features/options.
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



