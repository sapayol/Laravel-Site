<h3 class="left">Customer</h3>
@if ($order->status !== 'completed')
	<a class="right value-list-action" ng-show="!editMode" ng-click="enterEditMode()">Edit</a>
@endif
<a class="right value-list-action" ng-show="editMode"  ng-click="updateUser()">Save</a>
<span class="right value-list-action" ng-show="editMode" > &nbsp; | &nbsp;</span>
<a class="right value-list-action" ng-show="editMode"  ng-click="editMode = !editMode">Cancel</a>
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