@extends('layouts/default')

@section('page_wrap_class')
	four-levels
@endsection


@section('main')
	<section class="large-12 medium-12 small-12 columns" ng-controller="authCtrl">
		@if (count($errors) > 0)
			<div ng-hide="hideAlert" data-alert class="alert-box alert floating animated shake" ng-init="hideAlert = false">
				<ul class="no-bullet">
					@foreach ($errors->all() as $error)
						<li><small>{{ $error }}</small></li>
					@endforeach
				</ul>
			  <a href="#" class="close" ng-click="hideAlert = true">&times;</a>
			</div>
		@endif
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

			<label for="name" ng-hide="resetMode">Confirm Password
				<span class="right alert" ng-if="showUserErorrs && userInfoForm.name.$invalid">Required</span>
				<input name="password_confirmation" type="password" ng-model="user.password_confirmation" ng-required="true" ng-disabled="userInfoSubmitted">
			</label>

			<div class="text-center">
				<input class="button expand animated slideInDown" type="submit" value="Reset Password">
				<a ng-click="resetMode = false" class="underlined under-button-link">Try logging in again</a>
				<br>
			</div>
		</form>
	</section>
@endsection
