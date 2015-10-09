@extends('layouts/email')

@section('title')
	Final measurements for your {{{ $order->jacket->name }}}
@stop

@section('main')
	Hi {{{ $order->user->name }}},
	This email confirms what we’ve been discussing regarding the fit of your {{{ $order->jacket->name }}}. Please take a close look again at the final measurements and let us know within the next 12 hours if you see something unexpected.
	Our tailors are going to work on your jacket based on the following measurements:

	BODY MEASUREMENTS TABLE
	JACKET MEASUREMENTS TABLE
	NOTES

	Order Number:
	Shipping Address:
	Order Summary:
	Model:
	Look:
@stop