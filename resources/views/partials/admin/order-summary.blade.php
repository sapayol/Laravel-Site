<ul class="no-bullet value-list" ng-show="!editMode">
	<li><small class="list-key">Number</small><span>{{{ $order->id }}}</span></li>
	<li class="multi-line"><small class="list-key">Status</small>
		<div>
			@if ($order->status == 'completed')
				<span class="list-value {{{ $order->status == 'completed' ? 'active' : '' }}}">Completed</span>
				<small>( {{{ date('Y-m-d h:i a', strtotime($order->completed_at)) }}} )</small><br>
			@endif
			@if ($order->statusIsAfter('production'))
				<span class="list-value {{{ $order->status == 'shipped' ? 'active' : '' }}}">Shipped</span>
				<small>( {{{ date('Y-m-d h:i a', strtotime($order->shipped_at)) }}} )</small><br>
			@endif
			@if ($order->statusIsAfter('paid'))
				<span class="list-value {{{ $order->status == 'production' ? 'active' : '' }}}">Production</span>
				<small>( {{{ date('Y-m-d h:i a', strtotime($order->production_at)) }}} )</small><br>
			@endif
			@if ($order->statusIsAfter('started'))
				<span class="list-value {{{ $order->status == 'paid' ? 'active' : '' }}}">Paid</span>
				<small>( {{{ date('Y-m-d h:i a', strtotime($order->paid_at)) }}} )</small><br>
			@endif
			@if ($order->statusIsAfter('new'))
				<span class="list-value {{{ $order->status == 'started' ? 'active' : '' }}}">Started</span>
				<small>( {{{ date('Y-m-d h:i a', strtotime($order->created_at)) }}} )</small><br>
			@endif
		</div>
	</li>
	@if ($order->status == 'shipped' || $order->statusIsAfter('shipped'))
		<li><small class="list-key">Tracking #</small><a target="_blank" href="https://www.google.com/#q={{{ $order->tracking_number }}}">{{{ $order->tracking_number }}}</a></li>
	@endif
</ul>