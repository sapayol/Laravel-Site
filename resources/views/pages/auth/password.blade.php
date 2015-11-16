@extends('layouts/default')

@section('title')
Password
@endsection

@section('main')
	<section class="large-4 medium-6 small-12 medium-centered columns">
		<br><br>
		@if (session('status'))
			<div class="alert alert-success">
				{{ session('status') }}
			</div>
		@endif
		<form class="form-horizontal" role="form" method="POST" action="{{ url('/password/email') }}">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<label class="text-input-label">
				<span class="label-title">E-Mail Address</span>
				<input type="email" class="form-control" name="email" value="{{ old('email') }}">
			</label>
			<button type="submit" class="button expand">
				Send Password Reset Link
			</button>
		</form>
	</section>
@endsection
