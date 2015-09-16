@extends('layouts/default')

@section('title')
	{{{ $jacket->name }}}
@stop

@section('angular_page_controller')
	ng-controller="lookAndFitCtrl"
@stop

@section('main')
	<section class="large-12 medium-12 small-12 columns look-options">
		<h2 class="thin text-center">Design your look</h2>
		<form action="/orders" method="POST" name="createOrderForm" ng-init="init( {{{ $jacket->leather_types()->first()->id }}}, {{{ $jacket->leather_colors()->first()->id }}}, {{{ $jacket->lining_colors()->first()->id }}}, {{{ $jacket->hardware_colors()->first()->id }}} )">
			<fieldset>
				<legend>Leather Type</legend>
				@if ($jacket->leather_types()->count() > 1)
					@foreach ($jacket->leather_types() as $leather_type)
						<label class="button tiny hollow bottomless" ng-class="{active: jacket.leather_type == '{{{ $leather_type->id }}}' }">{{{ $leather_type->name }}}
							<input type="radio" name="jacket_look[leather_type]" ng-model="jacket.leather_type" value="{{{ $leather_type->id }}}" ng-change="updateSessionCache()">
						</label>
					@endforeach
				@else
					<label class="button tiny hollow bottomless active">
						{{{ $jacket->leather_types()->first()->name }}}
						<input type="radio" name="jacket_look[leather_type]" ng-model="jacket.leather_type" value="{{{ $jacket->leather_types()->first()->id }}}">
					</label>
				@endif
			</fieldset>
			<hr>
			<fieldset>
				<legend>Leather Color</legend>
				@if ($jacket->leather_colors()->count() > 1)
					@foreach ($jacket->leather_colors() as $leather_color)
						<label class="button tiny hollow {{{ camel_case($leather_color->name) }}}" ng-class="{active: jacket.leather_color == '{{{ $leather_color->id}}}' }">{{{ $leather_color->name }}}
							<input type="radio" name="jacket_look[leather_color]" ng-model="jacket.leather_color" value="{{{ $leather_color->id }}}" ng-change="updateSessionCache()">
						</label>
					@endforeach
				@else
					<label class="button tiny hollow active {{{ camel_case($jacket->leather_colors()->first()->name) }}}">
						{{{ $jacket->leather_colors()->first()->name }}}
						<input type="radio" name="jacket_look[leather_color]" ng-model="jacket.leather_color" value="{{{ $jacket->leather_colors()->first()->id }}}">
					</label>
				@endif
			</fieldset>
			<hr>


			<img ng-if="jacket.lining_color == 12"  class="customization-image" src="/images/photos/linings/bemberg_oxford_black.jpg">
			<img ng-if="jacket.lining_color == 13" class="customization-image" src="/images/photos/linings/bemberg_oxford_bordeaux.jpg">
			<fieldset>
				<legend>Lining Color</legend>
				@if ($jacket->lining_colors()->count() > 1)
					@foreach ($jacket->lining_colors() as $lining_color)
						<label class="button tiny hollow {{{ camel_case($lining_color->name) }}}" ng-class="{active: jacket.lining_color == '{{{ $lining_color->id}}}' }">{{{ $lining_color->name }}}
							<input type="radio" name="jacket_look[lining_color]" ng-model="jacket.lining_color" value="{{{ $lining_color->id }}}" ng-change="updateSessionCache()">
						</label>
					@endforeach
				@else
					{{{ $jacket->lining_colors()->first()->name }}}
				@endif
			</fieldset>
				<hr>
			<img ng-if="jacket.hardware_color == 9"  class="customization-image" src="/images/photos/jackets/{{{ $jacket->model }}}/hardware-silver.jpg">
			<img ng-if="jacket.hardware_color == 10" class="customization-image" src="/images/photos/jackets/{{{ $jacket->model }}}/hardware-graphite.jpg">
			<img ng-if="jacket.hardware_color == 11" class="customization-image" src="/images/photos/jackets/{{{ $jacket->model }}}/hardware-gold.jpg">
			<fieldset>
				<legend>Zipper &amp; Button Color</legend>
				@if ($jacket->hardware_colors()->count() > 1)
					@foreach ($jacket->hardware_colors() as $hardware_color)
						<label class="button tiny hollow {{{ camel_case($hardware_color->name) }}}" ng-class="{active: jacket.hardware_color == '{{{ $hardware_color->id }}}' }">{{{ $hardware_color->name }}}
							<input type="radio" name="jacket_look[hardware_color]" ng-model="jacket.hardware_color" value="{{{ $hardware_color->id }}}" ng-change="updateSessionCache()">
						</label>
					@endforeach
				@else
					{{{ $jacket->hardware_colors()->first()->name }}}
				@endif
			</fieldset>


			<input type="hidden" name="_token"         value="{{{ csrf_token() }}}">
			<input type="hidden" name="model"          value="{{{ $jacket->model }}}">
			@if (Auth::guest())
				<input type="hidden" name="user_id"      value="@{{ user.id }}">
			@else
				<input type="hidden" name="user_id"      value="{{{ Auth::user()->id }}}">
			@endif
		</form>

	</section>
	<div class="clearfix"></div>
		@if (Auth::guest())
			<section class="large-6 medium-8 small-12 medium-centered large-centered columns panel">
				<p><strong>Enter an email address and choose a password to continue.</strong><br> It lets us save your design choices and body measurements. <br> <br>Use your existing credentials if you've already created an account.</p>
				<p><em>We don’t spam or share your information.</em></p>
				@include('partials.checkout.user-registration-form')
		@elseif (Auth::user()->unfinishedOrders()->count() > 0)
			<section class="large-6 medium-8 small-12 medium-centered large-centered columns panel">
				<p>Looks like you're logged in as <strong>{{{ Auth::user()->email }}}</strong></p>
				<div class="text-center">
					<a href="" ng-click="proceedToOrder()" class="button expand">Continue Your Order</a>
					<p>or</p>
					<a href="{{ url('/auth/logout') }}" class="underlined">Log in as someone else</a>
				</div>
		@else
			<section class="large-6 medium-8 small-12 medium-centered large-centered columns">
				<a href="" ng-click="proceedToOrder()" class="button expand">Proceed To Measurement</a>
		@endif
	</section>


@stop





