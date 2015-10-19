@extends('layouts/email')

@section('title')
	A new {{{ $order->jacket->name }}} has been ordered
@stop

@section('main')

	Someone just ordered a new {{{ $order->jacket->name }}} on sapayol.com

	Here is the order: <a href="https://sapayol.com/orders/{{{ $order->id }}}">{{{ $order->id }}}</a>

@stop