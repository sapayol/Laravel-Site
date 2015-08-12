<form name="paymentInfoForm" stripe-form="stripeResponseHandler">

	<label for="number">Credit Card Number
		<span class="right" ng-if="showPaymentErorrs && paymentInfoForm.number.$invalid">Required</span>
		<input id="number"
					 name="number"
					 type="tel"
					 size="20"
					 ng-model="number"
					 ng-required="true"
					 ng-disabled="paymentInfoSubmitted"
					 payments-format="card"
					 payments-validate="card"
					 payments-type-model="type">
	</label>

	<label for="cvc">CVC <small><a class="underlined" href="">What's This?</a></small>
		<span class="right" ng-if="showPaymentErorrs && paymentInfoForm.cvc.$invalid">Required</span>
		<input id="cvc"
					 name="cvc"
					 type="tel"
					 size="4"
					 ng-model="cvc"
					 ng-required="true"
					 ng-disabled="paymentInfoSubmitted"
					 data-stripe="cvc"
					 payments-validate="cvc"
					 payments-format="cvc">
	</label>

	<label for="email">Expiration Date
		<span class="right" ng-if="showPaymentErorrs && paymentInfoForm.email.$invalid">Required</span>
		<input id="expiry"
					 name="expiry"
					 type="tel"
					 size="4"
					 ng-model="expiry"
					 ng-required="true"
					 ng-disabled="paymentInfoSubmitted"
					 payments-validate="expiry"
					 payments-format="expiry"
					 placeholder="MM/YYYY">
	</label>

	<div class="text-center">
		<br>
		<input class="button expand" type="submit" value="Proceed To Shipping Info" ng-hide="paymentInfoSubmitted">
		<em href="" class="under-button-link">Your card will not be charged until you confirm</em>
		<br>
	</div>

</form>
