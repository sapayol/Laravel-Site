<section class="small-12 medium-12 large-12 columns jacket-summary">
	<h1 class="with-subheading">{{{ $jacket->name }}}</h1>
	<span class="thin large-price"><small>US </small> ${{{ number_format($jacket->price) }}}</span>
	<p>
		<br>
		Perfecto&ndash;style biker leather jacket, made of black, heavy lamb leather. You can customize the hardware and lining color.
	</p>
	<a href="{!! route('jackets.look', $jacket->model) !!}" class="button animated slideInUp expand call-to-action">Design Yours Now</a>
	<a href="{!! route('jackets.look', $jacket->model) !!}" class="button stick-to-bottom animated slideInUp expand call-to-action">
		Design yours now
	</a>
</section>
