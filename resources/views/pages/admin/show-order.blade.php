@extends('layouts/default')

@section('page_wrap_class')
padded-columns
@stop

@section('title')
Order: {{{ $order->id }}}
@stop

@section('header')
	<a ng-click="displayMenu = false">Order: {{{ $order->id }}}</a>
@stop

@section('main')

	<section class="large-6 medium-8 large-uncentered medium-centered small-12 columns" ng-controller="jacketCtrl">
		@include('partials.admin.order-summary')
		@include('partials.jacket.preview-image')
	</section>

	<hr class="show-for-small-only">

	@if ($order->statusIsAfter('started'))
		<section class="large-6 medium-8 large-uncentered medium-centered small-12 columns" ng-controller="adminTasksCtrl">
			@include('partials.admin.task-box')
			@if ($order->statusIsBefore('shipped'))
				<div ng-show="trackingInfo" class="text-center">
					@include('partials.admin.tracking-number-form')
					<a class="text-center under-button-link underlined" ng-click="trackingInfo = false">Cancel</a>
				</div>
			@endif
			<div ng-show="tailorNote" class="text-center">
				@include('partials.admin.tailor-note-form')
				<a class="text-center under-button-link underlined" ng-click="tailorNote = false">Cancel</a>
			</div>
		</section>
		<hr>
	@else
		<div class="clearfix"></div>
	@endif


	@if ($order->address)
		<section class="large-4 medium-7 small-12 columns" ng-controller="editUserCtrl" >
			@include('partials.admin.order-customer')
		</section>
	@endif

	<section class="large-3 medium-5 small-12 columns" ng-controller="editLookCtrl" >
		@include('partials.admin.order-look')
	</section>

	<section class="large-5 medium-8 small-12 columns" ng-controller="editMeasurementsCtrl" >
		@include('partials.admin.order-measurements')
	</section>

	@if ($order->statusIsAfter('started'))
		<section class="large-12 medium-4 small-12 columns">
			<h3>Payment Info</h3>
			<ul class="no-bullet value-list">
				<li><small class="list-key">Method</small><strong>Credit</strong></li>
				<li><small class="list-key">Total </small><strong>${{{ $order->jacket->price }}}	</strong></li>
			</ul>
			<br><br>
		</section>
	@endif

@stop
