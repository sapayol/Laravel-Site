<section class="small-12 medium-12 large-12 columns text-center jacket-summary">
	<h1 class="with-subheading">{{{ $jacket->name }}}</h1>
	<span class="thin large-price">${{{ number_format($jacket->price) }}}<small> USD</small></span>
	{{-- <a href="{!! route('jackets.look', $jacket->model) !!}" class="button black expand call-to-action"> --}}
	<a href="{!! route('jackets.look', $jacket->model) !!}" class="button success expand call-to-action">
		Customize Yours Now <span class="chevron chevron--right"></span>
	</a>
</section>