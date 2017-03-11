<section ng-controller='lookAndFitCtrl' class="large-{{{ !empty($order) ? '12' : '10' }}} medium-12 small-12 large-centered columns look-options">
	@if (empty($order))
		<h2 class="thin text-center hide-for-medium-up">{{{ !empty($order) ? 'Change' : 'Design' }}} your look <br><br></h2>
	@endif
	<div class="lookDesigner {{ $currentPath = '/orders/{id}' ? 'reversed' : ''}}">
		@include('partials.jacket.look-options')
		@include('partials.jacket.look-image')
	</div>
	<br>
	@if (empty($order))
		@include('partials.jacket.auth')
	@endif
</section>
