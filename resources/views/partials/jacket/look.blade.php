	<section ng-controller='lookAndFitCtrl' class="large-12 medium-10 medium-centered small-12 columns look-options">
		<h2 class="thin text-center">Design your look</h2>
		<form action="/orders" method="POST" name="createOrderForm" ng-init="init(
		 {{{ $jacket->leather_types()->first()->id }}},
		 {{{ $jacket->leather_colors()->first()->id }}},
		 {{{ $jacket->lining_colors()->first()->id }}},
		 {{{ $jacket->hardware_colors()->first()->id }}},
		 {{{ $jacket->collar_colors()->count() > 0  ? $jacket->collar_colors()->first()->id : 0 }}}
		 )">
			<div class="row">
				<img class="medium-6 columns" ng-src="/images/photos/jackets/{{{ $jacket->model }}}/variations/[[front_image]].jpg"  alt="Jacket Front Preview">
				<img class="medium-6 columns" ng-src="/images/photos/jackets/{{{ $jacket->model }}}/variations/[[back_image]].jpg"  alt="Jacket Back Preview">
			</div>
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
			@if ($jacket->model === 'linden')
				<hr>
				<fieldset>
					<legend>Collar</legend>
				@if ($jacket->collar_colors()->count() > 1)
					@foreach ($jacket->collar_colors() as $collar_color)
						<label class="button tiny hollow {{{ camel_case($collar_color->name) }}}" ng-class="{active: jacket.collar_color == '{{{ $collar_color->id }}}' }">{{{ $collar_color->name }}}
							<input type="radio" name="jacket_look[collar_color]" ng-model="jacket.collar_color" value="{{{ $collar_color->id }}}" ng-change="updateSessionCache()">
						</label>
					@endforeach
				@else
					{{{ $jacket->hardware_colors()->first()->name }}}
				@endif
				</fieldset>
			@endif
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
			<div class="large-6 medium-8 small-12 medium-centered large-centered columns" ng-hide="showLogin">
				<a href="" ng-click="showLogin = true" class="button expand">Proceed To Measurement</a>
				<br><br>
			</div>
			<section class="large-6 medium-8 small-12 medium-centered large-centered columns slideInDown animated" ng-show="showLogin" ng-init="showLogin = false">
			<p>
				<strong>Enter an email address and choose a password to continue.</strong>
				<br>Use your existing credentials if you&rsquo;ve already created an account.
			</p>
			@include('partials.checkout.user-registration-form')
		@elseif (Auth::user()->unfinishedOrders()->count() > 0)
			<section class="large-6 medium-8 small-12 medium-centered large-centered columns">
				<p class="medium-text-center">Looks like you're logged in as <strong>{{{ Auth::user()->email }}}</strong></p>
				<div class="text-center">
					<a href="/orders/{{{ Auth::user()->unfinishedOrders->last()->id }}}/fit/next" class="button">Continue Your Order</a>
					<p>or</p>
					<a href="{{ url('/auth/logout') }}" class="underlined">Log in as someone else</a>
				</div>
		@else
			<section class="large-6 medium-8 small-12 medium-centered large-centered columns">
				<a href="" ng-click="proceedToOrder()" class="button expand">Proceed To Measurement</a>
		@endif
	</section>

