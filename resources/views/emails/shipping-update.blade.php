@extends('layouts/email')

@section('title')
	Shipping update for your {{{ $order->jacket->name }}}
@stop

@section('main')
	Order Number: {{{ $order->id }}}

	Hi …,
	There’s an update from our courier regarding your {{{ $order->jacket->name }}}.
	You can track your package here:
	LINK TO TRACKING (TRACKING NUMBER)
@stop