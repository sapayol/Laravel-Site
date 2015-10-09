@extends('layouts/email')

@section('title')
	Ready to finalize your jacket?
@stop

@section('main')

	Hi {{{ $order->user->name }}}.
	I see that you’ve started to individualize a custom tailored {{{ $order->jacket->name }}}.
	We’ve saved the work you’ve done so far and you can pick up right where you left off.
	Just click here to finalize it.
	If you have any questions or concerns, reply to this email and I’ll get back to you.

	FOLLOW US ON INSTAGRAM

@stop