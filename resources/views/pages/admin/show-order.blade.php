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
		<li class="multi-line"><small class="list-key">Status</small><div>
		 @if ($order->status == 'completed')
			<span class="{{{ $order->status == 'completed' ? 'active' : '' }}}">Completed</span>
		 	<small>( {{{ date('Y-m-d h:i a', strtotime($order->completed_at)) }}} )</small><br>
		 @endif
		 @if ($order->statusIsAfter('production'))
			<span class="{{{ $order->status == 'shipped' ? 'active' : '' }}}">Shipped</span>
		 	<small>( {{{ date('Y-m-d h:i a', strtotime($order->shipped_at)) }}} )</small><br>
		 @endif
		 @if ($order->statusIsAfter('paid'))
			<span class="{{{ $order->status == 'production' ? 'active' : '' }}}">Production</span>
		 	<small>( {{{ date('Y-m-d h:i a', strtotime($order->production_at)) }}} )</small><br>
		 @endif
		 @if ($order->statusIsAfter('started'))
			<span class="{{{ $order->status == 'paid' ? 'active' : '' }}}">Paid</span>
		 	<small>( {{{ date('Y-m-d h:i a', strtotime($order->paid_at)) }}} )</small><br>
		 @endif
		 @if ($order->statusIsAfter('new'))
			<span class="{{{ $order->status == 'started' ? 'active' : '' }}}">Started</span>
		 	<small>( {{{ date('Y-m-d h:i a', strtotime($order->created_at)) }}} )</small><br>
		 @endif
		 		</div>

		</li>
		@if ($order->status == 'shipped' || $order->statusIsAfter('shipped'))
			<li><small class="list-key">Tracking #</small><a href="https://www.google.com/#q={{{ $order->tracking_number }}}">{{{ $order->tracking_number }}}</a></li>
		@endif
	</ul>
</section>
<hr>

@if ($order->statusIsAfter('started'))
<section>
	<nav ng-hide="trackingInfo || tailorNote" class="large-6 medium-8 large-uncentered medium-centered small-12 columns" >
		@if ($order->statusIsBefore('production'))
			@if ($order->bodyMeasurements->uncompleted())
				<form action="{{{ route('orders.update', $order->id) }}}" method="POST" onsubmit="return confirm('Looks like there are still missing measurements, are you sure you want to send to production?');">
			@else
				<form action="{{{ route('orders.update', $order->id) }}}" method="POST">
			@endif
				<input type="hidden" name="_token" value="{{{ csrf_token() }}}">
				<input type="hidden" name="_method" value="PATCH">
				<input type="hidden" name="status" value="production">
				<input type="submit" class="button expand small" value="Start Production">
			</form>
		@endif
		@if ($order->statusIsBefore('shipped') && $order->statusIsAfter('paid'))
			<a href="" class="button expand small" ng-click="trackingInfo = true; taskMode = true; focus('tracking-number');">Add Tracking Number</a>
		@endif
		@if ($order->status == ('shipped'))
			<form action="{{{ route('orders.update', $order->id) }}}" method="POST">
				<input type="hidden" name="_token" value="{{{ csrf_token() }}}">
				<input type="hidden" name="_method" value="PATCH">
				<input type="hidden" name="status" value="completed">
				<input type="submit" class="button expand small" value="Complete Order">
			</form>
		@endif
		<a href="" class="button expand small primary-color" ng-click="tailorNote = true; taskMode = true;">Email Tailor</a>
		<a href="https://dashboard.stripe.com/payments/{{{ $order->payment_id }}}" class="button expand small  primary-color">View Stripe Payment</a>
	</nav>

	@if ($order->statusIsBefore('shipping'))
		<form action="{{{ route('orders.update', $order->id) }}}" method="POST" class="large-6 medium-8 large-uncentered medium-centered small-12 columns animated fadeIn">
			<input type="hidden" name="_token" value="{{{ csrf_token() }}}">
			<input type="hidden" name="_method" value="PATCH">
			<br>
			<label for="tracking-number" class="text-input-label">
				<span class="label-title">Tracking Number</span>
				<input type="text" name="tracking_number" id="tracking-number" required>
			</label>
				<button class="button small expand">Submit Tracking Number</button>
			<br>
		</form>
		<div ng-show="trackingInfo" class="text-center">
			<a class="text-center under-button-link underlined" ng-click="trackingInfo = false">Cancel</a>
		</div>
	@endif

	<form ng-controller="tailorMessageCtrl" ng-submit="submitTailorMessage()"  ng-show="tailorNote" class="large-6 medium-8 large-uncentered medium-centered small-12 columns animated fadeIn">
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
				<button class="button small expand">Send to Tailor</button>
	</form>
	<div ng-show="tailorNote" class="text-center">
		<a class="text-center under-button-link underlined" ng-click="tailorNote = false">Cancel</a>
	</div>
	</section>
