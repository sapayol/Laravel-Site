<h3 class="left">Look</h3>
@if ($order->status !== 'completed' && $order->statusIsAfter('started'))
	<a class="right value-list-action" ng-show="!editMode" ng-click="enterEditMode()">Edit</a>
@endif
<a class="right value-list-action" ng-show="editMode"  ng-click="updateLook()">Save</a>
<span class="right value-list-action" ng-show="editMode" > &nbsp; | &nbsp;</span>
<a class="right value-list-action" ng-show="editMode"  ng-click="editMode = !editMode">Cancel</a>
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
  @if ($order->collar_color())
     <li><small class="list-key">Collar </small>@{{ attributes.collar_color.name.capitalize() }} </li>
  @endif
</ul>