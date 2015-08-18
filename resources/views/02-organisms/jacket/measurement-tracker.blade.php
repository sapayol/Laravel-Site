<div class="measurement-tracker-offset"></div>
<ul class="small-block-grid-4 measurement-tracker">
	<li>
			<a href="{{{ route('orders.fit', [$order->id, 'half-shoulder']) }}}" class="{{{ $step == 'half-shoulder' ? 'active' : ''  }}} {{{ $order->measurement->half_shoulder ? 'valid' : ''  }}}">
			<div>
				<span>1/2 Shoulder</span>
				@if ($order->measurement->half_shoulder)
					<span class="measurement-value">
						{{{ $order->measurement->half_shoulder }}}<br><span class="measurement-units"> {{{ $order->measurement->units }}}</span>
					</span>
				@endif
			</div>
		</a>
	</li>
	<li>
			<a href="{{{ route('orders.fit', [$order->id, 'back-width']) }}}" class="{{{ $step == 'back-width' ? 'active' : ''}}} {{{ $order->measurement->back_width ? 'valid' : '' }}}">
			<div>
				<span>Back Width</span>
				@if ($order->measurement->back_width)
					<span class="measurement-value">
						{{{ $order->measurement->back_width }}}<br><span class="measurement-units"> {{{ $order->measurement->units }}}</span>
					</span>
				@endif
			</div>
		</a>
	</li>
	<li>
			<a href="{{{ route('orders.fit', [$order->id, 'chest']) }}}" class="{{{ $step == 'chest' ? 'active' : ''}}} {{{ $order->measurement->chest ? 'valid' : '' }}}">
			<div>
				<span>Chest</span>
				@if ($order->measurement->chest)
					<span class="measurement-value">
						{{{ $order->measurement->chest }}}<br><span class="measurement-units"> {{{ $order->measurement->units }}}</span>
					</span>
				@endif
			</div>
		</a>
	</li>
	<li>
			<a href="{{{ route('orders.fit', [$order->id, 'stomach']) }}}" class="{{{ $step == 'stomach' ? 'active' : ''}}} {{{ $order->measurement->stomach ? 'valid' : '' }}}">
			<div>
				<span>Stomach</span>
				@if ($order->measurement->stomach)
					<span class="measurement-value">
						{{{ $order->measurement->stomach }}}<br><span class="measurement-units"> {{{ $order->measurement->units }}}</span>
					</span>
				@endif
			</div>
		</a>
	</li>
	<li>
			<a href="{{{ route('orders.fit', [$order->id, 'back-length']) }}}"class="{{{ $step == 'back-length' ? 'active' : ''}}} {{{ $order->measurement->back_length ? 'valid' : '' }}}">
			<div>
				<span>Back Length</span>
				@if ($order->measurement->back_length)
					<span class="measurement-value">
						{{{ $order->measurement->back_length }}}<br><span class="measurement-units"> {{{ $order->measurement->units }}}</span>
					</span>
				@endif
			</div>
		</a>
	</li>
	<li>
			<a href="{{{ route('orders.fit', [$order->id, 'waist']) }}}" class="{{{ $step == 'waist' ? 'active' : ''}}} {{{ $order->measurement->waist ? 'valid' : '' }}}">
			<div>
				<span>Waist</span>
				@if ($order->measurement->waist)
					<span class="measurement-value">
						{{{ $order->measurement->waist }}}<br><span class="measurement-units"> {{{ $order->measurement->units }}}</span>
					</span>
				@endif
			</div>
		</a>
	</li>
	<li>
			<a href="{{{ route('orders.fit', [$order->id, 'arm']) }}}" class="{{{ $step == 'arm' ? 'active' : ''}}} {{{ $order->measurement->arm ? 'valid' : '' }}}">
			<div>
				<span>Arm</span>
				@if ($order->measurement->arm)
					<span class="measurement-value">
						{{{ $order->measurement->arm }}}<br><span class="measurement-units"> {{{ $order->measurement->units }}}</span>
					</span>
				@endif
			</div>
		</a>
	</li>
	<li>
			<a href="{{{ route('orders.fit', [$order->id, 'biceps']) }}}" class="{{{ $step == 'biceps' ? 'active' : ''}}} {{{ $order->measurement->biceps ? 'valid' : '' }}}">
			<div>
				<span>Biceps</span>
				@if ($order->measurement->biceps)
					<span class="measurement-value">
						{{{ $order->measurement->biceps }}}<br><span class="measurement-units"> {{{ $order->measurement->units }}}</span>
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
