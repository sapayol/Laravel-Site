@extends('03-templates/default')

@section('title')
	{{{ $jacket->name }}}
@stop

@section('angular_page_controller')
	ng-controller="lookAndFitCtrl"
@stop

@section('main')
	<section class="large-12 medium-12 small-12 columns">
		<h2 class="thin text-center">Choose Your Look</h2>
		<img class="customization-image" src="/images/stock-photos/jacket-customize.jpg">
	</section>

	<form class="large-12 medium-12 small-12 columns look-options" action="/jackets/{{{ $jacket->model }}}/fit" method="GET">
		<fieldset>
			<legend>Leather Type</legend>
			@if ($jacket->leather_types()->count() > 1)
				<ul class="button-group">
					@foreach ($jacket->leather_types() as $leather_type)
				  	<li><a class="button tiny hollow bottomless" ng-class="{active: jacket.leather_type == '{{{ $leather_type->name}}}' }" ng-click="jacket.leather_type = '{{{ $leather_type->name }}}'">{{{ $leather_type->name }}}</a></li>
					@endforeach
				</ul>
			@else
				{{{ $jacket->leather_types()->first()->name }}}
			@endif
		</fieldset>

		<fieldset>
			<legend>Leather Color</legend>
			@if ($jacket->leather_colors()->count() > 1)
				<ul class="button-group">
					@foreach ($jacket->leather_colors() as $leather_color)
						@if ($leather_color->name != 'navy' && $leather_color->name != 'olive')
				  	<li><a class="button tiny hollow {{{ camel_case($leather_color->name) }}}" ng-class="{active: jacket.leather_color == '{{{ $leather_color->name}}}' }" ng-click="jacket.leather_color = '{{{ $leather_color->name }}}'">{{{ $leather_color->name }}}</a></li>
						@endif
					@endforeach
				</ul>
			@else
				{{{ $jacket->leather_colors()->first()->name }}}
			@endif
		</fieldset>

		<fieldset>
			<legend>Lining Color</legend>
			@if ($jacket->lining_colors()->count() > 1)
				<ul class="button-group">
					@foreach ($jacket->lining_colors() as $lining_color)
				  	<li><a class="button tiny hollow {{{ camel_case($lining_color->name) }}}" ng-class="{active: jacket.lining_color == '{{{ $lining_color->name}}}' }" ng-click="jacket.lining_color = '{{{ $lining_color->name }}}'">{{{ $lining_color->name }}}</a></li>
					@endforeach
				</ul>
			@else
				{{{ $jacket->lining_colors()->first()->name }}}
			@endif
		</fieldset>

		<fieldset>
			<legend>Hardware Color</legend>
			@if ($jacket->hardware_colors()->count() > 1)
				<ul class="button-group">
					@foreach ($jacket->hardware_colors() as $hardware_color)
				  	<li><a class="button tiny hollow {{{ camel_case($hardware_color->name) }}}" ng-class="{active: jacket.hardware_color == '{{{ $hardware_color->name }}}' }" ng-click="jacket.hardware_color = '{{{ $hardware_color->name }}}'">{{{ $hardware_color->name }}}</a></li>
					@endforeach
				</ul>
			@else
				{{{ $jacket->hardware_colors()->first()->name }}}
			@endif
		</fieldset>

		<input type="hidden" name="model"          value="{{{ $jacket->model }}}">
		<input type="hidden" name="leather_type"   value="@{{ jacket.leather_type }}">
		<input type="hidden" name="leather_color"  value="@{{ jacket.leather_color }}">
		<input type="hidden" name="lining_color"   value="@{{ jacket.lining_color }}">
		<input type="hidden" name="hardware_color" value="@{{ jacket.hardware_color }}">
		<div class="text-center">
			<button type="submit" class="black button expand">Proceed To Measurements</button>
			<a href="" class="underlined under-button-link">Order Now and Measure Later</a><br>
		</div>
	</form>

	<form class="large-12 medium-12 small-12 columns look-options2" action="/jackets/{{{ $jacket->model }}}/fit" method="GET">
		<fieldset>
			<legend>Leather Type</legend>
			@if ($jacket->leather_types()->count() > 1)
				<ul class="button-group">
					@foreach ($jacket->leather_types() as $leather_type)
				  	<li><a class="button tiny hollow bottomless" ng-class="{active: jacket.leather_type == '{{{ $leather_type->name}}}' }" ng-click="jacket.leather_type = '{{{ $leather_type->name }}}'">{{{ $leather_type->name }}}</a></li>
					@endforeach
				</ul>
			@else
				{{{ $jacket->leather_types()->first()->name }}}
			@endif
		</fieldset>

		<fieldset>
			<legend>Leather Color</legend>
			@if ($jacket->leather_colors()->count() > 1)
				<ul class="button-group">
					@foreach ($jacket->leather_colors() as $leather_color)
						@if ($leather_color->name != 'navy' && $leather_color->name != 'olive')
				  	<li><a class="button tiny hollow {{{ camel_case($leather_color->name) }}}" ng-class="{active: jacket.leather_color == '{{{ $leather_color->name}}}' }" ng-click="jacket.leather_color = '{{{ $leather_color->name }}}'">{{{ $leather_color->name }}}</a></li>
						@endif
					@endforeach
				</ul>
			@else
				{{{ $jacket->leather_colors()->first()->name }}}
			@endif
		</fieldset>

		<fieldset>
			<legend>Lining Color</legend>
			@if ($jacket->lining_colors()->count() > 1)
				<ul class="button-group">
					@foreach ($jacket->lining_colors() as $lining_color)
				  	<li><a class="button tiny hollow {{{ camel_case($lining_color->name) }}}" ng-class="{active: jacket.lining_color == '{{{ $lining_color->name}}}' }" ng-click="jacket.lining_color = '{{{ $lining_color->name }}}'">{{{ $lining_color->name }}}</a></li>
					@endforeach
				</ul>
			@else
				{{{ $jacket->lining_colors()->first()->name }}}
			@endif
		</fieldset>

		<fieldset>
			<legend>Hardware Color</legend>
			@if ($jacket->hardware_colors()->count() > 1)
				<ul class="button-group">
					@foreach ($jacket->hardware_colors() as $hardware_color)
				  	<li><a class="button tiny hollow {{{ camel_case($hardware_color->name) }}}" ng-class="{active: jacket.hardware_color == '{{{ $hardware_color->name }}}' }" ng-click="jacket.hardware_color = '{{{ $hardware_color->name }}}'">{{{ $hardware_color->name }}}</a></li>
					@endforeach
				</ul>
			@else
				{{{ $jacket->hardware_colors()->first()->name }}}
			@endif
		</fieldset>

		<input type="hidden" name="model"          value="{{{ $jacket->model }}}">
		<input type="hidden" name="leather_type"   value="@{{ jacket.leather_type }}">
		<input type="hidden" name="leather_color"  value="@{{ jacket.leather_color }}">
		<input type="hidden" name="lining_color"   value="@{{ jacket.lining_color }}">
		<input type="hidden" name="hardware_color" value="@{{ jacket.hardware_color }}">
		<div class="text-center">
			<button type="submit" class="black button expand">Proceed To Measurements</button>
			<a href="" class="underlined under-button-link">Order Now and Measure Later</a><br>
		</div>
	</form>
@stop





