<section class="small-12 medium-9 large-6 medium-centered columns jacket-summary">
	<h1 class="with-subheading">
    {{{ $jacket->name }}}
  </h1>
  <span class="thin large-price">US ${{{ number_format($jacket->price) }}}</span>
  <br>
  @if ($jacket->collar_colors()->count() > 0)
    including detachable merino wool collar
  @endif
  <br>
	<em>Free shipping worldwide. Taxes and duties included.</em>
</section>
