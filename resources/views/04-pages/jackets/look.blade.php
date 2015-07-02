@extends('03-templates/default')

@section('title')
	SAPAYOL | {{{ $jacket->name }}}
@stop

@section('header')
	<div class="large-12 medium-12 small-12 columns">
		<h1>{{{ $jacket->name }}}</h1>
	</div>
@stop

@section('main')

	<div class="large-8 medium-8 small-12 columns">
		<img src="/images/photos/jacket-1.jpg">
	</div>

	<div class="large-4 medium-4 small-12 columns">
		<h2>${{{ $jacket->price }}}</h2>
		<ul class="no-bullet">
			<li><small>Leather Type: </small> @{{ leather_type }}</li>
			<li><small>Leather Color: </small>@{{ leather_color }}</li>
			<li><small>Lining Color: </small>@{{ lining_color }}</li>
			<li><small>Hardware Color: </small>@{{ hardware_color }}</li>
		</ul>
		<a href="/jackets/{{{ $jacket->model }}}/fit?type=@{{ leather_type }}&color=@{{ leather_color }}&lining=@{{ lining_color }}&hardware=@{{ hardware_color }}" class="button radius success">Enter Your Measurements</a>
	</div>

	<div class="large-12 medium-12 small-12 columns">
		<h3>Choose Look</h3>
	</div>

	<div class="large-6 medium-6 small-12 columns">
		<h4>Leather Type</h4>
		@if ($jacket->leather_types()->count() > 1)
			<ul class="button-group radius">
				@foreach ($jacket->leather_types() as $leather_type)
			  	<li><a href="!#" class="button small" ng-class="{active: leather_type == '{{{ $leather_type->name}}}' }" ng-click="leather_type = '{{{ $leather_type->name }}}'">{{{ $leather_type->name }}}</a></li>
				@endforeach
			</ul>
		@else
			{{{ $jacket->leather_types()->first()->name }}}
		@endif
	</div>

	<div class="large-6 medium-6 small-12 columns">
		<h4>Leather Color</h4>
		@if ($jacket->leather_colors()->count() > 1)
			<ul class="button-group radius">
				@foreach ($jacket->leather_colors() as $leather_color)
			  	<li><a href="!#" class="button small" ng-class="{active: leather_color == '{{{ $leather_color->name}}}' }" ng-click="leather_color = '{{{ $leather_color->name }}}'">{{{ $leather_color->name }}}</a></li>
				@endforeach
			</ul>
		@else
			{{{ $jacket->leather_colors()->first()->name }}}
		@endif
	</div>

	<div class="large-6 medium-6 small-12 columns">
		<h4>Lining Color</h4>
		@if ($jacket->lining_colors()->count() > 1)
			<ul class="button-group radius">
				@foreach ($jacket->lining_colors() as $lining_color)
			  	<li><a href="!#" class="button small" ng-class="{active: leather_color == '{{{ $leather_color->name}}}' }" ng-click="lining_color = '{{{ $lining_color->name }}}'">{{{ $lining_color->name }}}</a></li>
				@endforeach
			</ul>
		@else
			{{{ $jacket->lining_colors()->first()->name }}}
		@endif
	</div>

	<div class="large-6 medium-6 small-12 columns">
		<h4>Hardware Color</h4>
		@if ($jacket->hardware_colors()->count() > 1)
			<ul class="button-group radius">
				@foreach ($jacket->hardware_colors() as $hardware_color)
			  	<li><a href="!#" class="button small" ng-class="{active: hardware_color == '{{{ $hardware_color->name}}}' }" ng-click="hardware_color = '{{{ $hardware_color->name }}}'">{{{ $hardware_color->name }}}</a></li>
				@endforeach
			</ul>
		@else
			{{{ $jacket->hardware_colors()->first()->name }}}
		@endif
	</div>


	<div class="large-12 medium-12 small-12 columns" ng-init="units = 'inches'">
		<h3>
			Choose Your Fit (
			<small><strong>
				<span ng-show="units == 'inches'">Cm</span>
				<span ng-show="units == 'cm'">Inches</span>
			</strong></small>
			)
		</h3>
		<a href="" ng-show="units == 'cm'" ng-click="units = 'inches' ">View in Cm</a>
		<a href="" ng-show="units == 'inches'" ng-click="units = 'cm' ">View in Inches</a>
			<table>
				<tbody>
						<tr>
							<td>Size</td>
							@foreach ($measurements as $measurement)
								<th>{{{ intval($measurement->size) }}}</th>
							@endforeach
						</tr>
						<tr>
							<td>Shoulders Front</td>
							@foreach ($measurements as $measurement)
								<td ng-show="units == 'cm'">{{{ $measurement->shoulders_front }}}</td>
								<td ng-show="units == 'inches'">{{{ round($measurement->shoulders_front * 2.54, 2) }}}</td>
							@endforeach
						</tr>
						<tr>
							<td>Pits_across</td>
							@foreach ($measurements as $measurement)
								<td ng-show="units == 'cm'">{{{ $measurement->pits_across }}}</td>
								<td ng-show="units == 'inches'">{{{ round($measurement->pits_across * 2.54, 2) }}}</td>
							@endforeach
						</tr>
						<tr>
							<td>Mid</td>
							@foreach ($measurements as $measurement)
								<td ng-show="units == 'cm'">{{{ $measurement->mid }}}</td>
								<td ng-show="units == 'inches'">{{{ round($measurement->mid * 2.54, 2) }}}</td>
							@endforeach
						</tr>
						<tr>
							<td>Waist</td>
							@foreach ($measurements as $measurement)
								<td ng-show="units == 'cm'">{{{ $measurement->waist }}}</td>
								<td ng-show="units == 'inches'">{{{ round($measurement->waist * 2.54, 2) }}}</td>
							@endforeach
						</tr>
						<tr>
							<td>Front_length</td>
							@foreach ($measurements as $measurement)
								<td ng-show="units == 'cm'">{{{ $measurement->front_length }}}</td>
								<td ng-show="units == 'inches'">{{{ round($measurement->front_length * 2.54, 2) }}}</td>
							@endforeach
						</tr>
						<tr>
							<td>Back_length</td>
							@foreach ($measurements as $measurement)
								<td ng-show="units == 'cm'">{{{ $measurement->back_length }}}</td>
								<td ng-show="units == 'inches'">{{{ round($measurement->back_length * 2.54, 2) }}}</td>
							@endforeach
						</tr>
						<tr>
							<td>Sleeve_length</td>
							@foreach ($measurements as $measurement)
								<td ng-show="units == 'cm'">{{{ $measurement->sleeve_length }}}</td>
								<td ng-show="units == 'inches'">{{{ round($measurement->sleeve_length * 2.54, 2) }}}</td>
							@endforeach
						</tr>
						<tr>
							<td>Width_at_pit</td>
							@foreach ($measurements as $measurement)
								<td ng-show="units == 'cm'">{{{ $measurement->width_at_pit }}}</td>
								<td ng-show="units == 'inches'">{{{ round($measurement->width_at_pit * 2.54, 2) }}}</td>
							@endforeach
						</tr>
						<tr>
							<td>Width_at_elbow</td>
							@foreach ($measurements as $measurement)
								<td ng-show="units == 'cm'">{{{ $measurement->width_at_elbow }}}</td>
								<td ng-show="units == 'inches'">{{{ round($measurement->width_at_elbow * 2.54, 2) }}}</td>
							@endforeach
						</tr>
						<tr>
							<td>Width_at_cuff</td>
							@foreach ($measurements as $measurement)
								<td ng-show="units == 'cm'">{{{ $measurement->width_at_cuff }}}</td>
								<td ng-show="units == 'inches'">{{{ round($measurement->width_at_cuff * 2.54, 2) }}}</td>
							@endforeach
						</tr>
						<tr>
							<td>&nbsp;</td>
							@foreach ($measurements as $measurement)
								<td><a href="" ng-click="selectedSize = {{{ $measurement->size }}}" class="tiny radius">Select</a></td>
							@endforeach
						</tr>
				</tbody>
			</table>
	</div>


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



