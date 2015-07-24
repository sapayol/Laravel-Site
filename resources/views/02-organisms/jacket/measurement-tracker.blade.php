<ul class="small-block-grid-4 measurement-tracker">
	<li>
		<a href="#shoulders-section" ng-class="{valid: shoulders}">
			<div>
				<span>Shoulder</span>
				<span ng-if="shoulders" class="measurement-value">
					@{{ shoulders }}<br><span class="measurement-units"> cm</span>
				</span>
			</div>
		</a>
	</li>
	<li>
		<a href="#chest-section" ng-class="{valid: chest}">
			<div>
				<span>Chest</span>
				<span ng-if="chest" class="measurement-value">
					@{{ chest }}<br><span class="measurement-units"> cm</span>
				</span>
			</div>
		</a>
	</li>
	<li>
		<a href="#mid-section" ng-class="{valid: mid}">
			<div>
				<span>Mid</span>
				<span ng-if="mid" class="measurement-value">
					@{{ mid }}<br><span class="measurement-units"> cm</span>
				</span>
			</div>
		</a>
	</li>
	<li>
		<a href="#waist-section" ng-class="{valid: waist}">
			<div>
				<span>Waist</span>
				<span ng-if="waist" class="measurement-value">
					@{{ waist }}<br><span class="measurement-units"> cm</span>
				</span>
			</div>
		</a>
	</li>
	<li>
		<a href="#back-section" ng-class="{valid: back}">
			<div>
				<span>Back</span>
				<span ng-if="back" class="measurement-value">
					@{{ back }}<br><span class="measurement-units"> cm</span>
				</span>
			</div>
		</a>
	</li>
	<li>
		<a href="#sleeve-section" ng-class="{valid: sleeve}">
			<div>
				<span>Sleeve</span>
				<span ng-if="sleeve" class="measurement-value">
					@{{ sleeve }}<br><span class="measurement-units"> cm</span>
				</span>
			</div>
		</a>
	</li>
	<li>
		<a href="#biceps-section" ng-class="{valid: bicep}">
			<div>
				<span>Bicep</span>
				<span ng-if="bicep" class="measurement-value">
					@{{ bicep }}<br><span class="measurement-units"> cm</span>
				</span>
			</div>
		</a>
	</li>
</ul>
