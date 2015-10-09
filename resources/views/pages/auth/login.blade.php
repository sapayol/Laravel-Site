@extends('layouts/default')


@section('page_wrap_class')
	four-levels
@endsection


@section('main')
	<section class="large-12 medium-12 small-12 columns" ng-controller="authCtrl">
		<form role="form" method="POST" action="{{ url('/auth/login') }}" name="userInfoForm">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<label for="email">Email Address
				<span class="right alert" ng-if="showUserErorrs && userInfoForm.email.$invalid">Invalid email</span>
				<input name="email" type="email" value="{{ old('email') }}" ng-model="user.email" ng-required="true" ng-disabled="userInfoSubmitted">
			</label>

			<label for="name" ng-hide="resetMode">Password
				<span class="right alert" ng-if="showUserErorrs && userInfoForm.name.$invalid">Required</span>
				<input name="password" type="password" ng-model="user.password" ng-required="true" ng-disabled="userInfoSubmitted">
			</label>

			<div class="text-center">
				<input class="button expand animated slideInDown" type="submit" value="Login" ng-hide="resetMode">
				<input class="button expand animated slideInUp" type="button" ng-click="resetPassword()" value="Request password reset" ng-hide="!resetMode">
				<a ng-click="resetMode = true" class="underlined under-button-link" ng-hide="resetMode">Reset my password</a>
				<a ng-click="resetMode = false" class="underlined under-button-link animated slideInUp" ng-hide="!resetMode">Try logging in again</a>
				<br>
			</div>
		</form>
	</section>
@endsection