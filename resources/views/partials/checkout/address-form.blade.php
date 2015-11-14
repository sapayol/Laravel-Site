<form ng-submit="submitAddress({{{ $order->id }}})" name="addressForm">
	<label for="email" class="text-input-label">
		<span class="label-title">Email</span>
		<input id="email" name="email" type="text" disabled value="{{{ $order->user->email }}}">
	</label>

	<label for="name" class="text-input-label">
		<span class="label-title">Name</span>
		<span class="right" ng-if="showAddressErorrs && addressForm.name.$invalid">Required</span>
		<input id="name" name="name" type="text" ng-model="address.name" ng-required="true" ng-disabled="addressDisabled" autofocus>
	</label>

	<label for="address1" class="text-input-label">
		<span class="label-title">Address 1</span>
		<span class="right" ng-if="showAddressErorrs && addressForm.address1.$invalid">Required</span>
		<input id="address1" name="address1" type="text" ng-model="address.address1" ng-required="true" ng-disabled="addressDisabled">
	</label>

	<label for="address2" class="text-input-label">
		<span class="label-title">Address 2</span>
		<input id="address2" name="address2" type="text" ng-model="address.address2" ng-disabled="addressDisabled">
	</label>

	<label for="city" class="text-input-label">
		<span class="label-title">City</span>
		<span class="right" ng-if="showAddressErorrs && addressForm.city.$invalid">Required</span>
		<input id="city" name="city" type="text" ng-model="address.city" ng-required="true" ng-disabled="addressDisabled">
	</label>

	<label for="postcode" class="text-input-label">
		<span class="label-title">Zip / Post Code</span>
		<span class="right" ng-if="showAddressErorrs && addressForm.postcode.$invalid">Required</span>
		<input id="postcode" name="postcode" type="text" ng-model="address.postcode" ng-required="true" ng-disabled="addressDisabled">
	</label>

	<label for="province" class="text-input-label">
		<span class="label-title">State / Province</span>
		<span class="right" ng-if="showAddressErorrs && addressForm.province.$invalid">Required</span>
		<input id="province" name="province" type="text" ng-model="address.province" ng-required="true" ng-disabled="addressDisabled">
	</label>

	<label for="country" class="text-input-label retain-border">
		<span class="label-title">Country</span>
		<span class="right" ng-if="showAddressErorrs && addressForm.country.$invalid">Required</span>
		<input id="country" name="country" type="text" ng-model="address.country" ng-required="true" ng-disabled="addressDisabled">
	</label>

	<input ng-if="address.address1 && addressSubmitted" class="button expand" type="submit" value="Update Address" ng-hide="addressDisabled">
	<input ng-if="!address.address1 || !addressSubmitted" class="button expand" type="submit" value="Proceed To Payment Info" ng-hide="addressDisabled">
</form>