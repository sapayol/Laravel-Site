@extends('layouts/default')

@section('title')
	Login
@endsection

@section('header')
	<a ng-click="displayMenu = false">Login</a>
@endsection

@section('main')
	<section class="large-4 medium-7 small-12 medium-centered columns" ng-controller="authCtrl">
		<br><br>
		<form role="form" method="POST" action="{{ url('/auth/login') }}" name="userInfoForm">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<label for="email" class="text-input-label">
				<span class="label-title">Email Address</span>
				<span class="right alert" ng-if="showUserErorrs && userInfoForm.email.$invalid">Invalid email</span>
				<input id="email" name="email" type="email" value="{{ old('email') }}" ng-model="user.email" ng-required="true" ng-disabled="userInfoSubmitted">
			</label>
			<label for="password" ng-hide="resetMode" class="text-input-label">
				<span class="label-title">Password</span>
				<span class="right alert" ng-if="showUserErorrs && userInfoForm.name.$invalid">Required</span>
				<input id="password" name="password" type="password" ng-model="user.password" ng-required="true" ng-disabled="userInfoSubmitted">
			</label>
			<div class="text-center">
				<input class="button expand animated slideInDown" type="submit" value="Log in" ng-hide="resetMode">
				<input class="button expand animated slideInUp" type="button" ng-click="resetPassword()" value="Request password reset" ng-hide="!resetMode">
				<a ng-click="resetMode = true" class="underlined under-button-link" ng-hide="resetMode">Reset my password</a>
				<a ng-click="resetMode = false" class="underlined under-button-link animated slideInUp" ng-hide="!resetMode">Try logging in again</a>
			</div>
		</form>
	</section>
@endsection