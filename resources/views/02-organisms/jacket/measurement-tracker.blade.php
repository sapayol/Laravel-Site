<ul class="small-block-grid-4 measurement-tracker">
	<li>
			<a href="{{{ route('orders.fit', [$order->id, 'half_shoulder']) }}}" class="{{{ $step == 'half_shoulder' ? 'active' : ''  }}} {{{ $order->userMeasurements->half_shoulder ? 'valid' : ''  }}}">
			<div>
				<span>1/2 Shoulder</span>
				@if ($order->userMeasurements->half_shoulder)
					<span class="measurement-value">
						{{{ $order->userMeasurements->half_shoulder }}}<br><span class="measurement-units"> {{{ $order->userMeasurements->units }}}</span>
					</span>
				@endif
			</div>
		</a>
	</li>
	<li>
			<a href="{{{ route('orders.fit', [$order->id, 'back_width']) }}}" class="{{{ $step == 'back_width' ? 'active' : ''}}} {{{ $order->userMeasurements->back_width ? 'valid' : '' }}}">
			<div>
				<span>Back Width</span>
				@if ($order->userMeasurements->back_width)
					<span class="measurement-value">
						{{{ $order->userMeasurements->back_width }}}<br><span class="measurement-units"> {{{ $order->userMeasurements->units }}}</span>
					</span>
				@endif
			</div>
		</a>
	</li>
	<li>
			<a href="{{{ route('orders.fit', [$order->id, 'chest']) }}}" class="{{{ $step == 'chest' ? 'active' : ''}}} {{{ $order->userMeasurements->chest ? 'valid' : '' }}}">
			<div>
				<span>Chest</span>
				@if ($order->userMeasurements->chest)
					<span class="measurement-value">
						{{{ $order->userMeasurements->chest }}}<br><span class="measurement-units"> {{{ $order->userMeasurements->units }}}</span>
					</span>
				@endif
			</div>
		</a>
	</li>
	<li>
			<a href="{{{ route('orders.fit', [$order->id, 'stomach']) }}}" class="{{{ $step == 'stomach' ? 'active' : ''}}} {{{ $order->userMeasurements->stomach ? 'valid' : '' }}}">
			<div>
				<span>Stomach</span>
				@if ($order->userMeasurements->stomach)
					<span class="measurement-value">
						{{{ $order->userMeasurements->stomach }}}<br><span class="measurement-units"> {{{ $order->userMeasurements->units }}}</span>
					</span>
				@endif
			</div>
		</a>
	</li>
	<li>
			<a href="{{{ route('orders.fit', [$order->id, 'back_length']) }}}"class="{{{ $step == 'back_length' ? 'active' : ''}}} {{{ $order->userMeasurements->back_length ? 'valid' : '' }}}">
			<div>
				<span>Back Length</span>
				@if ($order->userMeasurements->back_length)
					<span class="measurement-value">
						{{{ $order->userMeasurements->back_length }}}<br><span class="measurement-units"> {{{ $order->userMeasurements->units }}}</span>
					</span>
				@endif
			</div>
		</a>
	</li>
	<li>
			<a href="{{{ route('orders.fit', [$order->id, 'waist']) }}}" class="{{{ $step == 'waist' ? 'active' : ''}}} {{{ $order->userMeasurements->waist ? 'valid' : '' }}}">
			<div>
				<span>Waist</span>
				@if ($order->userMeasurements->waist)
					<span class="measurement-value">
						{{{ $order->userMeasurements->waist }}}<br><span class="measurement-units"> {{{ $order->userMeasurements->units }}}</span>
					</span>
				@endif
			</div>
		</a>
	</li>
	<li>
			<a href="{{{ route('orders.fit', [$order->id, 'arm']) }}}" class="{{{ $step == 'arm' ? 'active' : ''}}} {{{ $order->userMeasurements->arm ? 'valid' : '' }}}">
			<div>
				<span>Arm</span>
				@if ($order->userMeasurements->arm)
					<span class="measurement-value">
						{{{ $order->userMeasurements->arm }}}<br><span class="measurement-units"> {{{ $order->userMeasurements->units }}}</span>
					</span>
				@endif
			</div>
		</a>
	</li>
	<li>
			<a href="{{{ route('orders.fit', [$order->id, 'biceps']) }}}" class="{{{ $step == 'biceps' ? 'active' : ''}}} {{{ $order->userMeasurements->biceps ? 'valid' : '' }}}">
			<div>
				<span>Biceps</span>
				@if ($order->userMeasurements->biceps)
					<span class="measurement-value">
						{{{ $order->userMeasurements->biceps }}}<br><span class="measurement-units"> {{{ $order->userMeasurements->units }}}</span>
					</span>
				@endif
			</div>
		</a>
	</li>
{{-- 	<li>
		<a class="hollow">
			<div>
				<span>0</span>
				<span> / 7</span>
			</div>
		</a>
	</li> --}}

</ul>
