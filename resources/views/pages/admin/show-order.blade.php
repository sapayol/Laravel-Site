@extends('layouts/default')

@section('title')
	Order: {{{ $order->id }}}
@stop


@section('page_wrap_class')
	four-levels
@endsection


@section('main')

<section class="large-6 medium-8 large-uncentered medium-centered small-12 columns" ng-controller="editUserCtrl" >
	<img class="customization-image" src="/images/photos/jackets/{{{ $order->jacket->model }}}/hardware-{{{ $order->hardware_color()->name }}}.jpg">
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
		<li><small class="list-key">Email</small><a href="mailto:@{{ currentData.user.email }}">@{{ currentData.user.email }}</a><strong></strong></li>
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
			<span class="list-key">@{{ key.snakeToText() }}</span>
			<span class="list-value">
				<strong>@{{ currentData.user_measurements[key] }} </strong><span ng-if="currentData.user_measurements[key]"> {{{ $order->userMeasurements->units }}}</span>
			</span>
		</li>
		<li><br></li>
		<li>
			<span class="list-key">Note</span>
			<span class="list-value"><em>@{{ currentData.user_measurements.note }}</em></span>
		</li>
	</ul>

	<h3>Payment Info</h3>
	<ul class="no-bullet value-list">
		<li><small class="list-key">Trans ID </small><a href="https://dashboard.stripe.com/payments/{{{ $order->payment_id }}}">{{{ $order->payment_id }}}</a></li>
		<li><small class="list-key">Method</small><strong>Credit</strong></li>
		<li><small class="list-key">Total </small><strong>${{{ $order->jacket->price }}}	</strong></li>
	</ul>


</div>

<div class="clearfix"></div>

<div class="large-6 medium-8 medium-centered small-12 columns order-summary text-center">

</div>

@stop
