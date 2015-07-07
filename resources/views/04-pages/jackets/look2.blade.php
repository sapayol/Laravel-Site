@extends('03-templates/default')

@section('title')
	SAPAYOL | {{{ $jacket->name }}}
@stop

@section('angular_page_controller')
	ng-controller="lookAndFitCtrl"
@stop

@section('main')

	<section>
		<div class="large-12 medium-12 small-12 columns">
			<h2 class="thin text-center">Choose Your Look &amp; Fit </h2>

			<img class="customization-image" src="/images/photos/jacket-1.jpg">
			<div class="large-12 medium-12 small-12 columns look-options">
				<h3 class="left"><small>Leather Type</small></h3>
				@if ($jacket->leather_types()->count() > 1)
					<ul class="right button-group">
						@foreach ($jacket->leather_types() as $leather_type)
					  	<li><a class="button small" ng-class="{active: jacket.leather_type == '{{{ $leather_type->name}}}' }" ng-click="jacket.leather_type = '{{{ $leather_type->name }}}'">{{{ $leather_type->name }}}</a></li>
						@endforeach
					</ul>
				@else
					{{{ $jacket->leather_types()->first()->name }}}
				@endif
			</div>

			<div class="large-12 medium-12 small-12 columns look-options">
				<h3 class="left"><small>Leather Color</small></h3>
				@if ($jacket->leather_colors()->count() > 1)
					<ul class="right button-group">
						@foreach ($jacket->leather_colors() as $leather_color)
							@if ($leather_color->name != 'navy' && $leather_color->name != 'olive')
					  	<li><a class="button small" ng-class="{active: jacket.leather_color == '{{{ $leather_color->name}}}' }" ng-click="jacket.leather_color = '{{{ $leather_color->name }}}'">{{{ $leather_color->name }}}</a></li>
							@endif
						@endforeach
					</ul>
				@else
					{{{ $jacket->leather_colors()->first()->name }}}
				@endif
			</div>

			<div class="large-12 medium-12 small-12 columns look-options">
				<h3 class="left"><small>Lining Color</small></h3>
				@if ($jacket->lining_colors()->count() > 1)
					<ul class="right button-group">
						@foreach ($jacket->lining_colors() as $lining_color)
					  	<li><a class="button small" ng-class="{active: jacket.lining_color == '{{{ $lining_color->name}}}' }" ng-click="jacket.lining_color = '{{{ $lining_color->name }}}'">{{{ $lining_color->name }}}</a></li>
						@endforeach
					</ul>
				@else
					{{{ $jacket->lining_colors()->first()->name }}}
				@endif
			</div>

			<div class="large-12 medium-12 small-12 columns look-options">
				<h3 class="left"><small>Hardware Color</small></h3>
				@if ($jacket->hardware_colors()->count() > 1)
					<ul class="right button-group">
						@foreach ($jacket->hardware_colors() as $hardware_color)
					  	<li><a class="button small" ng-class="{active: jacket.hardware_color == '{{{ $hardware_color->name }}}' }" ng-click="jacket.hardware_color = '{{{ $hardware_color->name }}}'">{{{ $hardware_color->name }}}</a></li>
						@endforeach
					</ul>
				@else
					{{{ $jacket->hardware_colors()->first()->name }}}
				@endif
			</div>
		</div>

		<div>
			@include('02-organisms.jacket.measurement-table')
		</div>
	</section>

	<div class="large-12 medium-12 small-12 columns">
		<form action="/jackets/bomber/checkout" method="GET">
			<input type="hidden" name="model"          value="{{{ $jacket->model }}}">
			<input type="hidden" name="leather_type"   value="@{{ jacket.leather_type }}">
			<input type="hidden" name="leather_color"  value="@{{ jacket.leather_color }}">
			<input type="hidden" name="lining_color"   value="@{{ jacket.lining_color }}">
			<input type="hidden" name="hardware_color" value="@{{ jacket.hardware_color }}">
			<input type="hidden" name="size"           value="@{{ jacket.size }}">
			<button class="black button expand">Proceed To Checkout</button>
		</form>
	</div>


@stop





