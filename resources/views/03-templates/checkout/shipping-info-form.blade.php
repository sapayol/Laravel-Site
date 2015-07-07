<form ng-submit="submitShippingInfo()" name="shippingInfoForm">
	<label for="address1">Address 1
		<span class="right" ng-if="showShippingErorrs && shippingInfoForm.address1.$invalid">Required</span>
		<input name="address1" type="text" ng-model="shipping.address1" ng-required="true" ng-disabled="shippingInfoSubmitted">
	</label>

	<label for="address2">Address 2
		<input name="address2" type="text" ng-model="shipping.address2" ng-disabled="shippingInfoSubmitted">
	</label>

	<label for="city">City
		<span class="right" ng-if="showShippingErorrs && shippingInfoForm.city.$invalid">Required</span>
		<input name="city" type="text" ng-model="shipping.city" ng-required="true" ng-disabled="shippingInfoSubmitted">
	</label>

	<label for="postcode">Zip / Post Code
		<span class="right" ng-if="showShippingErorrs && shippingInfoForm.postcode.$invalid">Required</span>
		<input name="postcode" type="text" ng-model="shipping.postcode" ng-required="true" ng-disabled="shippingInfoSubmitted">
	</label>

	<label for="province">State / Province
		<span class="right" ng-if="showShippingErorrs && shippingInfoForm.province.$invalid">Required</span>
		<input name="province" type="text" ng-model="shipping.province" ng-required="true" ng-disabled="shippingInfoSubmitted">
	</label>

	<label for="country">Country
		<span class="right" ng-if="showShippingErorrs && shippingInfoForm.country.$invalid">Required</span>
		<input name="country" type="text" ng-model="shipping.country" ng-required="true" ng-disabled="shippingInfoSubmitted">
	</label>

	<input class="button expand" type="submit" value="Proceed To Payment Info" ng-hide="shippingInfoSubmitted">
</form>