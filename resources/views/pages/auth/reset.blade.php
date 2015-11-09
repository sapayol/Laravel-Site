@extends('layouts/default')

@section('title')
	Password Reset
@endsection

@section('header')
	<a ng-click="displayMenu = false">Password Reset</a>
@endsection

@section('main')
	<section class="large-4 medium-6 small-12 medium-centered columns">
		<br><br>
		<form role="form" method="POST" action="/password/reset" name="passwordResetForm">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<input type="hidden" name="token" value="{{ $token }}">
			<label for="email" class="text-input-label">
				<span class="label-title">Email Address</span>
				<input name="email" type="email" value="{{ old('email') }}"  ng-required="true">
			</label>
			<label for="password" class="text-input-label">
				<span class="label-title">New Password</span>
				<input name="password" type="password" ng-required="true">
			</label>
			<label for="password_confirmation" class="text-input-label">
				<span class="label-title">Confirm Password</span>
				<input name="password_confirmation" type="password" ng-required="true">
			</label>
			<input class="button expand animated slideInDown" type="submit" value="Reset Password">
		</form>
	</section>
@endsection
