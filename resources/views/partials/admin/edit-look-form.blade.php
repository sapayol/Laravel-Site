	<form name="updateLookForm" class="editable-select" ng-submit="updateLook()">
		<label for="leather_type" class="text-input-label">
			<span class="label-title">Leather Type</span>
		  <select id="leather_type" ng-model="selectedLeatherType" ng-show="editMode" ng-options="leather_type as leather_type.name for leather_type in options.leather_types">
			  <option></option>
	    </select>
		</label>

		<label for="leather_color" class="text-input-label">
			<span class="label-title">Leather Color</span>
		  <select id="leather_color" ng-model="selectedLeatherColor" ng-show="editMode" ng-options="leather_color as leather_color.name for leather_color in options.leather_colors">
			  <option></option>
	    </select>
		</label>

		<label for="lining_color" class="text-input-label">
			<span class="label-title">Lining Color</span>
		  <select id="lining_color" ng-model="selectedLiningColor" ng-show="editMode" ng-options="lining_color as lining_color.name for lining_color in options.lining_colors">
			  <option></option>
	    </select>
		</label>

		<label for="hardware_color" class="text-input-label">
			<span class="label-title">Hardware Color</span>
		  <select id="hardware_color" ng-model="selectedHardwareColor" ng-show="editMode" ng-options="hardware_color as hardware_color.name for hardware_color in options.hardware_colors">
			  <option></option>
	    </select>
		</label>
	</form>