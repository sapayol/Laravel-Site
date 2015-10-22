<form  name="updateUserForm" class="editable-select" ng-submit="updateMeasurements()">
	<div class="row">
		<div class="large-2 medium-2 small-6 columns  measurement-entry">
			<label for="height" class="text-input-label">
				<span class="label-title">Height</span>
				<input id="height" name="height" type="text" ng-model="newData.user_measurements.height">
				<span class="input-units">{{{ $order->bodyMeasurements->units }}}</span>
			</label>
			<label for="half_shoulder" class="text-input-label">
				<span class="label-title">Half Shoulder</span>
				<input id="half_shoulder" name="half_shoulder" type="text" ng-model="newData.user_measurements.half_shoulder">
				<span class="input-units">{{{ $order->bodyMeasurements->units }}}</span>
			</label>
			<label for="back_width" class="text-input-label">
				<span class="label-title">Back Width</span>
				<input id="back_width" name="back_width" type="text" ng-model="newData.user_measurements.back_width">
				<span class="input-units">{{{ $order->bodyMeasurements->units }}}</span>
			</label>
			<label for="chest" class="text-input-label">
				<span class="label-title">Chest</span>
				<input id="chest" name="chest" type="text" ng-model="newData.user_measurements.chest">
				<span class="input-units">{{{ $order->bodyMeasurements->units }}}</span>
			</label>
			<label for="stomach" class="text-input-label">
				<span class="label-title">Stomach</span>
				<input id="stomach" name="stomach" type="text" ng-model="newData.user_measurements.stomach">
				<span class="input-units">{{{ $order->bodyMeasurements->units }}}</span>
			</label>
			<label for="back_length" class="text-input-label">
				<span class="label-title">Back Length</span>
				<input id="back_length" name="back_length" type="text" ng-model="newData.user_measurements.back_length">
				<span class="input-units">{{{ $order->bodyMeasurements->units }}}</span>
			</label>
			<label for="waist" class="text-input-label">
				<span class="label-title">Waist</span>
				<input id="waist" name="waist" type="text" ng-model="newData.user_measurements.waist">
				<span class="input-units">{{{ $order->bodyMeasurements->units }}}</span>
			</label>
			<label for="arm" class="text-input-label">
				<span class="label-title">Arm</span>
				<input id="arm" name="arm" type="text" ng-model="newData.user_measurements.arm">
				<span class="input-units">{{{ $order->bodyMeasurements->units }}}</span>
			</label>
			<label for="biceps" class="text-input-label">
				<span class="label-title">Biceps</span>
				<input id="biceps" name="biceps" type="text" ng-model="newData.user_measurements.biceps">
				<span class="input-units">{{{ $order->bodyMeasurements->units }}}</span>
			</label>
		</div>
	</div>
	<div class="row">
		<div class="large-2 medium-2 small-12 columns">
			<br>
			<br>
			<label for="note" class="text-input-label">
				<span class="label-title">Note</span>
				<textarea name="note" id="note" rows="6" ng-model="newData.user_measurements.note"></textarea>
				<span class="input-units">@{{ units }}</span>
			</label>
		</div>
	</div>
</form>