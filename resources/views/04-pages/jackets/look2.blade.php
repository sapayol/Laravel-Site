@extends('03-templates/default')

@section('title')
	SAPAYOL | {{{ $jacket->name }}}
@stop


@section('main')

	<section class="large-12 medium-12 small-12 columns">
		<h2 class="thin">Choose You Look</h2>
		<br>
		<img src="/images/photos/jacket-1.jpg">

		<div class="large-6 medium-6 small-12 columns">
			<h3><small>Leather Type</small></h3>
			@if ($jacket->leather_types()->count() > 1)
				<ul class="button-group look-options">
					@foreach ($jacket->leather_types() as $leather_type)
				  	<li><a class="button small" ng-class="{active: leather_type == '{{{ $leather_type->name}}}' }" ng-click="leather_type = '{{{ $leather_type->name }}}'">{{{ $leather_type->name }}}</a></li>
					@endforeach
				</ul>
			@else
				{{{ $jacket->leather_types()->first()->name }}}
			@endif
		</div>

		<div class="large-6 medium-6 small-12 columns">
			<h3><small>Leather Color</small></h3>
			@if ($jacket->leather_colors()->count() > 1)
				<ul class="button-group look-options">
					@foreach ($jacket->leather_colors() as $leather_color)
				  	<li><a class="button small" ng-class="{active: leather_color == '{{{ $leather_color->name}}}' }" ng-click="leather_color = '{{{ $leather_color->name }}}'">{{{ $leather_color->name }}}</a></li>
					@endforeach
				</ul>
			@else
				{{{ $jacket->leather_colors()->first()->name }}}
			@endif
		</div>

		<div class="large-6 medium-6 small-12 columns">
			<h3><small>Lining Color</small></h3>
			@if ($jacket->lining_colors()->count() > 1)
				<ul class="button-group look-options">
					@foreach ($jacket->lining_colors() as $lining_color)
				  	<li><a class="button small" ng-class="{active: lining_color == '{{{ $lining_color->name}}}' }" ng-click="lining_color = '{{{ $lining_color->name }}}'">{{{ $lining_color->name }}}</a></li>
					@endforeach
				</ul>
			@else
				{{{ $jacket->lining_colors()->first()->name }}}
			@endif
		</div>

		<div class="large-6 medium-6 small-12 columns">
			<h3><small>Hardware Color</small></h3>
			@if ($jacket->hardware_colors()->count() > 1)
				<ul class="button-group look-options">
					@foreach ($jacket->hardware_colors() as $hardware_color)
				  	<li><a class="button small" ng-class="{active: hardware_color == '{{{ $hardware_color->name}}}' }" ng-click="hardware_color = '{{{ $hardware_color->name }}}'">{{{ $hardware_color->name }}}</a></li>
					@endforeach
				</ul>
			@else
				{{{ $jacket->hardware_colors()->first()->name }}}
			@endif
		</div>
	</section>


	<section>
		<h2 class="large-12 medium-12 small-12 columns thin">
			Choose Your Fit (
			<small><strong>
				<span ng-show="!metricUnits">Cm</span>
				<span ng-show="metricUnits">Inches</span>
			</strong></small>
			)<button ng-click="metricUnits = !metricUnits" class="right button tiny radius">cm / in</button>
		</h2>

			<table class="measurement-table">
				<tbody>
						<tr>
							<td class="thin"><small>Size</small></td>
							@for ($i=0; $i < count($measurements); $i++)
								<th ng-class="{active: selectedColumn == {{{$i}}} }" ng-click="selectedColumn = {{{$i}}}">{{{ intval($measurements[$i]->size) }}}</th>
							@endfor
						</tr>
						<tr>
							<td class="thin"><small>Shoulders Front</small></td>
							@for ($i=0; $i < count($measurements); $i++)
								<td ng-class="{active: selectedColumn == {{{$i}}} }" ng-click="selectedColumn = {{{$i}}}" ng-show="metricUnits">{{{ $measurements[$i]->shoulders_front }}}</td>
								<td ng-class="{active: selectedColumn == {{{$i}}} }" ng-click="selectedColumn = {{{$i}}}" ng-show="!metricUnits">{{{ round($measurements[$i]->shoulders_front * 2.54, 2) }}}</td>
							@endfor
						</tr>
						<tr>
							<td class="thin"><small>Pits Across</small></td>
							@for ($i=0; $i < count($measurements); $i++)
								<td ng-class="{active: selectedColumn == {{{$i}}} }" ng-click="selectedColumn = {{{$i}}}" ng-show="metricUnits">{{{ $measurements[$i]->pits_across }}}</td>
								<td ng-class="{active: selectedColumn == {{{$i}}} }" ng-click="selectedColumn = {{{$i}}}" ng-show="!metricUnits">{{{ round($measurements[$i]->pits_across * 2.54, 2) }}}</td>
							@endfor
						</tr>
						<tr>
							<td class="thin"><small>Mid</small></td>
							@for ($i=0; $i < count($measurements); $i++)
								<td ng-class="{active: selectedColumn == {{{$i}}} }" ng-click="selectedColumn = {{{$i}}}"  ng-show="metricUnits">{{{ $measurements[$i]->mid }}}</td>
								<td ng-class="{active: selectedColumn == {{{$i}}} }" ng-click="selectedColumn = {{{$i}}}"  ng-show="!metricUnits">{{{ round($measurements[$i]->mid * 2.54, 2) }}}</td>
							@endfor
						</tr>
						<tr>
							<td class="thin"><small>Waist</small></td>
							@for ($i=0; $i < count($measurements); $i++)
								<td ng-class="{active: selectedColumn == {{{$i}}} }" ng-click="selectedColumn = {{{$i}}}"  ng-show="metricUnits">{{{ $measurements[$i]->waist }}}</td>
								<td ng-class="{active: selectedColumn == {{{$i}}} }" ng-click="selectedColumn = {{{$i}}}"  ng-show="!metricUnits">{{{ round($measurements[$i]->waist * 2.54, 2) }}}</td>
							@endfor
						</tr>
						<tr>
							<td class="thin"><small>Front Length</small></td>
							@for ($i=0; $i < count($measurements); $i++)
								<td ng-class="{active: selectedColumn == {{{$i}}} }" ng-click="selectedColumn = {{{$i}}}"  ng-show="metricUnits">{{{ $measurements[$i]->front_length }}}</td>
								<td ng-class="{active: selectedColumn == {{{$i}}} }" ng-click="selectedColumn = {{{$i}}}"  ng-show="!metricUnits">{{{ round($measurements[$i]->front_length * 2.54, 2) }}}</td>
							@endfor
						</tr>
						<tr>
							<td class="thin"><small>Back Length</small></td>
							@for ($i=0; $i < count($measurements); $i++)
								<td ng-class="{active: selectedColumn == {{{$i}}} }" ng-click="selectedColumn = {{{$i}}}"  ng-show="metricUnits">{{{ $measurements[$i]->back_length }}}</td>
								<td ng-class="{active: selectedColumn == {{{$i}}} }" ng-click="selectedColumn = {{{$i}}}"  ng-show="!metricUnits">{{{ round($measurements[$i]->back_length * 2.54, 2) }}}</td>
							@endfor
						</tr>
						<tr>
							<td class="thin"><small>Sleeve Length</small></td>
							@for ($i=0; $i < count($measurements); $i++)
								<td ng-class="{active: selectedColumn == {{{$i}}} }" ng-click="selectedColumn = {{{$i}}}"  ng-show="metricUnits">{{{ $measurements[$i]->sleeve_length }}}</td>
								<td ng-class="{active: selectedColumn == {{{$i}}} }" ng-click="selectedColumn = {{{$i}}}"  ng-show="!metricUnits">{{{ round($measurements[$i]->sleeve_length * 2.54, 2) }}}</td>
							@endfor
						</tr>
						<tr>
							<td class="thin"><small>Width at Pit</small></td>
							@for ($i=0; $i < count($measurements); $i++)
								<td ng-class="{active: selectedColumn == {{{$i}}} }" ng-click="selectedColumn = {{{$i}}}"  ng-show="metricUnits">{{{ $measurements[$i]->width_at_pit }}}</td>
								<td ng-class="{active: selectedColumn == {{{$i}}} }" ng-click="selectedColumn = {{{$i}}}"  ng-show="!metricUnits">{{{ round($measurements[$i]->width_at_pit * 2.54, 2) }}}</td>
							@endfor
						</tr>
						<tr>
							<td class="thin"><small>Width at Elbow</small></td>
							@for ($i=0; $i < count($measurements); $i++)
								<td ng-class="{active: selectedColumn == {{{$i}}} }" ng-click="selectedColumn = {{{$i}}}"  ng-show="metricUnits">{{{ $measurements[$i]->width_at_elbow }}}</td>
								<td ng-class="{active: selectedColumn == {{{$i}}} }" ng-click="selectedColumn = {{{$i}}}"  ng-show="!metricUnits">{{{ round($measurements[$i]->width_at_elbow * 2.54, 2) }}}</td>
							@endfor
						</tr>
						<tr>
							<td class="thin"><small>Width at Cuff</small></td>
							@for ($i=0; $i < count($measurements); $i++)
								<td ng-class="{active: selectedColumn == {{{$i}}} }" ng-click="selectedColumn = {{{$i}}}"  ng-show="metricUnits">{{{ $measurements[$i]->width_at_cuff }}}</td>
								<td ng-class="{active: selectedColumn == {{{$i}}} }" ng-click="selectedColumn = {{{$i}}}"  ng-show="!metricUnits">{{{ round($measurements[$i]->width_at_cuff * 2.54, 2) }}}</td>
							@endfor
						</tr>
				</tbody>
			</table>
	</section>

	<section class="large-12 medium-12 small-12 columns">
		<a href="/jacket/{{{$jacket->model}}}/checkout" class="black button expand">Proceed To Checkout</a>
	</section>


@stop



@section('footer')
	<div class="alert-box info" data-alert>
	  <h3><strong><small>Page Description</small></strong></h3>
		<h4>
			<small>
				Here's where a user sees all available options
			</small>
		</h4>

		<h3><strong><small>Purpose Served</small></strong></h3>
		<h4>
			<small>
				Visualize design choices and help people make their selection. Get them excited about their ""creation"".
			</small>
		</h4>
		<a href="#" class="close">&times;</a>
	</div>
@stop



