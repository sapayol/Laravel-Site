<section ng-controller='lookAndFitCtrl' class="large-{{{ !empty($order) ? '12' : '10' }}} medium-12 small-12 large-centered columns look-options">
	@if (empty($order))
		<h2 class="thin text-center hide-for-medium-up">{{{ !empty($order) ? 'Change' : 'Design' }}} your look</h2>
	@endif
	<div class="lookDesigner">
		<div class="image-section"  id="design-your-look">
			<img ng-if="!showBack" ng-src="/images/photos/jackets/{{{ $jacket->model }}}/variations/@{{ front_image }}-medium.jpg"  alt="Jacket Front Preview">
			<img ng-if="showBack" ng-src="/images/photos/jackets/{{{ $jacket->model }}}/variations/@{{ back_image }}-medium.jpg"  alt="Jacket Back Preview">
			<a class="underlined" ng-click="showBack = !showBack">
				<small>Show
					<span ng-if="!showBack">Back</span>
					<span ng-if="showBack">Front</span>
				</small>
			</a>
			<a href="/images/photos/jackets/{{{ $jacket->model }}}/variations/@{{ front_image }}-large.jpg" class="underlined" ng-if="!showBack">
				<small>Enlarge</small>
			</a>
			<a href="/images/photos/jackets/{{{ $jacket->model }}}/variations/@{{ back_image }}-large.jpg" class="underlined" ng-if="showBack">
				<small>Enlarge</small>
			</a>
		</div>
		<div class="look-options-form">
			<form action="/orders" method="POST" name="createOrderForm" ng-init="init(
		 {{{ $jacket->leather_types()->first()->id }}},
		 {{{ $jacket->leather_colors()->first()->id }}},
		 {{{ $jacket->lining_colors()->first()->id }}},
		 {{{ $jacket->hardware_colors()->first()->id }}},
		 {{{ $jacket->collar_colors()->count() > 0  ? $jacket->collar_colors()->first()->id : 0 }}}
		 )">
		 	@if (empty($order))
				<h2 class="thin hide-for-small">
					{{{ !empty($order) ? 'Change' : 'Design' }}} your look <br><br>
				</h2>
			@endif
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
				<fieldset>
					<legend>Collar <small>+ $100</small></legend>
				@if ($jacket->collar_colors()->count() > 1)
					@foreach ($jacket->collar_colors() as $collar_color)
						<label class="button tiny hollow {{{ camel_case($collar_color->name) }}}" ng-class="{active: jacket.collar_color == '{{{ $collar_color->id }}}' }">{{{ $collar_color->name }}}
							<input type="radio" name="jacket_look[collar_color]" ng-model="jacket.collar_color" value="{{{ $collar_color->id }}}" ng-change="updateSessionCache()">
						</label>
					@endforeach
					<label class="button tiny hollow" >None
						<input type="radio" name="jacket_look[collar_color]" ng-model="jacket.collar_color" value="0" ng-change="updateSessionCache()">
						<div class="attribute-price">- $100</div>
					</label>
				@else
					{{{ $jacket->hardware_colors()->first()->name }}}
				@endif
					<br>
				</fieldset>
				<input type="hidden" name="jacket_look[collar_color]" value="{{{ $collar_color->id }}}">
			@endif
			<input type="hidden" name="jacket_look[hardware_color]" value="{{{ $hardware_color->id }}}">
			<input type="hidden" name="jacket_look[lining_color]" value="{{{ $lining_color->id }}}">
			<input type="hidden" name="_token"         value="{{{ csrf_token() }}}">
			<input type="hidden" name="model"          value="{{{ $jacket->model }}}">
			@if (Auth::guest())
				<input type="hidden" name="user_id" value="@{{ user.id }}">
			@else
				<input type="hidden" name="user_id" value="{{{ Auth::user()->id }}}">
			@endif
			</form>
		</div>
	</div>
	<br>
	@if (empty($order))
		@include('partials.jacket.auth')
	@endif
</section>
