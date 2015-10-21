@extends('layouts/default')

@section('page_wrap_class')
	four-levels
@endsection


@section('main')
	<section class="large-12 medium-12 small-12 columns">
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

			<div class="text-center">
				<input class="button expand animated slideInDown" type="submit" value="Reset Password">
				<a ng-click="resetMode = false" class="underlined under-button-link">Try logging in again</a>
				<br>
			</div>
		</form>
	</section>
@endsection
