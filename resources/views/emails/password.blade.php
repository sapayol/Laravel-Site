@extends('layouts/email')

@section('title')
	Reset your Sapayol password
@stop

@section('row1')
	<p>
		Looks like you requested to reset your password on sapayol.com
	</p>
	<br>
@stop

@section('row2')

	<div class="text-center">
		<a href=" {{ env('SITE_URL') . ('/password/reset/'.$token) }}" class="button">Reset Your Password</a>
	</div>
@stop

@section('row3')
	<p>
	<br><br>
		If this request was not made by you, please let us know by replying to this email.
	</p>
@stop