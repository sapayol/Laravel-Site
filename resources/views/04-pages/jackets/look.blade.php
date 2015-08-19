@extends('03-templates/default')

@section('title')
	{{{ $jacket->name }}}
@stop

@section('angular_page_controller')
	ng-controller="lookAndFitCtrl"
@stop

@section('main')
	<section class="large-12 medium-12 small-12 columns">
		<h2 class="thin text-center">Customize your {{{ $jacket->name }}}</h2>
		<img class="customization-image" src="/images/stock-photos/jacket-customize.jpg">
	</section>

	<form class="large-12 medium-12 small-12 columns look-options2" action="/jackets/{{{ $jacket->model }}}/fit" method="GET">
		<fieldset>
			<legend>Leather Type</legend>
			@if ($jacket->leather_types()->count() > 1)
				@foreach ($jacket->leather_types() as $leather_type)
					<label class="button tiny hollow bottomless" ng-class="{active: jacket.leather_type == '{{{ $leather_type->name}}}' }">{{{ $leather_type->name }}}
						<input type="radio" name="leather_type" ng-model="jacket.leather_type" value="{{{ $leather_type->name }}}" ng-change="updateSessionCache()">
					</label>
				@endforeach
			@else
				{{{ $jacket->leather_types()->first()->name }}}
			@endif
		</fieldset>

		<fieldset>
			<legend>Leather Color</legend>
			@if ($jacket->leather_colors()->count() > 1)
				@foreach ($jacket->leather_colors() as $leather_color)
					<label class="button tiny hollow {{{ camel_case($leather_color->name) }}}" ng-class="{active: jacket.leather_color == '{{{ $leather_color->name}}}' }">{{{ $leather_color->name }}}
						<input type="radio" name="leather_color" ng-model="jacket.leather_color" value="{{{ $leather_color->name }}}" ng-change="updateSessionCache()">
					</label>
				@endforeach
			@else
				{{{ $jacket->leather_colors()->first()->name }}}
			@endif
		</fieldset>

		<fieldset>
			<legend>Lining Color</legend>
			@if ($jacket->lining_colors()->count() > 1)
				@foreach ($jacket->lining_colors() as $lining_color)
					<label class="button tiny hollow {{{ camel_case($lining_color->name) }}}" ng-class="{active: jacket.lining_color == '{{{ $lining_color->name}}}' }">{{{ $lining_color->name }}}
						<input type="radio" name="lining_color" ng-model="jacket.lining_color" value="{{{ $lining_color->name }}}" ng-change="updateSessionCache()">
					</label>
				@endforeach
			@else
				{{{ $jacket->lining_colors()->first()->name }}}
			@endif
		</fieldset>

		<fieldset>
			<legend>Hardware Color</legend>
			@if ($jacket->hardware_colors()->count() > 1)
				@foreach ($jacket->hardware_colors() as $hardware_color)
					<label class="button tiny hollow {{{ camel_case($hardware_color->name) }}}" ng-class="{active: jacket.hardware_color == '{{{ $hardware_color->name }}}' }">{{{ $hardware_color->name }}}
						<input type="radio" name="hardware_color" ng-model="jacket.hardware_color" value="{{{ $hardware_color->name }}}" ng-change="updateSessionCache()">
					</label>
				@endforeach
			@else
				{{{ $jacket->hardware_colors()->first()->name }}}
			@endif
		</fieldset>
		<input type="hidden" name="model" value="{{{ $jacket->model }}}">
	</form>

	<section class="large-12 medium-12 small-12 columns inverted-colors" ng-controller="authCtrl">
		@if (Auth::guest())
			<p>Enter an email address and password to track your progress throughout the order. </p>
			<p><em>We don’t spam or share your information.</em></p>
			@include('03-templates.checkout.user-registration-form')
		@else
			<h4>Looks like you've started an order as <strong>{{{ Auth::user()->email }}}</strong></h4>
			<div class="text-center">
				<a href="" ng-click="proceedToOrder()" class="button expand inverted-colors">Finalize Your Order</a>
				<br>
				<span>or</span>
				<br><br>
				<a href="{{ url('/auth/logout') }}" class="underlined">Login as someone else</a>
			</div>
		@endif

		<form action="/orders" method="POST" name="createOrderForm">
			<input type="hidden" name="_token"         value="{{{ csrf_token() }}}">
			<input type="hidden" name="model"          value="{{{ $jacket->model }}}">
			@if (Auth::guest())
				<input type="hidden" name="user_id"      value="@{{ user.id }}">
			@else
				<input type="hidden" name="user_id"      value="{{{ Auth::user()->id }}}">
			@endif
			<input type="hidden" name="leather_type"   value="@{{ jacket.leather_type }}">
			<input type="hidden" name="leather_color"  value="@{{ jacket.leather_color }}">
			<input type="hidden" name="lining_color"   value="@{{ jacket.lining_color }}">
			<input type="hidden" name="hardware_color" value="@{{ jacket.hardware_color }}">
		</form>
	</section>


@stop





