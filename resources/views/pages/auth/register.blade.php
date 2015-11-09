@extends('layouts/default')

@section('title')
	Register
@endsection

@section('header')
	<a ng-click="displayMenu = false">Register</a>
@endsection

@section('main')
	<section class="large-4 medium-7 small-12 medium-centered columns">
		<br><br>
		<form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/register') }}">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<label class="text-input-label">
				<span class="label-title">Name</span>
				<input type="text" class="form-control" name="name" value="{{ old('name') }}">
			</label>
			<label class="text-input-label">
				<span class="label-title">E-Mail Address</span>
				<input type="email" class="form-control" name="email" value="{{ old('email') }}">
			</label>
			<label class="text-input-label">
				<span class="label-title">Password</span>
				<input type="password" class="form-control" name="password">
			</label>
			<label class="text-input-label">
				<span class="label-title">Confirm Password</span>
				<input type="password" class="form-control" name="password_confirmation">
			</label>
			<button type="submit" class="button expand">
				Register
			</button>
		</form>
	</section>
@endsection
