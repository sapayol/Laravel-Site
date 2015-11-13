@extends('layouts/email')

@section('title')
	A new {{{ $order->jacket->name }}} has been ordered
@stop

@section('row1')
	Someone just ordered a new {{{ $order->jacket->name }}} on sapayol.com
@stop

@section('row2')
	Here is the order: <a href="https://sapayol.com/orders/{{{ $order->id }}}">{{{ $order->id }}}</a>
@stop