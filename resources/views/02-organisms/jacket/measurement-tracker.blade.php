<ul class="small-block-grid-4 measurement-tracker">
	<li>
		<a href="#shoulders-section" ng-class="{valid: shoulders}">
			<div>
				<span>Shoulders</span>
				<span ng-if="shoulders" class="measurement-value">
					@{{ shoulders }}<br><span class="measurement-units"> @{{ units }}</span>
				</span>
			</div>
		</a>
	</li>
	<li>
		<a href="#back-section" ng-class="{valid: back}">
			<div>
				<span>Back</span>
				<span ng-if="back" class="measurement-value">
					@{{ back }}<br><span class="measurement-units"> @{{ units }}</span>
				</span>
			</div>
		</a>
	</li>
	<li>
		<a href="#chest-section" ng-class="{valid: chest}">
			<div>
				<span>Chest</span>
				<span ng-if="chest" class="measurement-value">
					@{{ chest }}<br><span class="measurement-units"> @{{ units }}</span>
				</span>
			</div>
		</a>
	</li>
	<li>
		<a href="#stomach-section" ng-class="{valid: stomach}">
			<div>
				<span>Stomach</span>
				<span ng-if="stomach" class="measurement-value">
					@{{ stomach }}<br><span class="measurement-units"> @{{ units }}</span>
				</span>
			</div>
		</a>
	</li>
	<li>
		<a href="#jacket-length-section" ng-class="{valid: jacketLength}">
			<div>
				<span>Jacket</span>
				<span ng-if="jacket-length" class="measurement-value">
					@{{ jacket-length }}<br><span class="measurement-units"> @{{ units }}</span>
				</span>
			</div>
		</a>
	</li>
	<li>
		<a href="#waist-section" ng-class="{valid: waist}">
			<div>
				<span>Waist</span>
				<span ng-if="waist" class="measurement-value">
					@{{ waist }}<br><span class="measurement-units"> @{{ units }}</span>
				</span>
			</div>
		</a>
	</li>
	<li>
		<a href="#sleeve-section" ng-class="{valid: sleeve}">
			<div>
				<span>Sleeve</span>
				<span ng-if="sleeve" class="measurement-value">
					@{{ sleeve }}<br><span class="measurement-units"> @{{ units }}</span>
				</span>
			</div>
		</a>
	</li>
	<li>
		<a href="#biceps-section" ng-class="{valid: biceps}">
			<div>
				<span>Biceps</span>
				<span ng-if="biceps" class="measurement-value">
					@{{ biceps }}<br><span class="measurement-units"> @{{ units }}</span>
				</span>
			</div>
		</a>
	</li>
{{-- 	<li>
		<a class="hollow">
			<div>
				<span>0</span>
				<span> / 7</span>
			</div>
		</a>
	</li> --}}
</ul>
