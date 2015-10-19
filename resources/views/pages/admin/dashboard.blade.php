@extends('layouts/default')

@section('title')
	Sapayol Admin
@stop

@section('main')

<h1>Latest Orders</h1>
<a href="{{{ route('admin.order-index') }}}">All Orders</a>

@stop
