@extends('layouts/email')

@section('title')
	Reset your Sapayol password
@stop

@section('main')

	Click here to reset your password: {{ url('password/reset/'.$token) }}

	If this request was not made by you, please let us know by replying to this email.

@stop