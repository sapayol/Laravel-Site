<form action="">
	<article id="half-shoulder-section">
		<div class="flex-video">
			<h3>Half Shoulder</h3>
	    <iframe width="420" height="315" src="//www.youtube.com/embed/6wyy_j6VHzw?rel=0&modestbranding=1&autohide=1&showinfo=0&controls=0"  frameborder="0" allowfullscreen></iframe>
		</div>
		<div ng-show="shoulderInstructions" class="slideInDown">
			<h1>Half shoulder</h1>
			<h2>Start</h2>
			<p>Side of the neck, straight under the hollow behind your earlobe.</p>
			<h2>End</h2>
			<p>Raise the arm to shoulder level and a dimple will form at the shoulder bone. That’s the shoulder point.</p>
			<h2>Note</h2>
			<p>You only need to measure one side.</p>
		</div>
		<label for="half-shoulder" class="text-input-label">
			<span>Half Shoulder</span>
			<input id="half-shoulder" type="tel" placeholder="00.00" ng-model="halfShoulder" maxlength="5">
		</label>
    <fieldset>
      <label>Units</label>
      <input type="radio" name="half-shoulder-units" id="half-shoulder-unit-cm" value="cm" checked="checked"/>
      <label for="half-shoulder-unit-cm">cm</label>
      <input type="radio" name="half-shoulder-units" id="half-shoulder-unit-in" value="in"/>
      <label for="half-shoulder-unit-in">in</label>
    </fieldset>
    <button type="button" class="text-button" ng-show="!halfShoulderInstructions" ng-click="halfShoulderInstructions = !halfShoulderInstructions">Show Measurement Instructions</button>
    <button type="button" class="text-button" ng-show="halfShoulderInstructions" ng-click="halfShoulderInstructions = !halfShoulderInstructions">Hide Measurement Instructions</button>
	</article>


	<article id="shoulders-section">
		<div class="flex-video">
			<h3>Shoulders</h3>
	    <iframe width="420" height="315" src="//www.youtube.com/embed/6wyy_j6VHzw?rel=0&modestbranding=1&autohide=1&showinfo=0&controls=0"  frameborder="0" allowfullscreen></iframe>
		</div>
		<div ng-show="shoulderInstructions" class="slideInDown">
			<h1>Full shoulder</h1>
			<p>From one shoulder point (right under the dimple that forms when you raise your arm to shoulder level) to the other, across the back.</p>
			<h1>Back Width</h1>
			<h2>Start and End</h2>
			<p>Halfway between the shoulder point and the arm crease.</p>
		</div>
		<label for="shoulders" class="text-input-label">
			<span>Shoulder Length</span>
			<input id="shoulders" type="tel" placeholder="00.00" ng-model="shoulders" maxlength="5">
		</label>
    <fieldset>
      <label>Units</label>
      <input type="radio" name="shoulder-units" id="shoulder-unit-cm" value="cm" checked="checked"/>
      <label for="shoulder-unit-cm">cm</label>
      <input type="radio" name="shoulder-units" id="shoulder-unit-in" value="in"/>
      <label for="shoulder-unit-in">in</label>
    </fieldset>
    <button type="button" class="text-button" ng-show="!shoulderInstructions" ng-click="shoulderInstructions = !shoulderInstructions">Show Measurement Instructions</button>
    <button type="button" class="text-button" ng-show="shoulderInstructions" ng-click="shoulderInstructions = !shoulderInstructions">Hide Measurement Instructions</button>
	</article>



	<article id="chest-section">
		<div class="flex-video">
			<h3>Chest</h3>
    	<iframe width="420" height="315" src="//www.youtube.com/embed/9dDa8TePCR8?rel=0&modestbranding=1&autohide=1&showinfo=0&controls=0"  frameborder="0" allowfullscreen></iframe>
		</div>
		<div ng-if="chestInstructions">
			<h1>Full Chest</h1>
			<p>This measurement goes around the widest part of your chest, right across your nipples.</p>
			<ul>
				<li>Make sure that the measre tape is horizontal on the back too.</li>
				<li>Keep your arms hanging.</li>
				<li>Breathe naturally. Don’t puff your chest out.</li>
				<li>Leave enough space to fit a finger under the measure tape.</li>
			</ul>
		</div>
		<label for="chest" class="text-input-label">
			<span>Chest</span>
			<input id="chest" type="tel" placeholder="00.00" ng-model="chest" maxlength="5">
		</label>
    <fieldset>
      <label>Units</label>
      <input type="radio" name="chest-units" id="chest-unit-cm" value="cm" checked="checked"/>
      <label for="chest-unit-cm">cm</label>
      <input type="radio" name="chest-units" id="chest-unit-in" value="in"/>
      <label for="chest-unit-in">in</label>
    </fieldset>
	</article>

	<article id="stomach-section">
		<div class="flex-video">
			<h3>Stomach</h3>
    	<iframe width="420" height="315" src="//www.youtube.com/embed/Spk9gp-XqDQ?rel=0&modestbranding=1&autohide=1&showinfo=0&controls=0"  frameborder="0" allowfullscreen></iframe>
		</div>
		<div ng-if="stomachInstructions">
			<h1>Belly / Stomach</h1>
			<p>Measure horizontally around the body, just above the hipbones (for most people, that’s right across your belly button).</p>
			<p>Leave enough space to fit a finger under the measure tape. </p>
		</div>
		<label for="stomach" class="text-input-label">
			<span>Stomach</span>
			<input id="stomach" type="tel" placeholder="00.00" ng-model="stomach" maxlength="5">
		</label>
    <fieldset>
      <label>Units</label>
      <input type="radio" name="stomach-units" id="stomach-unit-cm" value="cm" checked="checked"/>
      <label for="stomach-unit-cm">cm</label>
      <input type="radio" name="stomach-units" id="stomach-unit-in" value="in"/>
      <label for="stomach-unit-in">in</label>
    </fieldset>
	</article>


	<article id="waist-section">
		<div class="flex-video">
			<h3>Waist</h3>
    	<iframe width="420" height="315" src="//www.youtube.com/embed/SK2fbnCKVJ0?rel=0&modestbranding=1&autohide=1&showinfo=0&controls=0"  frameborder="0" allowfullscreen></iframe>
		</div>
		<p ng-if="waistInstructions">
			 <h1>Waist</h1>
			<p>Measure around the hips, right where your jacket length measurement ended.</p>
			<ul>
				<li>Leave enough space to fit a finger under the measure tape.</li>
				<li>This is about five fingers lower than your “natural waist”.</li>
				<li>Don’t wear a belt for this measurement.</li>
			</ul>
		</p>
		<label for="waist" class="text-input-label">
			<span>Waist</span>
			<input id="waist" type="tel" placeholder="00.00" ng-model="waist" maxlength="5">
		</label>
    <fieldset>
      <label>Units</label>
      <input type="radio" name="waist-units" id="waist-unit-cm" value="cm" checked="checked"/>
      <label for="waist-unit-cm">cm</label>
      <input type="radio" name="waist-units" id="waist-unit-in" value="in"/>
      <label for="waist-unit-in">in</label>
    </fieldset>
	</article>

	<article id="back-section">
		<div class="flex-video">
			<h3>Jacket Length</h3>
    	<iframe width="420" height="315" src="//www.youtube.com/embed/qcM8H08LFKM?rel=0&modestbranding=1&autohide=1&showinfo=0&controls=0"  frameborder="0" allowfullscreen></iframe>
		</div>
		<div ng-if="backInstructions">
			<h1>Jacket Length</h1>
			<h2>Start</h2>
			<p>Bend your head forward. The highest bone on the back of your neck that sticks out is your starting point.</p>
			<h2>End</h2>
			<p>If you’re wearing pants that sit right on your hips (not pants with a high waist), measure to end of the waistband. Anatomically, it’s right above the sacrum.</p>
			<h2>Note</h2>
			<p>Some people like a slightly shorter or longer jacket. You will be able to express your preference later. For now, measure as indicated in the video.</p>
		</div>
		<label for="back" class="text-input-label">
			<span>Jacket Length</span>
			<input id="back" type="tel" placeholder="00.00" ng-model="back" maxlength="5">
		</label>
    <fieldset>
      <label>Units</label>
      <input type="radio" name="back-units" id="back-unit-cm" value="cm" checked="checked"/>
      <label for="back-unit-cm">cm</label>
      <input type="radio" name="back-units" id="back-unit-in" value="in"/>
      <label for="back-unit-in">in</label>
    </fieldset>
	</article>

	<article id="sleeve-section">
		<div class="flex-video">
			<h3>Sleeve Length</h3>
    	<iframe width="420" height="315" src="//www.youtube.com/embed/6qHZNR6if1Y?rel=0&modestbranding=1&autohide=1&showinfo=0&controls=0"  frameborder="0" allowfullscreen></iframe>
		</div>
		<div ng-f="sleeveInstructions">
			<h1>Sleeve</h1>
			<h2>Start</h2>
			<p>Shoulder point (where you left off for the shoulder measurement)</p>
			<h2>End</h2>
			<p>Right at the wrist, just after the bone that sticks out a little on the side of your little finger (head of ulna).</p>
			<h2>Note</h2>
			<p>Go along the arm, passing through the elbow. Don’t go straight from the shoulder to your hand.</p>
			<p>Some people like their sleeves a little longer, other a little shorter. You will be able to express your preference later. For now, measure as indicated in the video.</p>
		</div>
		<label for="sleeve" class="text-input-label">
			<span>Sleeve Length</span>
			<input id="sleeve" type="tel" placeholder="00.00" ng-model="sleeve" maxlength="5">
		</label>
    <fieldset>
      <label>Units</label>
      <input type="radio" name="sleeve-units" id="sleeve-unit-cm" value="cm" checked="checked"/>
      <label for="sleeve-unit-cm">cm</label>
      <input type="radio" name="sleeve-units" id="sleeve-unit-in" value="in"/>
      <label for="sleeve-unit-in">in</label>
    </fieldset>
	</article>

	<article id="biceps-section">
		<div class="flex-video">
			<h3>Biceps</h3>
    	<iframe width="420" height="315" src="//www.youtube.com/embed/RoA_Rusd4Bg?rel=0&modestbranding=1&autohide=1&showinfo=0&controls=0"  frameborder="0" allowfullscreen></iframe>
		</div>
		<div ng-if="bicepsInstructions">
			<h1>Biceps</h1>
			<p>Measure around the biceps, with your muscles flexed.</p>
		</div>
		<label for="biceps" class="text-input-label">
			<span>Biceps</span>
			<input id="biceps" type="tel" placeholder="00.00" ng-model="biceps" maxlength="5">
		</label>
    <fieldset>
      <label>Units</label>
      <input type="radio" name="biceps-units" id="biceps-unit-cm" value="cm" checked="checked"/>
      <label for="biceps-unit-cm">cm</label>
      <input type="radio" name="biceps-units" id="biceps-unit-in" value="in"/>
      <label for="biceps-unit-in">in</label>
    </fieldset>
	</article>
</form>




