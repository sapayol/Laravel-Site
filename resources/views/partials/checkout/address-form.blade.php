<form ng-submit="submitAddress({{{ $order->id }}})" name="addressForm">
	<label for="name">Name
		<span class="right" ng-if="showAddressErorrs && addressForm.name.$invalid">Required</span>
		<input name="name" type="text" ng-model="address.name" ng-required="true" ng-disabled="addressDisabled">
	</label>

	<label for="address1">Address 1
		<span class="right" ng-if="showAddressErorrs && addressForm.address1.$invalid">Required</span>
		<input name="address1" type="text" ng-model="address.address1" ng-required="true" ng-disabled="addressDisabled">
	</label>

	<label for="address2">Address 2
		<input name="address2" type="text" ng-model="address.address2" ng-disabled="addressDisabled">
	</label>

	<label for="city">City
		<span class="right" ng-if="showAddressErorrs && addressForm.city.$invalid">Required</span>
		<input name="city" type="text" ng-model="address.city" ng-required="true" ng-disabled="addressDisabled">
	</label>

	<label for="postcode">Zip / Post Code
		<span class="right" ng-if="showAddressErorrs && addressForm.postcode.$invalid">Required</span>
		<input name="postcode" type="text" ng-model="address.postcode" ng-required="true" ng-disabled="addressDisabled">
	</label>

	<label for="province">State / Province
		<span class="right" ng-if="showAddressErorrs && addressForm.province.$invalid">Required</span>
		<input name="province" type="text" ng-model="address.province" ng-required="true" ng-disabled="addressDisabled">
	</label>

	<label for="country">Country
		<span class="right" ng-if="showAddressErorrs && addressForm.country.$invalid">Required</span>
		<input name="country" type="text" ng-model="address.country" ng-required="true" ng-disabled="addressDisabled">
	</label>

	<input ng-if="address.address1" class="button expand" type="submit" value="Update Address" ng-hide="addressDisabled">
	<input ng-if="!address.address1" class="button expand" type="submit" value="Proceed To Payment Info" ng-hide="addressDisabled">
</form>