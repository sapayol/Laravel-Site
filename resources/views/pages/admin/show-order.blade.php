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

<section class="large-6 medium-8 large-uncentered medium-centered small-12 columns" ng-controller="editUserCtrl" >
	<h3>Look</h3>
	<ul class="no-bullet value-list">
		<li><small class="list-key">Model </small>{{{ $order->jacket->name  }}}	</li>
		<li><small class="list-key">Leather Type </small>{{{ ucfirst($order->leather_type()->name)  }}}	</li>
		<li><small class="list-key">Leather Color </small>{{{ ucfirst($order->leather_color()->name) }}}	</li>
		<li><small class="list-key">Lining Color </small>{{{ ucfirst($order->lining_color()->name) }}}	</li>
		<li><small class="list-key">Hardware Color </small>{{{ ucfirst($order->hardware_color()->name) }}}	</li>
	</ul>

	<h3>Measurements</h3>
	<ul class="no-bullet value-list">
		@foreach ($order->userMeasurements->measurement_names as $name)
			@if ($name == 'note')
				<li><br></li>
			@endif
			<li>
				@if ($order->userMeasurements->$name)
					<small class="list-key">{{{ ucwords(str_replace('_', ' ', $name)) }}}</small>
					<span class="list-value">
						@if ($name == 'note')
							<em>{{{ $order->userMeasurements->$name }}}</em>
						@elseif ($order->userMeasurements->units == 'in')
							<strong decimal-to-fraction="{{{ $order->userMeasurements->$name }}}">{{{ $order->userMeasurements->$name }}}</strong> "
						@else
							<strong>{{{ $order->userMeasurements->$name != round($order->userMeasurements->$name) ?  round($order->userMeasurements->$name, 1) : round($order->userMeasurements->$name) }}}</strong> cm
						@endif
					</span>
				@endif
			</li>
		@endforeach
	</ul>
		@if ($uncompleted_measurements = $order->userMeasurements->uncompleted())
			<div class="panel callout">
				<p>Looks like we still need the following measurements from you:</p>
				<ul class="text-left">
					@foreach ($uncompleted_measurements as $uncompleted_measurement)
						<li>{{{  ucwords(str_replace('_', ' ', $uncompleted_measurement)) }}}</li>
					@endforeach
				</ul>
				<a href="/orders/{{{ $order->id}}}/fit/{{{ array_shift($uncompleted_measurements) }}}" class="button hollow">Add Missing Measurements</a>
			</div>
		@endif

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
