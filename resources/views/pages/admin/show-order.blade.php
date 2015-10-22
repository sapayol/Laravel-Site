@extends('layouts/default')

@section('title')
	Order: {{{ $order->id }}}
@stop


@section('page_wrap_class')
	four-levels shrunken-layout
@endsection


@section('main')

<section class="large-6 medium-8 large-uncentered medium-centered small-12 columns">
	<ul class="no-bullet value-list" ng-show="!editMode">
		<li><small class="list-key">Number</small><span>{{{ $order->id }}}</span></li>
		<li><small class="list-key">Started</small><span>{{{ date('Y-m-d', strtotime($order->created_at)) }}} <small>{{{ date('h:i', strtotime($order->created_at)) }}}</small></span></li>
		<li><small class="list-key">Status</small><strong>{{{ ucwords($order->status) }}}</strong>
		 @if ($order->status == 'paid')
		 	<small>( {{{ date('Y-m-d h:i', strtotime($order->paid_at)) }}} )</small>
		 @elseif ($order->status == 'production')
		 	<small>( {{{ date('Y-m-d h:i', strtotime($order->production_at)) }}} )</small>
		 @elseif ($order->status == 'shipped')
		 	<small>( {{{ date('Y-m-d h:i', strtotime($order->shipped_at)) }}} )</small>
		 @elseif ($order->status == 'completed')
		 	<small>( {{{ date('Y-m-d h:i', strtotime($order->completed_at)) }}} )</small>
		 @endif
		</li>
	</ul>
</section>

<hr>
<section ng-controller="adminTasksCtrl">
	<nav ng-hide="trackingInfo || tailorNote" class="large-6 medium-8 large-uncentered medium-centered small-12 columns">
		<a href="" class="button expand small" ng-click="tailorNote = true; taskMode = true;">Email Tailor</a>
		<a href="" class="button expand small" ng-click="trackingInfo = true; taskMode = true; focus('tracking-number');">Add Tracking Info</a>
		<a href="https://dashboard.stripe.com/payments/{{{ $order->payment_id }}}" class="button expand small">View Stripe Payment</a>
	</nav>

	<form ng-submit="submitTrackingNumber()" ng-show="trackingInfo" class="large-6 medium-8 large-uncentered medium-centered small-12 columns animated fadeIn">
		<br>
		<label for="tracking-number" class="text-input-label">
			<span class="label-title">Tracking Number</span>
			<input type="text" ng-model="trackingNumber" name="tracking-number" id="tracking-number">
		</label>
		<div class="text-center">
			<button class="button small expand">Add Tracking Number</button>
			<a class="text-center under-button-link underlined" ng-click="trackingInfo = false">Cancel</a>
		</div>
		<br>
	</form>

	<form ng-submit="submitTailorMessage()"  ng-show="tailorNote" class="large-6 medium-8 large-uncentered medium-centered small-12 columns animated fadeIn">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">

			<label for="note" class="text-input-label">
				<span class="label-title">Note to Tailor</span>
				<textarea ng-model="note" name="note" id="note" rows="7"></textarea>
			</label>
			<label class="text-left checkboxes">
				<span class="label-title">Include in Email</span>
				<ul class="inline-list">
					<li><label><input type="checkbox" ng-model="inclusions.look" name="inclusions[look]" value=""> Look</label></li>
					<li><label><input type="checkbox" ng-model="inclusions.body_fit" name="inclusions[body-fit]" value=""> Body Fit</label></li>
					<li><label><input type="checkbox" ng-model="inclusions.product_fit" name="inclusions[product-fit]" value=""> Product Fit</label></li>
				</ul>
			</label>
			<div class="text-center">
				<button class="button small expand">Send to Tailor</button>
				<a class="text-center under-button-link underlined" ng-click="tailorNote = false">Cancel</a>
			</div>
	</form>
	</section>
<hr>

<section class="large-6 medium-8 large-uncentered medium-centered small-12 columns" ng-controller="editUserCtrl" >
	<h4 class="left">Customer</h4>
	<a class="right" ng-show="!editMode" ng-click="enterEditMode()">Edit</a>
  <a class="right" ng-show="editMode"  ng-click="updateUser()">Save</a>
  <span class="right" ng-show="editMode" > &nbsp; | &nbsp;</span>
  <a class="right" ng-show="editMode"  ng-click="editMode = !editMode">Cancel</a>
	<div class="clearfix"></div>

	<div ng-show="editMode" class="animated fadeIn">
		@include('partials.admin.edit-user-form')
	</div>

	<ul class="no-bullet value-list" ng-show="!editMode">
		<li><small class="list-key">Name</small><strong>@{{ currentData.user.name }}</strong></li>
		<li><small class="list-key">Email</small><a href="mailto:@{{ currentData.user.email }}">@{{ currentData.user.email }}</a></li>
		<li><small class="list-key">Address</small>@{{ currentData.address.address1 }}</li>
		@if ($order->address->address2 )
			<li><small class="list-key">&nbsp;</small>@{{ currentData.address.address2 }}</li>
		@endif
		<li><small class="list-key">&nbsp;</small>@{{ currentData.address.city }}, @{{ currentData.address.province }} @{{ currentData.address.postcode }}</li>
		<li><small class="list-key">&nbsp;</small>@{{ currentData.address.country }}</li>
	</ul>
