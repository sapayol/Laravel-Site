<form ng-submit="submitUserInfo({{{ $order->id }}})" name="userInfoForm">
	<label for="name">Name
		<span class="right" ng-if="showUserErorrs && userInfoForm.name.$invalid">Required</span>
		<input name="name" type="text" ng-model="user.name" ng-required="true" ng-disabled="userInfoSubmitted">
	</label>

	<label for="email">Email Address
		<span class="right" ng-if="showUserErorrs && userInfoForm.email.$invalid">Invalid email</span>
		<input name="email" type="email" ng-model="user.email" ng-required="true" ng-disabled="userInfoSubmitted">
	</label>

	<input class="button expand" type="submit" value="Proceed To Shipping Info" ng-hide="userInfoSubmitted">
</form>