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
		  <li class="text-center">
				<a href="/jackets/{{{ $jacket->model }}}">
				@if ($jacket->active)
					<img src="/images/photos/jackets/{{{ $jacket->model }}}/thumbnail.jpg">
				@else
					<img src="http://placehold.it/300x600&text=Coming Soon">
				@endif
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
