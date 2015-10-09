@extends('layouts/email')

@section('title')
	Our tailors have started working on your {{{ $order->jacket->name }}}
@stop

@section('main')
	Order Number: {{{ $order->id }}}
	Hi {{{ $order->user->name }}},
	Our tailors are working on your {{{ $order->jacket->name }}} right now. After cutting the necessary pieces from our leather, four tailors are involved in crafting your jacket during seven hours, at the minimum.
@stop


