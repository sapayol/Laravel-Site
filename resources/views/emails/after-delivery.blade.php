@extends('layouts/email')

@section('title')
	About the {{{ $order->jacket->name }}} you just received
@stop

@section('row1')
	Hi {{{ $order->user->name }}},
@stop

@section('row2')
	<p>
		We hope that you already had the time to try on your custom-tailored {{{ $order->jacket->name }}}.<br>
		How does it feel?<br>
	</p>
	<p>
		We would love to hear from you, since we don’t get to see your reaction when you put on your jacket.
		Any feedback, a simple line or a picture would help us in our commitment to guarantee your satisfaction and our desire to always improve. You can reply directly to this email if you want to reach out.
	</p>
	<p>
		Put your {{{ $order->jacket->name }}} on a nice, wide hanger when you’re not wearing it.
	</p>
@stop

@section('row3')
	<p>
    <a href="/care-instructions" class="button">See our Care Instructions</a>
  </p>
@stop

@section('row4')
	<p>
		<br>
		<br>
		<br>
		SAPAYOL is based on the concept of doing things your way, of getting off the beaten path, and exploring new ideas or 	places. Our jackets are designed to be your companion on that road.
		In that sense, go on, be special. <em>Because regular doesn’t fit you.</em>
	</p>
@stop
