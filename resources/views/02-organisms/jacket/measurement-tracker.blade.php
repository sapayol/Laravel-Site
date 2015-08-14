<ul class="small-block-grid-4 measurement-tracker">
	<li>
		@if ($order->measurement->half_shoulder)
			<a href="#half_shoulder-section" class="valid">
		@else
			<a href="#half_shoulder-section">
		@endif
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
		@if ($order->measurement->back_width)
			<a href="#back_width-section" class="valid">
		@else
			<a href="#back_width-section">
		@endif
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
		@if ($order->measurement->chest)
			<a href="#chest-section" class="valid">
		@else
			<a href="#chest-section">
		@endif
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
		@if ($order->measurement->stomach)
			<a href="#stomach-section" class="valid">
		@else
			<a href="#stomach-section">
		@endif
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
		@if ($order->measurement->back_length)
			<a href="#jacket-length-section"class="valid">
		@else
			<a href="#jacket-length-sectio">
		@endif
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
		@if ($order->measurement->waist)
			<a href="#waist-section" class="valid">
		@else
			<a href="#waist-section">
		@endif
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
		@if ($order->measurement->arm)
			<a href="#arm-section" class="valid">
		@else
			<a href="#arm-section">
		@endif
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
		@if ($order->measurement->biceps)
			<a href="#biceps-section" class="valid">
		@else
			<a href="#biceps-section">
		@endif
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
