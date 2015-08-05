<form action="">
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
		<div class="flex-video">
			<h3>Half Shoulder</h3>
	    <iframe width="420" height="315" src="//www.youtube.com/embed/6wyy_j6VHzw?rel=0&modestbranding=1&autohide=1&showinfo=0&controls=0"  frameborder="0" allowfullscreen></iframe>
	    {{-- <img src="http://placehold.it/420x315" alt=""> --}}
		</div>
		<div ng-show="halfShoulderInstructions" class="slideInDown">
			<h4>Start</h4>
			<p>Side of the neck, straight under the hollow behind your earlobe.</p>
			<h4>End</h4>
			<p>Raise the arm to shoulder level and a dimple will form at the shoulder bone. That’s the shoulder point.</p>
			<h4>Note</h4>
			<p>You only need to measure one side.</p>
		</div>
		<label for="half-shoulder" class="text-input-label">
			<span class="label-title">Half Shoulder</span>
			<input id="half-shoulder" type="tel" placeholder="00.00" ng-model="halfShoulder" maxlength="5">
			<span class="input-units">@{{ units }}</span>
		</label>
    <button type="button" class="text-button"  ng-click="halfShoulderInstructions = !halfShoulderInstructions">
    	<span ng-show="!halfShoulderInstructions">Show</span> <span ng-show="halfShoulderInstructions">Hide</span> Instructions
    </button>
	</article>


	<article id="shoulders-section">
		<div class="flex-video">
			<h3>Full Shoulder</h3>
	    <iframe width="420" height="315" src="//www.youtube.com/embed/6wyy_j6VHzw?rel=0&modestbranding=1&autohide=1&showinfo=0&controls=0"  frameborder="0" allowfullscreen></iframe>
	    {{-- <img src="http://placehold.it/420x315" alt=""> --}}
		</div>
		<div ng-show="shoulderInstructions" class="slideInDown">
			<p>From one shoulder point (right under the dimple that forms when you raise your arm to shoulder level) to the other, across the back.</p>
		</div>
		<label for="shoulders" class="text-input-label">
			<span class="label-title">Shoulder Length</span>
			<input id="shoulders" type="tel" placeholder="00.00" ng-model="shoulders" maxlength="5">
			<span class="input-units">@{{ units }}</span>
		</label>
    <button type="button" class="text-button"  ng-click="shoulderInstructions = !shoulderInstructions">
    	<span ng-show="!shoulderInstructions">Show</span> <span ng-show="shoulderInstructions">Hide</span> Instructions
    </button>
	</article>


	<article id="chest-section">
		<div class="flex-video">
			<h3>Chest</h3>
    	<iframe width="420" height="315" src="//www.youtube.com/embed/9dDa8TePCR8?rel=0&modestbranding=1&autohide=1&showinfo=0&controls=0"  frameborder="0" allowfullscreen></iframe>
    	{{-- <img src="http://placehold.it/420x315" alt=""> --}}
		</div>
		<div ng-if="chestInstructions">
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
			<input id="chest" type="tel" placeholder="00.00" ng-model="chest" maxlength="5">
			<span class="input-units">@{{ units }}</span>
		</label>
    <button type="button" class="text-button"  ng-click="chestInstructions = !chestInstructions">
    	<span ng-show="!chestInstructions">Show</span> <span ng-show="chestInstructions">Hide</span> Instructions
    </button>
  </article>


	<article id="stomach-section">
		<div class="flex-video">
			<h3>Stomach</h3>
    	<iframe width="420" height="315" src="//www.youtube.com/embed/Spk9gp-XqDQ?rel=0&modestbranding=1&autohide=1&showinfo=0&controls=0"  frameborder="0" allowfullscreen></iframe>
    	{{-- <img src="http://placehold.it/420x315" alt=""> --}}
		</div>
		<div ng-if="stomachInstructions">
			<p>Measure horizontally around the body, just above the hipbones (for most people, that’s right across your belly button).</p>
			<p>Leave enough space to fit a finger under the measure tape. </p>
		</div>
		<label for="stomach" class="text-input-label">
			<span class="label-title">Stomach</span>
			<input id="stomach" type="tel" placeholder="00.00" ng-model="stomach" maxlength="5">
			<span class="input-units">@{{ units }}</span>
		</label>
    <button type="button" class="text-button"  ng-click="stomachInstructions = !stomachInstructions">
    	<span ng-show="!stomachInstructions">Show</span> <span ng-show="stomachInstructions">Hide</span> Instructions
    </button>
  </article>


	<article id="waist-section">
		<div class="flex-video">
			<h3>Waist</h3>
    	<iframe width="420" height="315" src="//www.youtube.com/embed/SK2fbnCKVJ0?rel=0&modestbranding=1&autohide=1&showinfo=0&controls=0"  frameborder="0" allowfullscreen></iframe>
    	{{-- <img src="http://placehold.it/420x315" alt=""> --}}
		</div>
		<div ng-if="waistInstructions">
			<p>Measure around the hips, right where your jacket length measurement ended.</p>
			<ul>
				<li>Leave enough space to fit a finger under the measure tape.</li>
				<li>This is about five fingers lower than your “natural waist”.</li>
				<li>Don’t wear a belt for this measurement.</li>
			</ul>
		</div>
		<label for="waist" class="text-input-label">
			<span class="label-title">Waist</span>
			<input id="waist" type="tel" placeholder="00.00" ng-model="waist" maxlength="5">
			<span class="input-units">@{{ units }}</span>
		</label>
    <button type="button" class="text-button"  ng-click="waistInstructions = !waistInstructions">
    	<span ng-show="!waistInstructions">Show</span> <span ng-show="waistInstructions">Hide</span> Instructions
    </button>
  </article>


	<article id="back-section">
		<div class="flex-video">
			<h3>Back</h3>
    	<iframe width="420" height="315" src="//www.youtube.com/embed/qcM8H08LFKM?rel=0&modestbranding=1&autohide=1&showinfo=0&controls=0"  frameborder="0" allowfullscreen></iframe>
    	{{-- <img src="http://placehold.it/420x315" alt=""> --}}
		</div>
		<div ng-if="backInstructions">
			<h4>Start and End</h4>
			<p>Halfway between the shoulder point and the arm crease.</p>
		</div>
		<label for="back" class="text-input-label">
			<span class="label-title">Back</span>
			<input id="back" type="tel" placeholder="00.00" ng-model="back" maxlength="5">
			<span class="input-units">@{{ units }}</span>
		</label>
    <button type="button" class="text-button"  ng-click="backInstructions = !backInstructions">
    	<span ng-show="!backInstructions">Show</span> <span ng-show="backInstructions">Hide</span> Instructions
    </button>
  </article>


	<article id="jacket-length-section">
		<div class="flex-video">
			<h3>Jacket Length</h3>
    	<iframe width="420" height="315" src="//www.youtube.com/embed/qcM8H08LFKM?rel=0&modestbranding=1&autohide=1&showinfo=0&controls=0"  frameborder="0" allowfullscreen></iframe>
    	{{-- <img src="http://placehold.it/420x315" alt=""> --}}
		</div>
		<div ng-if="jacketLengthInstructions">
			<h4>Start</h4>
			<p>Bend your head forward. The highest bone on the jacket-length of your neck that sticks out is your starting point.</p>
			<h4>End</h4>
			<p>If you’re wearing pants that sit right on your hips (not pants with a high waist), measure to end of the waistband. Anatomically, it’s right above the sacrum.</p>
			<h4>Note</h4>
			<p>Some people like a slightly shorter or longer jacket. You will be able to express your preference later. For now, measure as indicated in the video.</p>
		</div>
		<label for="jacket-length" class="text-input-label">
			<span class="label-title">Jacket Length</span>
			<input id="jacket-length" type="tel" placeholder="00.00" ng-model="jacketLength" maxlength="5">
			<span class="input-units">@{{ units }}</span>
		</label>
    <button type="button" class="text-button"  ng-click="jacketLengthInstructions = !jacketLengthInstructions">
    	<span ng-show="!jacketLengthInstructions">Show</span> <span ng-show="jacketLengthInstructions">Hide</span> Instructions
    </button>
  </article>


	<article id="sleeve-section">
		<div class="flex-video">
			<h3>Sleeve Length</h3>
    	<iframe width="420" height="315" src="//www.youtube.com/embed/6qHZNR6if1Y?rel=0&modestbranding=1&autohide=1&showinfo=0&controls=0"  frameborder="0" allowfullscreen></iframe>
    	{{-- <img src="http://placehold.it/420x315" alt=""> --}}
		</div>
		<div ng-if="sleeveInstructions">
			<h4>Start</h4>
			<p>Shoulder point (where you left off for the shoulder measurement)</p>
			<h4>End</h4>
			<p>Right at the wrist, just after the bone that sticks out a little on the side of your little finger (head of ulna).</p>
			<h4>Note</h4>
			<p>Go along the arm, passing through the elbow. Don’t go straight from the shoulder to your hand.</p>
			<p>Some people like their sleeves a little longer, other a little shorter. You will be able to express your preference later. For now, measure as indicated in the video.</p>
		</div>
		<label for="sleeve" class="text-input-label">
			<span class="label-title">Sleeve Length</span>
			<input id="sleeve" type="tel" placeholder="00.00" ng-model="sleeve" maxlength="5">
			<span class="input-units">@{{ units }}</span>
		</label>
    <button type="button" class="text-button"  ng-click="sleeveInstructions = !sleeveInstructions">
    	<span ng-show="!sleeveInstructions">Show</span> <span ng-show="sleeveInstructions">Hide</span> Instructions
    </button>
  </article>


	<article id="biceps-section">
		<div class="flex-video">
			<h3>Biceps</h3>
    	<iframe width="420" height="315" src="//www.youtube.com/embed/RoA_Rusd4Bg?rel=0&modestbranding=1&autohide=1&showinfo=0&controls=0"  frameborder="0" allowfullscreen></iframe>
    	{{-- <img src="http://placehold.it/420x315" alt=""> --}}
		</div>
		<div ng-if="bicepsInstructions">
			<p>Measure around the biceps, with your muscles flexed.</p>
		</div>
		<label for="biceps" class="text-input-label">
			<span class="label-title">Biceps</span>
			<input id="biceps" type="tel" placeholder="00.00" ng-model="biceps" maxlength="5">
			<span class="input-units">@{{ units }}</span>
		</label>
    <button type="button" class="text-button"  ng-click="bicepsInstructions = !bicepsInstructions">
    	<span ng-show="!bicepsInstructions">Show</span><span ng-show="bicepsInstructions">Hide</span> Instructions
    </button>
  </article>
</form>




