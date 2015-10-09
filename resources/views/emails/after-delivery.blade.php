@extends('layouts/email')

@section('title')
	About the {{{ $order->jacket->name }}} you just received
@stop

@section('main')
	Hi {{{ $order->user->name }}},
	We hope that you already had the time to try on your custom-tailored {{{ $order->jacket->name }}}.
	How does it feel?
	We would love to hear from you, since we don’t get to see your reaction when you put on your jacket.
	Any feedback, a simple line or a picture would help us in our commitment to guarantee your satisfaction and our desire to always improve.
	We will soon offer a flight jacket and a moto. Sign up here if you would like to be one of the first to know about them.
	Put your {{{ $order->jacket->name }}} on a nice, wide hanger when you’re not wearing it.
	LINK TO CARE INFORMATION

	SAPAYOL is based on the concept of doing things your way, of getting off the beaten path, and exploring new ideas or places. Our jackets are designed to be your companion on that road.
	In that sense, go on, be special. Because regular doesn’t fit you.
@stop