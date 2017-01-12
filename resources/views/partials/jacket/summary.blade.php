<section class="small-12 medium-9 large-6 medium-centered columns jacket-summary">
	<h1 class="with-subheading">
    {{{ $jacket->name }}}
    @if ($jacket->collar_colors()->count() > 0)
      <small>with detachable merino wool collar</small>
    @endif
  </h1>
  <br>
	<span class="thin large-price"><small>US </small> ${{{ number_format($jacket->price) }}}</span>
  <br>
	<em>Free shipping worldwide. Taxes and duties included.</em>
</section>
