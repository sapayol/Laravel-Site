<form name="tailorMessageForm" ng-controller="tailorMessageCtrl" ng-submit="submitTailorMessage()"  ng-show="tailorNote" class="animated fadeIn">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">

	<label for="note" class="text-input-label">
		<span class="label-title">Note to Tailor</span>
		<textarea ng-model="note" name="note" id="note" rows="7"></textarea>
	</label>
	<label class="text-left checkboxes">
		<span class="label-title">Include in Email</span>
		<ul class="inline-list">
			<li><label><input type="checkbox" ng-model="inclusions.look" name="inclusions[look]" value=""> Look</label></li>
			<li><label><input type="checkbox" ng-model="inclusions.body_fit" name="inclusions[body-fit]" value=""> Body Fit</label></li>
			<li><label><input type="checkbox" ng-model="inclusions.product_fit" name="inclusions[product-fit]" value=""> Product Fit</label></li>
		</ul>
	</label>
	<button class="button small expand">Send to Tailor</button>
</form>