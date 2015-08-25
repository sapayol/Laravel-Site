<ul class="small-block-grid-4 measurement-tracker5">
	<li>
			<a href="{{{ route('orders.fit', [$order->id, 'half_shoulder']) }}}" class="{{{ $step == 'half_shoulder' ? 'active' : ''  }}} {{{ $order->userMeasurements->half_shoulder ? 'valid' : ''  }}}">
			<div>
				<span class="measurement-title">1/2 Shoulder</span>
				@if ($order->userMeasurements->half_shoulder)
					<span class="measurement-value">
						{{{ $order->userMeasurements->half_shoulder }}}<span class="measurement-units"> {{{ $order->userMeasurements->units }}}</span>
					</span>
				@endif
			</div>
			<div class="measurement-marker"></div>
		</a>
	</li>
	<li>
			<a href="{{{ route('orders.fit', [$order->id, 'back_width']) }}}" class="{{{ $step == 'back_width' ? 'active' : ''}}} {{{ $order->userMeasurements->back_width ? 'valid' : '' }}}">
			<div>
				<span class="measurement-title">Back Width</span>
				@if ($order->userMeasurements->back_width)
					<span class="measurement-value">
						{{{ $order->userMeasurements->back_width }}}<span class="measurement-units"> {{{ $order->userMeasurements->units }}}</span>
					</span>
				@endif
			</div>
			<div class="measurement-marker"></div>
		</a>
	</li>
	<li>
			<a href="{{{ route('orders.fit', [$order->id, 'chest']) }}}" class="{{{ $step == 'chest' ? 'active' : ''}}} {{{ $order->userMeasurements->chest ? 'valid' : '' }}}">
			<div>
				<span class="measurement-title">Chest</span>
				@if ($order->userMeasurements->chest)
					<span class="measurement-value">
						{{{ $order->userMeasurements->chest }}}<span class="measurement-units"> {{{ $order->userMeasurements->units }}}</span>
					</span>
				@endif
			</div>
			<div class="measurement-marker"></div>
		</a>
	</li>
	<li>
			<a href="{{{ route('orders.fit', [$order->id, 'stomach']) }}}" class="{{{ $step == 'stomach' ? 'active' : ''}}} {{{ $order->userMeasurements->stomach ? 'valid' : '' }}}">
			<div>
				<span class="measurement-title">Stomach</span>
				@if ($order->userMeasurements->stomach)
					<span class="measurement-value">
						{{{ $order->userMeasurements->stomach }}}<span class="measurement-units"> {{{ $order->userMeasurements->units }}}</span>
					</span>
				@endif
			</div>
			<div class="measurement-marker"></div>
		</a>
	</li>
	<li>
			<a href="{{{ route('orders.fit', [$order->id, 'back_length']) }}}"class="{{{ $step == 'back_length' ? 'active' : ''}}} {{{ $order->userMeasurements->back_length ? 'valid' : '' }}}">
			<div>
				<span class="measurement-title">Back Length</span>
				@if ($order->userMeasurements->back_length)
					<span class="measurement-value">
						{{{ $order->userMeasurements->back_length }}}<span class="measurement-units"> {{{ $order->userMeasurements->units }}}</span>
					</span>
				@endif
			</div>
			<div class="measurement-marker"></div>
		</a>
	</li>
	<li>
			<a href="{{{ route('orders.fit', [$order->id, 'waist']) }}}" class="{{{ $step == 'waist' ? 'active' : ''}}} {{{ $order->userMeasurements->waist ? 'valid' : '' }}}">
			<div>
				<span class="measurement-title">Waist</span>
				@if ($order->userMeasurements->waist)
					<span class="measurement-value">
						{{{ $order->userMeasurements->waist }}}<span class="measurement-units"> {{{ $order->userMeasurements->units }}}</span>
					</span>
				@endif
			</div>
			<div class="measurement-marker"></div>
		</a>
	</li>
	<li>
			<a href="{{{ route('orders.fit', [$order->id, 'arm']) }}}" class="{{{ $step == 'arm' ? 'active' : ''}}} {{{ $order->userMeasurements->arm ? 'valid' : '' }}}">
			<div>
				<span class="measurement-title">Arm</span>
				@if ($order->userMeasurements->arm)
					<span class="measurement-value">
						{{{ $order->userMeasurements->arm }}}<span class="measurement-units"> {{{ $order->userMeasurements->units }}}</span>
					</span>
				@endif
			</div>
			<div class="measurement-marker"></div>
		</a>
	</li>
	<li>
			<a href="{{{ route('orders.fit', [$order->id, 'biceps']) }}}" class="{{{ $step == 'biceps' ? 'active' : ''}}} {{{ $order->userMeasurements->biceps ? 'valid' : '' }}}">
			<div>
				<span class="measurement-title">Biceps</span>
				@if ($order->userMeasurements->biceps)
					<span class="measurement-value">
						{{{ $order->userMeasurements->biceps }}}<span class="measurement-units"> {{{ $order->userMeasurements->units }}}</span>
					</span>
				@endif
			</div>
			<div class="measurement-marker"></div>
		</a>
	</li>
</ul>
