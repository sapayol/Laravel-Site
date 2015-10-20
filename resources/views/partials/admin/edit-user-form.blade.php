	<form  name="updateUserForm" class="editable-select" ng-submit="updateUser()">
		<label for="name" class="text-input-label">
			<span class="label-title">Name</span>
			<input id="name" name="name" type="text" ng-model="newData.user.name">
		</label>

		<label for="email" class="text-input-label">
			<span class="label-title">Email</span>
			<span class="right alert" ng-if="showErrors && userInfoForm.email.$invalid">Invalid email</span>
			<input id="email" name="email" type="email" ng-model="newData.user.email">
		</label>

		<label for="address1" class="text-input-label">
			<span class="label-title">Address 1</span>
			<input id="address1" name="address1" type="text" ng-model="newData.address.address1">
		</label>

		<label for="address2" class="text-input-label">
			<span class="label-title">Address 2</span>
			<input id="address2" name="address2" type="text" ng-model="newData.address.address2">
		</label>

		<label for="city" class="text-input-label">
			<span class="label-title">City</span>
			<input id="city" name="city" type="text" ng-model="newData.address.city">
		</label>

		<label for="postcode" class="text-input-label">
			<span class="label-title">Zip / Post Code</span>
			<input id="postcode" name="postcode" type="text" ng-model="newData.address.postcode">
		</label>

		<label for="province" class="text-input-label">
			<span class="label-title">State / Province</span>
			<input id="province" name="province" type="text" ng-model="newData.address.province">
		</label>

		<label for="country" class="text-input-label">
			<span class="label-title">Country</span>
			<input id="country" name="country" type="text" ng-model="newData.address.country">
		</label>
	</form>