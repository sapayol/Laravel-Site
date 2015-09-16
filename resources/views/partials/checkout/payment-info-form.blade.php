<form name="paymentInfoForm" stripe-form="stripeResponseHandler">

	<label for="number" class="credit-card-field">Credit Card Number
		<span class="right" ng-if="showPaymentErorrs && paymentInfoForm.number.$invalid">Required</span>
		<input id="number"
					 name="number"
					 type="tel"
					 size="20"
					 ng-model="number"
					 ng-required="true"
					 ng-disabled="paymentInfoDisabled"
					 payments-format="card"
					 payments-validate="card"
					 payments-type-model="type">
					<i class="fa fa-cc-@{{type}} input-icon" ng-if="paymentInfoForm.number.$viewValue && paymentInfoForm.number.$dirty"></i>
	</label>

	<label for="email" class="expiry-field">Expiration Date
		<span class="right" ng-if="showPaymentErorrs && paymentInfoForm.email.$invalid">Required</span>
		<input id="expiry"
					 name="expiry"
					 type="tel"
					 size="4"
					 ng-model="expiry"
					 ng-required="true"
					 ng-disabled="paymentInfoDisabled"
					 payments-validate="expiry"
					 payments-format="expiry"
					 placeholder="MM/YYYY">
	</label>

	<label for="cvc" class="cvc-field">CVC <small><a class="underlined" href="">What's This?</a></small>
		<span class="right" ng-if="showPaymentErorrs && paymentInfoForm.cvc.$invalid">Required</span>
		<input id="cvc"
					 name="cvc"
					 type="tel"
					 size="4"
					 ng-model="cvc"
					 ng-required="true"
					 ng-disabled="paymentInfoDisabled"
					 data-stripe="cvc"
					 payments-validate="cvc"
					 payments-format="cvc">
	</label>

	<div class="text-center">
		<br>

		<button ng-if="paymentInfoSubmitted" class="button expand" type="submit"  ng-hide="paymentInfoDisabled">Update Payment Info<span class="chevron chevron--right"></span></button>
		<button ng-if="!paymentInfoSubmitted" class="button expand" type="submit"  ng-hide="paymentInfoDisabled">Proceed To Order Summary<span class="chevron chevron--right"></span></button>
		<em class="hide-for-large-up">Your card will not be charged until you confirm your order</em>
		<br>
	</div>

</form>
