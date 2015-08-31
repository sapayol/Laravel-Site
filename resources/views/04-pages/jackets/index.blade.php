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
				@if ($jacket->active)
					<a href="/jackets/{{{ $jacket->model }}}">
						<img src="/images/photos/jackets/{{{ $jacket->model }}}/thumbnail.jpg">
					</a>
					<h2>
						<a href="/jackets/{{{ $jacket->model }}}">
							{{{ $jacket->name }}}
						</a>
					</h2>
				@else
					<img class="jacket-placeholder" src="/images/photos/jackets/{{{ $jacket->model }}}/{{{ $jacket->model }}}.svg">
					<h2>{{{ $jacket->name }}}</h2>
					<h3><em>Coming Soon</em></h3>
				@endif
		  </li>
		@endforeach
	</ul>
@stop
