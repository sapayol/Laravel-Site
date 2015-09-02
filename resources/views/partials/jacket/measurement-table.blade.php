<table class="measurement-table" ng-init="metricUnits = true">
	<tbody>
			<tr>
				<td>
					<h3>Size
						<span class="thin" ng-show="metricUnits">(cm)</span>
						<span class="thin" ng-show="!metricUnits">(in)</span>
					</h3>
				</td>
				@for ($i=0; $i < count($measurements); $i++)
					<th ng-class="{active: selectedColumn == {{{$i}}} }" ng-click="selectedColumn = {{{$i}}}; jacket.size = {{{$measurements[$i]->size}}}">
						<a ng-click="selectedColumn = {{{$i}}}; jacket.size = {{{$measurements[$i]->size}}}" class="table-heading-button">
							{{{ intval($measurements[$i]->size) }}}
						</a>
					</th>
				@endfor
			</tr>
			<tr>
				<td class="thin"><small>Shoulders Front</small></td>
				@for ($i=0; $i < count($measurements); $i++)
					<td ng-class="{active: selectedColumn == {{{$i}}} }" ng-click="selectedColumn = {{{$i}}}; jacket.size = {{{$measurements[$i]->size}}}" ng-show="!metricUnits">{{{ $measurements[$i]->shoulders_front }}}</td>
					<td ng-class="{active: selectedColumn == {{{$i}}} }" ng-click="selectedColumn = {{{$i}}}; jacket.size = {{{$measurements[$i]->size}}}" ng-show="metricUnits">{{{ round($measurements[$i]->shoulders_front * 2.54, 2) }}}</td>
				@endfor
			</tr>
			<tr>
				<td class="thin"><small>Pits Across</small></td>
				@for ($i=0; $i < count($measurements); $i++)
					<td ng-class="{active: selectedColumn == {{{$i}}} }" ng-click="selectedColumn = {{{$i}}}; jacket.size = {{{$measurements[$i]->size}}}" ng-show="!metricUnits">{{{ $measurements[$i]->pits_across }}}</td>
					<td ng-class="{active: selectedColumn == {{{$i}}} }" ng-click="selectedColumn = {{{$i}}}; jacket.size = {{{$measurements[$i]->size}}}" ng-show="metricUnits">{{{ round($measurements[$i]->pits_across * 2.54, 2) }}}</td>
				@endfor
			</tr>
			<tr>
				<td class="thin"><small>Mid</small></td>
				@for ($i=0; $i < count($measurements); $i++)
					<td ng-class="{active: selectedColumn == {{{$i}}} }" ng-click="selectedColumn = {{{$i}}}; jacket.size = {{{$measurements[$i]->size}}}"  ng-show="!metricUnits">{{{ $measurements[$i]->mid }}}</td>
					<td ng-class="{active: selectedColumn == {{{$i}}} }" ng-click="selectedColumn = {{{$i}}}; jacket.size = {{{$measurements[$i]->size}}}"  ng-show="metricUnits">{{{ round($measurements[$i]->mid * 2.54, 2) }}}</td>
				@endfor
			</tr>
			<tr>
				<td class="thin"><small>Waist</small></td>
				@for ($i=0; $i < count($measurements); $i++)
					<td ng-class="{active: selectedColumn == {{{$i}}} }" ng-click="selectedColumn = {{{$i}}}; jacket.size = {{{$measurements[$i]->size}}}"  ng-show="!metricUnits">{{{ $measurements[$i]->waist }}}</td>
					<td ng-class="{active: selectedColumn == {{{$i}}} }" ng-click="selectedColumn = {{{$i}}}; jacket.size = {{{$measurements[$i]->size}}}"  ng-show="metricUnits">{{{ round($measurements[$i]->waist * 2.54, 2) }}}</td>
				@endfor
			</tr>
			<tr>
				<td class="thin"><small>Front Length</small></td>
				@for ($i=0; $i < count($measurements); $i++)
					<td ng-class="{active: selectedColumn == {{{$i}}} }" ng-click="selectedColumn = {{{$i}}}; jacket.size = {{{$measurements[$i]->size}}}"  ng-show="!metricUnits">{{{ $measurements[$i]->front_length }}}</td>
					<td ng-class="{active: selectedColumn == {{{$i}}} }" ng-click="selectedColumn = {{{$i}}}; jacket.size = {{{$measurements[$i]->size}}}"  ng-show="metricUnits">{{{ round($measurements[$i]->front_length * 2.54, 2) }}}</td>
				@endfor
			</tr>
			<tr>
				<td class="thin"><small>Back Length</small></td>
				@for ($i=0; $i < count($measurements); $i++)
					<td ng-class="{active: selectedColumn == {{{$i}}} }" ng-click="selectedColumn = {{{$i}}}; jacket.size = {{{$measurements[$i]->size}}}"  ng-show="!metricUnits">{{{ $measurements[$i]->back }}}</td>
					<td ng-class="{active: selectedColumn == {{{$i}}} }" ng-click="selectedColumn = {{{$i}}}; jacket.size = {{{$measurements[$i]->size}}}"  ng-show="metricUnits">{{{ round($measurements[$i]->back * 2.54, 2) }}}</td>
				@endfor
			</tr>
			<tr>
				<td class="thin"><small>Sleeve Length</small></td>
				@for ($i=0; $i < count($measurements); $i++)
					<td ng-class="{active: selectedColumn == {{{$i}}} }" ng-click="selectedColumn = {{{$i}}}; jacket.size = {{{$measurements[$i]->size}}}"  ng-show="!metricUnits">{{{ $measurements[$i]->sleeve }}}</td>
					<td ng-class="{active: selectedColumn == {{{$i}}} }" ng-click="selectedColumn = {{{$i}}}; jacket.size = {{{$measurements[$i]->size}}}"  ng-show="metricUnits">{{{ round($measurements[$i]->sleeve * 2.54, 2) }}}</td>
				@endfor
			</tr>
			<tr>
				<td class="thin"><small>Width at Pit</small></td>
				@for ($i=0; $i < count($measurements); $i++)
					<td ng-class="{active: selectedColumn == {{{$i}}} }" ng-click="selectedColumn = {{{$i}}}; jacket.size = {{{$measurements[$i]->size}}}"  ng-show="!metricUnits">{{{ $measurements[$i]->width_at_pit }}}</td>
					<td ng-class="{active: selectedColumn == {{{$i}}} }" ng-click="selectedColumn = {{{$i}}}; jacket.size = {{{$measurements[$i]->size}}}"  ng-show="metricUnits">{{{ round($measurements[$i]->width_at_pit * 2.54, 2) }}}</td>
				@endfor
			</tr>
			<tr>
				<td class="thin"><small>Width at Elbow</small></td>
				@for ($i=0; $i < count($measurements); $i++)
					<td ng-class="{active: selectedColumn == {{{$i}}} }" ng-click="selectedColumn = {{{$i}}}; jacket.size = {{{$measurements[$i]->size}}}"  ng-show="!metricUnits">{{{ $measurements[$i]->width_at_elbow }}}</td>
					<td ng-class="{active: selectedColumn == {{{$i}}} }" ng-click="selectedColumn = {{{$i}}}; jacket.size = {{{$measurements[$i]->size}}}"  ng-show="metricUnits">{{{ round($measurements[$i]->width_at_elbow * 2.54, 2) }}}</td>
				@endfor
			</tr>
			<tr>
				<td class="thin"><small>Width at Cuff</small></td>
				@for ($i=0; $i < count($measurements); $i++)
					<td ng-class="{active: selectedColumn == {{{$i}}} }" ng-click="selectedColumn = {{{$i}}}; jacket.size = {{{$measurements[$i]->size}}}"  ng-show="!metricUnits">{{{ $measurements[$i]->width_at_cuff }}}</td>
					<td ng-class="{active: selectedColumn == {{{$i}}} }" ng-click="selectedColumn = {{{$i}}}; jacket.size = {{{$measurements[$i]->size}}}"  ng-show="metricUnits">{{{ round($measurements[$i]->width_at_cuff * 2.54, 2) }}}</td>
				@endfor
			</tr>
			<tr>
				<td>
					<div class="switch large">
						<div class="switch-text"><span> in </span><span> cm </span></div>
					  <input id="exampleCheckboxSwitch" ng-model="metricUnits" type="checkbox">
					  <label for="exampleCheckboxSwitch" >cm /in</label>
					</div>
				</td>
			</tr>
	</tbody>
</table>