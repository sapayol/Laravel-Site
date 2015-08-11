<form action="/checkout" ng-init="units = 'cm'">
	<article>
		<p>To begin, please choose which units you'll be measuring in</p>
	  <fieldset class="unit-choice">
	    <label>Units</label>
	    <input type="radio" name="units" ng-model="units" id="unit-cm" value="cm" ng-checked="true" checked="checked"/>
	    <label for="unit-cm">cm</label>
	    <input type="radio" name="units" ng-model="units" id="unit-in" value="in"/>
	    <label for="unit-in">in</label>
	  </fieldset>
	</article>

	<article id="half-shoulder-section">
		<div class="player">
			<h3>Half Shoulder</h3>
	    <video poster="/images/video-posters/half-shoulder.png" controls crossorigin>
        <source src="/videos/1-half shoulder.mp4" type="video/mp4">
        <a href="/videos/1-half shoulder.mp4">Download</a>
	    </video>
		</div>
		<div ng-show="halfShoulderInstructions" class="measurement-instructions animated slideInDown">
			<h4>Start</h4>
			<p>Side of the neck, straight under the hollow behind your earlobe.</p>
			<h4>End</h4>
			<p>Raise the arm to shoulder level and a dimple will form at the shoulder bone. That’s the shoulder point.</p>
			<p><em>You only need to measure one side.</em></p>
		</div>
		<label for="half-shoulder" class="text-input-label">
			<span class="label-title">Half Shoulder</span>
			<input id="half-shoulder" type="tel" placeholder="00.00" ng-model="halfShoulder" maxlength="5" mask="99.99">
			<span class="input-units">@{{ units }}</span>
		</label>
    <button type="button" class="text-button"  ng-click="halfShoulderInstructions = !halfShoulderInstructions">
    	<span ng-show="!halfShoulderInstructions">Show</span> <span ng-show="halfShoulderInstructions">Hide</span> Instructions
    </button>
	</article>


	<article id="shoulders-section">
		<div class="player">
			<h3>Full Shoulder</h3>
	    <video poster="/images/video-posters/full-shoulder.png" controls crossorigin>
        <source src="/videos/2-full shoulder.mp4" type="video/mp4">
        <a href="/videos/2-full shoulder.mp4">Download</a>
	    </video>
		</div>
		<div ng-show="shoulderInstructions" class="measurement-instructions animated slideInDown">
			<p>From one shoulder point (right under the dimple that forms when you raise your arm to shoulder level) to the other, across the back.</p>
		</div>
		<label for="shoulders" class="text-input-label">
			<span class="label-title">Shoulders</span>
			<input id="shoulders" type="tel" placeholder="00.00" ng-model="shoulders" maxlength="5" mask="99.99">
			<span class="input-units">@{{ units }}</span>
		</label>
    <button type="button" class="text-button"  ng-click="shoulderInstructions = !shoulderInstructions">
    	<span ng-show="!shoulderInstructions">Show</span> <span ng-show="shoulderInstructions">Hide</span> Instructions
    </button>
	</article>


	<article id="back-section">
		<div class="player">
			<h3>Back</h3>
	    <video poster="/images/video-posters/back-width.png" controls crossorigin>
        <source src="/videos/3-back width.mp4" type="video/mp4">
        <a href="/videos/3-back width.mp4">Download</a>
	    </video>
		</div>
		<div ng-show="backInstructions" class="measurement-instructions animated slideInDown">
			<h4>Start and End</h4>
			<p>Halfway between the shoulder point and the arm crease.</p>
		</div>
		<label for="back" class="text-input-label">
			<span class="label-title">Back</span>
			<input id="back" type="tel" placeholder="00.00" ng-model="back" maxlength="5" mask="99.99">
			<span class="input-units">@{{ units }}</span>
		</label>
    <button type="button" class="text-button"  ng-click="backInstructions = !backInstructions">
    	<span ng-show="!backInstructions">Show</span> <span ng-show="backInstructions">Hide</span> Instructions
    </button>
  </article>


	<article id="chest-section">
		<div class="player">
			<h3>Chest</h3>
	    <video poster="/images/video-posters/full-chest.png" controls crossorigin>
        <source src="/videos/4-full chest.mp4" type="video/mp4">
        <a href="/videos/4-full chest.mp4">Download</a>
	    </video>
		</div>
		<div ng-show="chestInstructions" class="measurement-instructions animated slideInDown">
			<p>This measurement goes around the widest part of your chest, right across your nipples.</p>
			<ul>
				<li>Make sure that the measuring tape is horizontal on the back too.</li>
				<li>Keep your arms hanging.</li>
				<li>Breathe naturally. Don’t puff your chest out.</li>
				<li>Leave enough space to fit a finger under the measure tape.</li>
			</ul>
		</div>
		<label for="chest" class="text-input-label">
			<span class="label-title">Chest</span>
			<input id="chest" type="tel" placeholder="00.00" ng-model="chest" maxlength="5" mask="99.99">
			<span class="input-units">@{{ units }}</span>
		</label>
    <button type="button" class="text-button"  ng-click="chestInstructions = !chestInstructions">
    	<span ng-show="!chestInstructions">Show</span> <span ng-show="chestInstructions">Hide</span> Instructions
    </button>
  </article>


	<article id="stomach-section">
		<div class="player">
			<h3>Belly / Stomach</h3>
	    <video poster="/images/video-posters/belly-stomach.png" controls crossorigin>
        <source src="/videos/5-belly-stomach.mp4" type="video/mp4">
        <a href="/videos/5-belly-stomach.mp4">Download</a>
	    </video>
		</div>
		<div ng-show="stomachInstructions" class="measurement-instructions animated slideInDown">
			<p>Measure horizontally around the body, just above the hipbones (for most people, that’s right across your belly button).</p>
			<p>Leave enough space to fit a finger under the measure tape. </p>
		</div>
		<label for="stomach" class="text-input-label">
			<span class="label-title">Stomach</span>
			<input id="stomach" type="tel" placeholder="00.00" ng-model="stomach" maxlength="5" mask="99.99">
			<span class="input-units">@{{ units }}</span>
		</label>
    <button type="button" class="text-button"  ng-click="stomachInstructions = !stomachInstructions">
    	<span ng-show="!stomachInstructions">Show</span> <span ng-show="stomachInstructions">Hide</span> Instructions
    </button>
  </article>


	<article id="jacket-length-section">
		<div class="player">
			<h3>Jacket Length</h3>
	    <video poster="/images/video-posters/jacket-length.png" controls crossorigin>
        <source src="/videos/6-jacket length.mp4" type="video/mp4">
        <a href="/videos/6-jacket length.mp4">Download</a>
	    </video>
		</div>
		<div ng-show="jacketLengthInstructions" class="measurement-instructions animated slideInDown">
			<h4>Start</h4>
			<p>Bend your head forward. The highest bone on the jacket-length of your neck that sticks out is your starting point.</p>
			<h4>End</h4>
			<p>If you’re wearing pants that sit right on your hips (not pants with a high waist), measure to end of the waistband. Anatomically, it’s right above the sacrum.</p>
			<p><em>Some people like a slightly shorter or longer jacket. You will be able to express your preference later. For n</em>ow, measure as indicated in the video.</p>
		</div>
		<label for="jacket-length" class="text-input-label">
			<span class="label-title">Jacket Length</span>
			<input id="jacket-length" type="tel" placeholder="00.00" ng-model="jacketLength" maxlength="5" mask="99.99">
			<span class="input-units">@{{ units }}</span>
		</label>
    <button type="button" class="text-button"  ng-click="jacketLengthInstructions = !jacketLengthInstructions">
    	<span ng-show="!jacketLengthInstructions">Show</span> <span ng-show="jacketLengthInstructions">Hide</span> Instructions
    </button>
  </article>


	<article id="waist-section">
		<div class="player">
			<h3>Waist</h3>
	    <video poster="/images/video-posters/waist.png" controls crossorigin>
        <source src="/videos/7-waist.mp4" type="video/mp4">
        <a href="/videos/7-waist.mp4">Download</a>
	    </video>
		</div>
		<div ng-show="waistInstructions" class="measurement-instructions animated slideInDown">
			<p>Measure around the hips, right where your jacket length measurement ended.</p>
			<ul>
				<li>Leave enough space to fit a finger under the measure tape.</li>
				<li>This is about five fingers lower than your “natural waist”.</li>
				<li>Don’t wear a belt for this measurement.</li>
			</ul>
		</div>
		<label for="waist" class="text-input-label">
			<span class="label-title">Waist</span>
			<input id="waist" type="tel" placeholder="00.00" ng-model="waist" maxlength="5" mask="99.99">
			<span class="input-units">@{{ units }}</span>
		</label>
    <button type="button" class="text-button"  ng-click="waistInstructions = !waistInstructions">
    	<span ng-show="!waistInstructions">Show</span> <span ng-show="waistInstructions">Hide</span> Instructions
    </button>
  </article>


	<article id="sleeve-section">
		<div class="player">
			<h3>Sleeve</h3>
	    <video poster="/images/video-posters/sleeve.png" controls crossorigin>
        <source src="/videos/8-sleeve.mp4" type="video/mp4">
        <a href="/videos/8-sleeve.mp4">Download</a>
	    </video>
		</div>
		<div ng-show="sleeveInstructions" class="measurement-instructions animated slideInDown">
			<h4>Start</h4>
			<p>Shoulder point (where you left off for the shoulder measurement)</p>
			<h4>End</h4>
			<p>Right at the wrist, just after the bone that sticks out a little on the side of your little finger (head of ulna).</p>
			<p><em>Go along the arm, passing through the elbow. Don’t go straight from the shoulder to your hand.</em></p>
			<p>Some people like their sleeves a little longer, other a little shorter. You will be able to express your preference later. For now, measure as indicated in the video.</p>
		</div>
		<label for="sleeve" class="text-input-label">
			<span class="label-title">Sleeve Length</span>
			<input id="sleeve" type="tel" placeholder="00.00" ng-model="sleeve" maxlength="5" mask="99.99">
			<span class="input-units">@{{ units }}</span>
		</label>
    <button type="button" class="text-button"  ng-click="sleeveInstructions = !sleeveInstructions">
    	<span ng-show="!sleeveInstructions">Show</span> <span ng-show="sleeveInstructions">Hide</span> Instructions
    </button>
  </article>


	<article id="biceps-section">
		<div class="player">
			<h3>Biceps</h3>
	    <video poster="/images/video-posters/biceps.png" controls crossorigin>
        <source src="/videos/9-biceps.mp4" type="video/mp4">
        <a href="/videos/9-biceps.mp4">Download</a>
	    </video>
		</div>
		<div ng-show="bicepsInstructions" class="measurement-instructions animated slideInDown">
			<p>Measure around the biceps, with your muscles flexed.</p>
		</div>
		<label for="biceps" class="text-input-label">
			<span class="label-title">Biceps</span>
			<input id="biceps" type="tel" placeholder="00.00" ng-model="biceps" maxlength="5" mask="99.99">
			<span class="input-units">@{{ units }}</span>
		</label>
    <button type="button" class="text-button"  ng-click="bicepsInstructions = !bicepsInstructions">
    	<span ng-show="!bicepsInstructions">Show</span><span ng-show="bicepsInstructions">Hide</span> Instructions
    </button>
  </article>

	<div class="text-center">
		<button type="submit" class="black button expand">Proceed To Checkout</button>
	</div>

</form>




