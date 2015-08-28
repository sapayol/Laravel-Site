<h3 class="text-center">Your Measurements</h3>
<ul class="no-bullet value-list">
	<li>
		<span class="list-key">Your Height</span>
		@if ($order->userMeasurements->height)
			<span class="list-value"><strong>{{{ $order->userMeasurements->height}}}</strong> {{{ $order->userMeasurements->units }}}</span>
			<a class="underlined" href="/orders/{{{ $order->id }}}/fit/height" title=""><span>Change</span></a>
		@else
			<span class="list-value"></span>
			<a class="underlined" href="/orders/{{{ $order->id }}}/fit/height" title=""><span>Add</span></a>
		@endif
	</li>
	<li>
		<span class="list-key">Half Shoulder</span>
		@if ($order->userMeasurements->half_shoulder)
			<span class="list-value"><strong>{{{ $order->userMeasurements->half_shoulder}}}</strong> {{{ $order->userMeasurements->units }}}</span>
			<a class="underlined" href="/orders/{{{ $order->id }}}/fit/half_shoulder" title=""><span>Change</span></a>
		@else
			<span class="list-value"></span>
			<a class="underlined" href="/orders/{{{ $order->id }}}/fit/half_shoulder" title=""><span>Add</span></a>
		@endif
	</li>
	<li>
		<span class="list-key">Back Width</span>
		@if ($order->userMeasurements->back_width)
			<span class="list-value"><strong>{{{ $order->userMeasurements->back_width}}}</strong> {{{ $order->userMeasurements->units }}}</span>
			<a class="underlined" href="/orders/{{{ $order->id }}}/fit/back_width" title=""><span>Change</span></a>
		@else
			<span class="list-value"></span>
			<a class="underlined" href="/orders/{{{ $order->id }}}/fit/back_width" title=""><span>Add</span></a>
		@endif
	</li>
	<li>
		<span class="list-key">Chest</span>
		@if ($order->userMeasurements->chest)
			<span class="list-value"><strong>{{{ $order->userMeasurements->chest}}}</strong> {{{ $order->userMeasurements->units }}}</span>
			<a class="underlined" href="/orders/{{{ $order->id }}}/fit/chest" title=""><span>Change</span></a>
		@else
			<span class="list-value"></span>
			<a class="underlined" href="/orders/{{{ $order->id }}}/fit/chest" title=""><span>Add</span></a>
		@endif
	</li>
	<li>
		<span class="list-key">Belly / Stomach</span>
		@if ($order->userMeasurements->stomach)
			<span class="list-value"><strong>{{{ $order->userMeasurements->stomach}}}</strong> {{{ $order->userMeasurements->units }}}</span>
			<a class="underlined" href="/orders/{{{ $order->id }}}/fit/stomach" title=""><span>Change</span></a>
		@else
			<span class="list-value"></span>
			<a class="underlined" href="/orders/{{{ $order->id }}}/fit/stomach" title=""><span>Add</span></a>
		@endif
	</li>
	<li>
		<span class="list-key">Back Length</span>
		@if ($order->userMeasurements->back_length)
			<span class="list-value"><strong>{{{ $order->userMeasurements->back_length}}}</strong> {{{ $order->userMeasurements->units }}}</span>
			<a class="underlined" href="/orders/{{{ $order->id }}}/fit/back_length" title=""><span>Change</span></a>
		@else
			<span class="list-value"></span>
			<a class="underlined" href="/orders/{{{ $order->id }}}/fit/back_length" title=""><span>Add</span></a>
		@endif
	</li>
	<li>
		<span class="list-key">Waist</span>
		@if ($order->userMeasurements->waist)
			<span class="list-value"><strong>{{{ $order->userMeasurements->waist}}}</strong> {{{ $order->userMeasurements->units }}}</span>
			<a class="underlined" href="/orders/{{{ $order->id }}}/fit/waist" title=""><span>Change</span></a>
		@else
			<span class="list-value"></span>
			<a class="underlined" href="/orders/{{{ $order->id }}}/fit/waist" title=""><span>Add</span></a>
		@endif
	</li>
	<li>
		<span class="list-key">Arm</span>
		@if ($order->userMeasurements->arm)
			<span class="list-value"><strong>{{{ $order->userMeasurements->arm}}}</strong> {{{ $order->userMeasurements->units }}}</span>
			<a class="underlined" href="/orders/{{{ $order->id }}}/fit/arm" title=""><span>Change</span></a>
		@else
			<span class="list-value"></span>
			<a class="underlined" href="/orders/{{{ $order->id }}}/fit/arm" title=""><span>Add</span></a>
		@endif
	</li>
	<li>
		<span class="list-key">Biceps</span>
		@if ($order->userMeasurements->biceps)
			<span class="list-value"><strong>{{{ $order->userMeasurements->biceps}}}</strong> {{{ $order->userMeasurements->units }}}</span>
			<a class="underlined" href="/orders/{{{ $order->id }}}/fit/biceps" title=""><span>Change</span></a>
		@else
			<span class="list-value"></span>
			<a class="underlined" href="/orders/{{{ $order->id }}}/fit/biceps" title=""><span>Add</span></a>
		@endif
	</li>
	<li><br></li>
	<li>
		<span class="list-key">Note</span>
		@if ($order->userMeasurements->note)
			<span class="list-value">&nbsp;</span>
			<a class="underlined" href="/orders/{{{ $order->id }}}/fit/note" title=""><span>Change</span></a>
			<span class="list-value"><em>{{{ $order->userMeasurements->note}}}</em></span>
		@else
			<span class="list-value"></span>
			<a class="underlined" href="/orders/{{{ $order->id }}}/fit/note" title=""><span>Add</span></a>
		@endif
	</li>
</ul>


<div>
	@if ($order->userMeasurements->units == 'in')
		<a class="underlined">Switch to <strong>centimeters</strong></a>
	@else
		<a class="underlined">Switch to <strong>inches</strong></a>
	@endif
</div>
