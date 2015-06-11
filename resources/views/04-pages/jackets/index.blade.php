@extends('03-templates/default')

@section('title')
	Jackets
@stop

@section('header')
	<h1>Our Jackets</h1>
@stop

@section('main')

	<ul class="small-block-grid-1 medium-block-grid-2 large-block-grid-3">
		@foreach ($jackets as $jacket)
		  <li>
				<a href="/jackets/{{{ $jacket->model }}}">
					<img src="http://placehold.it/400x400&text={{{ $jacket->model }}}">
				</a>
				<h2>
					<a href="/jackets/{{{ $jacket->model }}}">
						{{{ $jacket->name }}}
					</a>
				</h2>

				<h4>${{{ $jacket->price }}}</h4>
		  </li>
		@endforeach
	</ul>

@stop



@section('footer')
	<div class="alert-box info" data-alert >
	  <h3><strong><small>Page Description</small></strong></h3>
		<h4>
			<small>
				not needed in v1.0
			</small>
		</h4>

		<h3><strong><small>Purpose Served</small></strong></h3>
		<h4>
			<small>

			</small>
		</h4>
  	<a href="#" class="close">&times;</a>
	</div>
@stop

