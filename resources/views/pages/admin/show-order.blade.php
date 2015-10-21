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

<section class="large-6 medium-8 large-uncentered medium-centered small-12 columns">
	<a href="" class="button expand small">Confirm Measurements</a>
	<a href="" class="button expand small">Add Tracking Info</a>
	<a href="https://dashboard.stripe.com/payments/{{{ $order->payment_id }}}" class="button expand small">View Stripe Payment</a>
</section>

<section class="large-6 medium-8 large-uncentered medium-centered small-12 columns" ng-controller="editUserCtrl" >
	<h4 class="left">Customer</h4>
	<a class="right" ng-show="!editMode" ng-click="enterEditMode()">Edit</a>
  <a class="right" ng-show="editMode"  ng-click="updateUser()">Save</a>
  <span class="right" ng-show="editMode" > &nbsp; | &nbsp;</span>
  <a class="right" ng-show="editMode"  ng-click="editMode = !editMode">Cancel</a>
	<div class="clearfix"></div>

	<div ng-show="editMode" class="animated slideInDown">
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

	<div ng-show="editMode" class="animated slideInDown">
		@include('partials.admin.edit-look-form')
	</div>

	<ul class="no-bullet value-list">
		<li><small class="list-key">Model </small>@{{ jacket.name  }}	</li>
		<li><small class="list-key">Leather Type </small>@{{ attributes.leather_type.name.capitalize()  }}	</li>
		<li><small class="list-key">Leather Color </small>@{{ attributes.leather_color.name.capitalize() }}	</li>
		<li><small class="list-key">Lining Color </small>@{{ attributes.lining_color.name.capitalize() }} </li>
		<li><small class="list-key">Hardware Color </small>@{{ attributes.hardware_color.name.capitalize() }}	</li>
	</ul>

</section>

<section class="large-6 medium-8 large-uncentered medium-centered small-12 columns" ng-controller="editMeasurementsCtrl" >
	<h3 class="left">User Measurements</h3>
	<a class="right" ng-show="!editMode" ng-click="enterEditMode()">Edit</a>
  <a class="right" ng-show="editMode"  ng-click="updateMeasurements('user')">Save</a>
  <span class="right" ng-show="editMode" > &nbsp; | &nbsp;</span>
  <a class="right" ng-show="editMode"  ng-click="editMode = !editMode">Cancel</a>
	<div class="clearfix"></div>

	<div ng-show="editMode" class="animated slideInDown">
		@include('partials.admin.edit-measurements-form')
	</div>

	<ul ng-show="!editMode" class="no-bullet value-list">
		<li ng-repeat="key in notSorted(currentData.user_measurements)" ng-if="key != 'note'">
			<span class="list-key"><small>@{{ key.snakeToText() }}</small></span>
			<span class="list-value">
				<strong>@{{ currentData.user_measurements[key] }} </strong><span ng-if="currentData.user_measurements[key]"> {{{ $order->userMeasurements->units }}}</span>
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
