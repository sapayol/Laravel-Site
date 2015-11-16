<section class="small-12 medium-9 large-6 medium-centered columns jacket-summary">
	<h1 class="with-subheading">{{{ $jacket->name }}}</h1>
	<p>
		<br>
		Perfecto&ndash;style biker leather jacket, made of black, heavy lamb leather. You can customize the hardware and lining color.
	</p>
	<span class="thin large-price"><small>US </small> ${{{ number_format($jacket->price) }}}</span><br>
	<em>Free shipping worldwide<br>Taxes and duties included</em>
	<div class="text-center">
		<a href="{!! route('jackets.look', $jacket->model) !!}" class="button expand-on-small animated slideInUp call-to-action">Design Yours Now</a>
	</div>
	<a href="{!! route('jackets.look', $jacket->model) !!}" class="button stick-to-bottom animated slideInUp expand call-to-action">
		Design yours now
	</a>
</section>
