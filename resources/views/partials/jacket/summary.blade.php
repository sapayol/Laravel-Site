<section class="jacket-summary">
	<h1 class="with-subheading">
    {{{ $jacket->name }}}
  </h1>
  <span class="thin large-price">US ${{{ number_format($jacket->price) }}}</span>
  <br>
  @if ($jacket->collar_colors()->count() > 0)
    including detachable merino wool collar
    <br>
    <br>
  @endif
  <em>Free shipping worldwide. Taxes and duties included.</em>
  <br>
  <a href="#design-your-look" class="button primary">Create Your Own</a>
</section>