</section>

<section class="large-6 medium-8 large-uncentered medium-centered small-12 columns" ng-controller="editLookCtrl" >
	<h3 class="left">Look</h3>
	<a class="right" ng-show="!editMode" ng-click="enterEditMode()">Edit</a>
  <a class="right" ng-show="editMode"  ng-click="updateLook()">Save</a>
  <span class="right" ng-show="editMode" > &nbsp; | &nbsp;</span>
  <a class="right" ng-show="editMode"  ng-click="editMode = !editMode">Cancel</a>
	<div class="clearfix"></div>

	<div ng-show="editMode" class="animated fadeIn">
		@include('partials.admin.edit-look-form')
	</div>

	<ul ng-show="!editMode" class="no-bullet value-list">
		<li><small class="list-key">Model </small>@{{ jacket.name  }}	</li>
		<li><small class="list-key">Leather Type </small>@{{ attributes.leather_type.name.capitalize()  }}	</li>
		<li><small class="list-key">Leather Color </small>@{{ attributes.leather_color.name.capitalize() }}	</li>
		<li><small class="list-key">Lining Color </small>@{{ attributes.lining_color.name.capitalize() }} </li>
		<li><small class="list-key">Hardware Color </small>@{{ attributes.hardware_color.name.capitalize() }}	</li>
	</ul>

</section>

<section class="large-6 medium-8 large-uncentered medium-centered small-6 columns" ng-controller="editMeasurementsCtrl" >
	<h3 class="left">Body Measurements</h3>
	<a class="right" ng-show="!editMode" ng-click="enterEditMode()">Edit</a>
  <a class="right" ng-show="editMode"  ng-click="updateMeasurements('user')">Save</a>
  <span class="right" ng-show="editMode" > &nbsp; | &nbsp;</span>
  <a class="right" ng-show="editMode"  ng-click="editMode = !editMode">Cancel</a>
	<div class="clearfix"></div>

	<div ng-show="editMode" class="animated fadeIn">
		@include('partials.admin.edit-measurements-form')
	</div>

	<ul ng-show="!editMode" class="no-bullet value-list">
		<li ng-repeat="key in notSorted(currentData.user_measurements)" ng-if="key != 'note'">
			<span class="list-key"><small>@{{ key.snakeToText() }}</small></span>
			<span class="list-value">
				<strong>@{{ currentData.user_measurements[key] }} </strong><span ng-if="currentData.user_measurements[key]"> {{{ $order->bodyMeasurements->units }}}</span>
			</span>
		</li>
		<li>
			<span class="list-key"><small>Note</small></span>
			<span class="list-value"><em>@{{ currentData.user_measurements.note }}</em></span>
		</li>
	</ul>
</section>

<section class="large-6 medium-8 large-uncentered medium-centered small-6 columns" ng-controller="editMeasurementsCtrl" >
	<h3 class="left">Product Measurements</h3>
	<a class="right" ng-show="!editMode" ng-click="enterEditMode()">Edit</a>
  <a class="right" ng-show="editMode"  ng-click="updateMeasurements('user')">Save</a>
  <span class="right" ng-show="editMode" > &nbsp; | &nbsp;</span>
  <a class="right" ng-show="editMode"  ng-click="editMode = !editMode">Cancel</a>
	<div class="clearfix"></div>

	<div ng-show="editMode" class="animated fadeIn">
		@include('partials.admin.edit-measurements-form')
	</div>

	<ul ng-show="!editMode" class="no-bullet value-list">
		<li ng-repeat="key in notSorted(currentData.product_measurements)" ng-if="key != 'note'">
			<span class="list-key"><small>@{{ key.snakeToText() }}</small></span>
			<span class="list-value">
				<strong>@{{ currentData.user_measurements[key] }} </strong><span ng-if="currentData.user_measurements[key]"> {{{ $order->bodyMeasurements->units }}}</span>
			</span>
		</li>
		<li>
			<span class="list-key"><small>Note</small></span>
			<span class="list-value"><em>@{{ currentData.user_measurements.note }}</em></span>
		</li>
	</ul>
</section>

<section class="large-6 medium-8 large-uncentered medium-centered small-12 columns">
	<h3>Payment Info</h3>
	<ul class="no-bullet value-list">
		<li><small class="list-key">Method</small><strong>Credit</strong></li>
		<li><small class="list-key">Total </small><strong>${{{ $order->jacket->price }}}	</strong></li>
	</ul>
</section>

@stop
