<?php
 $JACKET_PAGE_WIDTH = 10;
 $ORDER_PAGE_WIDTH = 12;
 $width = !empty($order) ? $ORDER_PAGE_WIDTH : $JACKET_PAGE_WIDTH;
?>

<section id="design-your-look" ng-controller='lookAndFitCtrl' class="large-{{{ $width }}} medium-11 small-12 medium-centered columns look-options">
	@if (empty($order))
		<h2 class="thin text-center hide-for-medium-up">{{{ !empty($order) ? 'Change' : 'Design' }}} your look <br><br></h2>
	@endif
	<?php $orderPage = Request::route()->getName() === 'orders.show';	?>
	<div class="lookDesigner {{ $orderPage ? 'reversed' : ''}}">
		@include('partials.jacket.look-options')
		@include('partials.jacket.look-image')
	</div>
	<br>
	@if (empty($order))
		@include('partials.jacket.auth')
	@endif
</section>
