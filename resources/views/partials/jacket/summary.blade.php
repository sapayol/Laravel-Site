<section class="small-12 medium-12 large-12 columns jacket-summary">
	<h1 class="with-subheading">{{{ $jacket->name }}}</h1>
	<span class="thin large-price"><small>US </small> ${{{ number_format($jacket->price) }}}</span>
	<p>
		<br>
		Perfecto&ndash;style biker leather jacket, made of black, heavy lamb leather. You can customize the hardware and lining color.
	</p>
	<div class="text-center">
		<a href="{!! route('jackets.look', $jacket->model) !!}" class="button expand-for-small animated slideInUp call-to-action">Design Yours Now</a>
	</div>
	<a href="{!! route('jackets.look', $jacket->model) !!}" class="button hide-for-medium-up stick-to-bottom animated slideInUp expand call-to-action">
		Design yours now
	</a>
</section>
