<div class="row">
	@foreach (['body', 'product'] as $type)
		<div class="large-6 medium-6 medium-uncentered small-6 columns" ng-init="init( '{{{$type}}}' )" >
			<div class="value-list-controls">
				<h3 class="left">{{{ ucwords($type)}}}</h3>
				@if ($order->status !== 'completed' && $order->statusIsAfter('started'))
					<a class="right value-list-action" ng-show="!editMode" ng-click="enterEditMode()">Edit</a>
				@endif
			  <a class="right value-list-action" ng-show="editMode"  ng-click="updateMeasurements( '{{{ $type }}}' )">Save</a>
			  <span ng-show="editMode" > &nbsp; | &nbsp;</span>
			  <a class="right value-list-action" ng-show="editMode"  ng-click="editMode = !editMode">Cancel</a>
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