<hr>
@endif


@if ($order->address)
	<section class="large-6 medium-8 large-uncentered medium-centered small-12 columns" ng-controller="editUserCtrl" >
		<h4 class="left">Customer</h4>
		@if ($order->status !== 'completed')
			<a class="right" ng-show="!editMode" ng-click="enterEditMode()">Edit</a>
		@endif
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
@endif

<section class="large-6 medium-8 large-uncentered medium-centered small-12 columns" ng-controller="editLookCtrl" >
	<h3 class="left">Look</h3>
	@if ($order->status !== 'completed' && $order->statusIsAfter('started'))
		<a class="right" ng-show="!editMode" ng-click="enterEditMode()">Edit</a>
	@endif
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

<section class="large-12 medium-12 small-12 columns">
	<div class="row collapse">
		@foreach (['body', 'product'] as $type)
			<div class="large-6 medium-8 large-uncentered medium-centered small-6 columns" ng-controller="editMeasurementsCtrl" ng-init="init( '{{{$type}}}' )" >
				<div class="value-list-controls">
					<h3>{{{ ucwords($type)}}}</h3>
					@if ($order->status !== 'completed' && $order->statusIsAfter('started'))
						<a ng-show="!editMode" ng-click="enterEditMode()">Edit</a>
					@endif
				  <a ng-show="editMode"  ng-click="updateMeasurements( '{{{ $type }}}' )">Save</a>
				  <span ng-show="editMode" > &nbsp; | &nbsp;</span>
				  <a ng-show="editMode"  ng-click="editMode = !editMode">Cancel</a>
				</div>
				<div class="clearfix"></div>

				<div ng-show="editMode" class="animated fadeIn">
					@include('partials.admin.edit-measurements-form')
				</div>

				<ul ng-show="!editMode" class="no-bullet value-list">
					<li ng-repeat="key in notSorted(currentData)" ng-if="key != 'note'">
						<span class="list-key"><small>@{{ key.snakeToText() }}</small></span>
						<span class="list-value">
							<strong>@{{ currentData[key] }} </strong>
							<span ng-if="currentData[key]">
								@if ($type == 'body')
									{{{ $order->bodyMeasurements->units == 'in' ? '"' : 'cm' }}}
								@elseif ($type == 'product' && $order->productMeasurements)
									{{{ $order->productMeasurements->units == 'in' ? '"' : 'cm' }}}
								@endif
							</span>
						</span>
					</li>
					@if ($type == 'body')
						<li>
							<span class="list-key"><small>Note</small></span>
							<span class="list-value"><em>@{{ currentData.note }}</em></span>
						</li>
					@endif
				</ul>
			</div>
		@endforeach
	</div>
</section>

@if ($order->statusIsAfter('started'))
	<section class="large-6 medium-8 large-uncentered medium-centered small-12 columns">
		<h3>Payment Info</h3>
		<ul class="no-bullet value-list">
			<li><small class="list-key">Method</small><strong>Credit</strong></li>
			<li><small class="list-key">Total </small><strong>${{{ $order->jacket->price }}}	</strong></li>
		</ul>
		<br><br>
	</section>
@endif

@stop
