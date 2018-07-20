<form class="editable-select" ng-submit="updateMeasurements({{{ $type }}})">
	<div class="row collapse">
		<div class="measurement-entry">
			<label for="{{{ $type }}}-height" class="text-input-label">
				<span class="label-title">Height</span>
				<input id="height" name="{{{ $type }}}-height" type="text" ng-model="newData.{{{ $type }}}.height">
				<span class="input-units">{{{ $order->bodyMeasurements->units }}}</span>
			</label>
			<label for="{{{ $type }}}-half_shoulder" class="text-input-label">
				<span class="label-title">Half Shoulder</span>
				<input id="half_shoulder" name="{{{ $type }}}-half_shoulder" type="text" ng-model="newData.{{{ $type }}}.half_shoulder">
				<span class="input-units">{{{ $order->bodyMeasurements->units }}}</span>
			</label>
			<label for="{{{ $type }}}-back_width" class="text-input-label">
				<span class="label-title">Back Width</span>
				<input id="back_width" name="{{{ $type }}}-back_width" type="text" ng-model="newData.{{{ $type }}}.back_width">
				<span class="input-units">{{{ $order->bodyMeasurements->units }}}</span>
			</label>
			<label for="{{{ $type }}}-chest" class="text-input-label">
				<span class="label-title">Chest</span>
				<input id="chest" name="{{{ $type }}}-chest" type="text" ng-model="newData.{{{ $type }}}.chest">
				<span class="input-units">{{{ $order->bodyMeasurements->units }}}</span>
			</label>
			<label for="{{{ $type }}}-stomach" class="text-input-label">
				<span class="label-title">Stomach</span>
				<input id="stomach" name="{{{ $type }}}-stomach" type="text" ng-model="newData.{{{ $type }}}.stomach">
				<span class="input-units">{{{ $order->bodyMeasurements->units }}}</span>
			</label>
			<label for="{{{ $type }}}-back_length" class="text-input-label">
				<span class="label-title">Back Length</span>
				<input id="back_length" name="{{{ $type }}}-back_length" type="text" ng-model="newData.{{{ $type }}}.back_length">
				<span class="input-units">{{{ $order->bodyMeasurements->units }}}</span>
			</label>
			<label for="{{{ $type }}}-waist" class="text-input-label">
				<span class="label-title">Waist</span>
				<input id="waist" name="{{{ $type }}}-waist" type="text" ng-model="newData.{{{ $type }}}.waist">
				<span class="input-units">{{{ $order->bodyMeasurements->units }}}</span>
			</label>
			<label for="{{{ $type }}}-arm" class="text-input-label">
				<span class="label-title">Arm</span>
				<input id="arm" name="{{{ $type }}}-arm" type="text" ng-model="newData.{{{ $type }}}.arm">
				<span class="input-units">{{{ $order->bodyMeasurements->units }}}</span>
			</label>
			<label for="{{{ $type }}}-biceps" class="text-input-label">
				<span class="label-title">Biceps</span>
				<input id="biceps" name="{{{ $type }}}-biceps" type="text" ng-model="newData.{{{ $type }}}.biceps">
				<span class="input-units">{{{ $order->bodyMeasurements->units }}}</span>
			</label>
			<br>
			<br>
			<label for="{{{ $type }}}-note" class="text-input-label">
				<span class="label-title">Note</span>
				<textarea name="{{{ $type }}}-note" id="note" rows="6" ng-model="newData.{{{ $type }}}.note"></textarea>
				<span class="input-units">@{{ units }}</span>
			</label>
		</div>
	</div>
</form>