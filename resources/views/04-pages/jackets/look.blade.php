@extends('03-templates/default')

@section('title')
	SAPAYOL | {{{ $jacket->name }}}
@stop

@section('header')
	<div class="large-12 medium-12 small-12 columns">
		<h1>{{{ $jacket->name }}}</h1>
	</div>
@stop

@section('main')

	<div class="large-8 medium-8 small-12 columns">
		<img src="http://placehold.it/800x400&text={{{ $jacket->model }}}">
	</div>

	<div class="large-4 medium-4 small-12 columns">
		<h2>${{{ $jacket->price }}}</h2>
		<ul class="no-bullet">
			<li><small>Leather Type: </small> @{{ leather_type }}</li>
			<li><small>Leather Color: </small>@{{ leather_color }}</li>
			<li><small>Lining Color: </small>@{{ lining_color }}</li>
			<li><small>Hardware Color: </small>@{{ hardware_color }}</li>
		</ul>
		<a href="/jackets/{{{ $jacket->model }}}/fit?type=@{{ leather_type }}&color=@{{ leather_color }}&lining=@{{ lining_color }}&hardware=@{{ hardware_color }}" class="button radius success">Enter Your Measurements</a>
	</div>

	<div class="large-12 medium-12 small-12 columns">
		<h3>Choose Look</h3>
	</div>

	<div class="large-6 medium-6 small-12 columns">
		<h4>Leather Type</h4>
		@if ($jacket->leather_types()->count() > 1)
			<ul class="button-group radius">
				@foreach ($jacket->leather_types() as $leather_type)
			  	<li><a href="#" class="button small" ng-class="{active: leather_type == '{{{ $leather_type->name}}}' }" ng-click="leather_type = '{{{ $leather_type->name }}}'">{{{ $leather_type->name }}}</a></li>
				@endforeach
			</ul>
		@else
			{{{ $jacket->leather_types()->first()->name }}}
		@endif
	</div>

	<div class="large-6 medium-6 small-12 columns">
		<h4>Leather Color</h4>
		@if ($jacket->leather_colors()->count() > 1)
			<ul class="button-group radius">
				@foreach ($jacket->leather_colors() as $leather_color)
			  	<li><a href="#" class="button small" ng-class="{active: leather_color == '{{{ $leather_color->name}}}' }" ng-click="leather_color = '{{{ $leather_color->name }}}'">{{{ $leather_color->name }}}</a></li>
				@endforeach
			</ul>
		@else
			{{{ $jacket->leather_colors()->first()->name }}}
		@endif
	</div>

	<div class="large-6 medium-6 small-12 columns">
		<h4>Lining Color</h4>
		@if ($jacket->lining_colors()->count() > 1)
			<ul class="button-group radius">
				@foreach ($jacket->lining_colors() as $lining_color)
			  	<li><a href="#" class="button small" ng-class="{active: leather_color == '{{{ $leather_color->name}}}' }" ng-click="lining_color = '{{{ $lining_color->name }}}'">{{{ $lining_color->name }}}</a></li>
				@endforeach
			</ul>
		@else
			{{{ $jacket->lining_colors()->first()->name }}}
		@endif
	</div>

	<div class="large-6 medium-6 small-12 columns">
		<h4>Hardware Color</h4>
		@if ($jacket->hardware_colors()->count() > 1)
			<ul class="button-group radius">
				@foreach ($jacket->hardware_colors() as $hardware_color)
			  	<li><a href="#" class="button small" ng-class="{active: hardware_color == '{{{ $hardware_color->name}}}' }" ng-click="hardware_color = '{{{ $hardware_color->name }}}'">{{{ $hardware_color->name }}}</a></li>
				@endforeach
			</ul>
		@else
			{{{ $jacket->hardware_colors()->first()->name }}}
		@endif
	</div>

@stop



@section('footer')
	<div class="alert-box info" data-alert>
	  <h3><strong><small>Page Description</small></strong></h3>
		<h4>
			<small>
				Here's where a user sees all available options
			</small>
		</h4>

		<h3><strong><small>Purpose Served</small></strong></h3>
		<h4>
			<small>
				Visualize design choices and help people make their selection. Get them excited about their ""creation"".
			</small>
		</h4>
		<a href="#" class="close">&times;</a>
	</div>
@stop



