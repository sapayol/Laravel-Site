<form action="">
	<article id="shoulders-section">
		<div class="flex-video">
			<h3>Shoulders</h3>
	    <iframe width="420" height="315" src="//www.youtube.com/embed/6wyy_j6VHzw?rel=0&modestbranding=1&autohide=1&showinfo=0&controls=0"  frameborder="0" allowfullscreen></iframe>
		</div>
		<p ng-show="shoulderInstructions" class="slideInDown">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Incidunt aut ipsum nesciunt?</p>
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
		<p ng-if="chestInstructions">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Incidunt aut ipsum nesciunt?</p>
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

	<article id="mid-section">
		<div class="flex-video">
			<h3>Mid</h3>
    	<iframe width="420" height="315" src="//www.youtube.com/embed/Spk9gp-XqDQ?rel=0&modestbranding=1&autohide=1&showinfo=0&controls=0"  frameborder="0" allowfullscreen></iframe>
		</div>
		<p ng-if="midInstructions">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Incidunt aut ipsum nesciunt?</p>
		<label for="mid" class="text-input-label">
			<span>Mid</span>
			<input id="mid" type="tel" placeholder="00.00" ng-model="mid" maxlength="5">
		</label>
    <fieldset>
      <label>Units</label>
      <input type="radio" name="mid-units" id="mid-unit-cm" value="cm" checked="checked"/>
      <label for="mid-unit-cm">cm</label>
      <input type="radio" name="mid-units" id="mid-unit-in" value="in"/>
      <label for="mid-unit-in">in</label>
    </fieldset>
	</article>

	<article id="waist-section">
		<div class="flex-video">
			<h3>Waist</h3>
    	<iframe width="420" height="315" src="//www.youtube.com/embed/SK2fbnCKVJ0?rel=0&modestbranding=1&autohide=1&showinfo=0&controls=0"  frameborder="0" allowfullscreen></iframe>
		</div>
		<p ng-if="waistInstructions">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Recusandae iste, similique at!</p>
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
			<h3>Back Length</h3>
    	<iframe width="420" height="315" src="//www.youtube.com/embed/qcM8H08LFKM?rel=0&modestbranding=1&autohide=1&showinfo=0&controls=0"  frameborder="0" allowfullscreen></iframe>
		</div>
		<p ng-if="backInstructions">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quisquam inventore ullam voluptatum?</p>
		<label for="back" class="text-input-label">
			<span>Back Length</span>
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
		<p ng-if="sleeveInstructions">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Libero voluptatum, asperiores provident.</p>
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
		<p ng-if="bicepsInstructions">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur fugit temporibus dolorum.</p>
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