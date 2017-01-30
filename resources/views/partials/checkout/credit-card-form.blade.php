<form name="paymentInfoForm" stripe-form="stripeResponseHandler">
	<div class="row collapse">
		<label for="number" class="text-input-label credit-card-field retain-border">
			<span class="label-title">Credit Card Number</span>
			<span class="right" ng-if="showPaymentErorrs && paymentInfoForm.number.$invalid">Required</span>
			<input id="number"
						 name="number"
						 type="tel"
						 size="20"
						 ng-model="number"
						 ng-required="true"
						 ng-disabled="paymentInfoDisabled"
						 payments-format="card"
						 payments-type-model="type">
						<i class="fa fa-cc-@{{type}} input-icon" ng-if="paymentInfoForm.number.$viewValue && paymentInfoForm.number.$dirty"></i>
		</label>
	</div>
	<div class="row collapse">
		<label for="expiry" class="small-8 columns text-input-label expiry-field retain-border">
			<span class="label-title">Expiration Date</span>
			<span class="right" ng-if="showPaymentErorrs && paymentInfoForm.email.$invalid">Required</span>
			<input id="expiry"
						 name="expiry"
						 type="tel"
						 size="4"
						 ng-model="expiry"
						 ng-required="true"
						 ng-disabled="paymentInfoDisabled"
						 payments-format="expiry"
						 placeholder="MM/YYYY">
		</label>

		<label for="cvc" class="small-4 columns text-input-label cvc-field">
			<span class="label-title">CVC <small><a class="underlined" href="#" data-reveal-id="cvcModal">What&rsquo;s This?</a></small></span>
			<span class="right" ng-if="showPaymentErorrs && paymentInfoForm.cvc.$invalid">Required</span>
			<input id="cvc"
						 name="cvc"
						 type="tel"
						 size="4"
						 ng-model="cvc"
						 ng-required="true"
						 ng-disabled="paymentInfoDisabled"
						 data-stripe="cvc"
						 payments-format="cvc">
		</label>
	</div>

	<div class="text-center">
		<button ng-if="paymentInfoSubmitted" class="button expand" type="submit"  ng-hide="paymentInfoDisabled">Update Payment Info<span class="chevron chevron--right"></span></button>
		<button ng-if="!paymentInfoSubmitted" class="button expand" type="submit"  ng-hide="paymentInfoDisabled">Submit Payment Info<span class="chevron chevron--right"></span></button>
		<em>Your card will not be charged until you confirm your order</em>
		<br><br><br>
	</div>

</form>

<div id="cvcModal" class="reveal-modal" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
	<br>
	<p>This is your card&rsquo;s security code. <br><br> On Visa/MasterCard/Discover cards it should be the last 3 digits on the back of your card. <br><br> On AmericanExpress cards, it is the 4 digits off to the right of the card face.</p>
	<div class="text-center">
		<img src="/images/cvc-hint.png" alt="Credit Card Diagram">
		<br><br>
		<a class="underlined" aria-label="Close" ng-click="closeModal()">Close</a>
	</div>
  <a class="close-reveal-modal" aria-label="Close">&#215;</a>
</div>