<form name="userInfoForm" role="form">
	<label for="email">Email Address
		<span class="right" ng-if="showUserErorrs && userInfoForm.email.$invalid">Invalid email</span>
		<input name="email" type="email" ng-model="user.email" ng-required="true" ng-disabled="userInfoSubmitted">
	</label>

	<label for="name">Password
		<span class="right" ng-if="showUserErorrs && userInfoForm.name.$invalid">Required</span>
		<input name="name" type="password" ng-model="user.password" ng-required="true" ng-disabled="userInfoSubmitted">
	</label>

	<div class="text-center">
		<input class="button expand inverted-colors" type="button" ng-click=submitAuthRequest() value="Register / Login" ng-hide="userInfoSubmitted">
		<a href="" class="underlined under-button-link">Reset my password</a><br>
	</div>
</form>