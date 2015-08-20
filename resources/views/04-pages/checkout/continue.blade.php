@extends('03-templates/default')

@section('main')
	<section class="large-12 medium-12 small-12 columns">
		<p>Looks like you already have an order started</p>
		{{-- <h3 class="text-center thin">Look</h3> --}}
		<ul class="no-bullet value-list left">
			<li><small class="value-key">Date Started </small>  {{{ date('M d, Y', strtotime($last_order->created_at)) }}} </li>
			<li><small class="value-key">Jacket Name  </small>  {{{ $last_order->jacket->name }}} </li>
			@foreach ($last_order->attributes as $attribute)
				<li><small class="value-key">{{{ ucwords(str_replace('_', ' ', $attribute->type)) }}}</small> {{{ ucwords($attribute->name) }}} </li>
			@endforeach
		</ul>
	</section>

	<section class="large-12 medium-12 small-12 columns">
		<form action="/orders/{{{ $last_order->id }}}/fit" method="POST">
			<input type="hidden" name="_token"         value="{!! csrf_token() !!}">
			<input type="submit" class="button expand" value="Finish My Order">
		</form>
		<div class="text-center">or</div>
		<br>
		<form action="/orders/{{{ $last_order->id }}}/reset" method="POST">
			<input type="hidden" name="_token"                     value="{{{ csrf_token() }}}">
			<input type="hidden" name="_method"                    value="PATCH">
			<input type="hidden" name="user_id"                    value="{{{ $new_order['user_id'] }}}">
			<input type="hidden" name="model"                      value="{{{ $new_order['model'] }}}">
			<input type="hidden" name="jacket_look[leather_type]"       value="{{{ $new_order['jacket_look']['leather_type'] }}}">
			<input type="hidden" name="jacket_look[leather_color]"      value="{{{ $new_order['jacket_look']['leather_color'] }}}">
			<input type="hidden" name="jacket_look[lining_color]"       value="{{{ $new_order['jacket_look']['lining_color'] }}}">
			<input type="hidden" name="jacket_look[hardware_color]"     value="{{{ $new_order['jacket_look']['hardware_color'] }}}">
			<input type="submit" class="button expand hollow" value="Start a New Order">
			<label for="retain_measurements">
				<input type="checkbox" name="retain_measurements" id="retain_measurements">
				Carry over the measurements I already took
			</label>
		</form>
	</section>
@stop