<section class="small-12 medium-12 large-12 columns jacket-summary">
	<h1 class="with-subheading">{{{ $jacket->name }}}</h1>
	<span class="thin large-price">${{{ number_format($jacket->price) }}}<small> USD</small></span>
	<p>
		<br>
		Perfecto-style biker leather jacket, made of black, heavy lamb leather. You can customize the hardware and lining color.
	</p>
	<a href="{!! route('jackets.look', $jacket->model) !!}" class="button expand call-to-action">
		Design yours now <span class="chevron chevron--right"></span>
	</a>
</section>
