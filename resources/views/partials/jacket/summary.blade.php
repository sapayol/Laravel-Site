<section class="jacket-summary" ng-controller="lookAndFitCtrl">
	<h1 class="with-subheading">
    {{{ $jacket->name }}}
  </h1>
  <span class="thin large-price">US ${{{ number_format($jacket->price) }}}</span>
  <br>
  @if ($jacket->collar_colors()->count() > 0)
    Add US $70 for detachable merino wool collar.
    <br>
    <br>
  @endif
  <div class='look-options'>
    @if ($jacket->leather_colors()->count() > 1)
      @foreach ($jacket->leather_colors() as $leather_color)
        <label class="button tiny hollow {{{ camel_case($leather_color->name) }}}" ng-class="{active: jacket.leather_color == '{{{ $leather_color->id}}}' }">{{{ $leather_color->name }}}
          <input type="radio" name="jacket_look[leather_color]" ng-model="jacket.leather_color" value="{{{ $leather_color->id }}}" ng-change="changeJacketColor()">
        </label>
      @endforeach
    @else
      {{{ $jacket->leather_colors()->first()->name }}}
    @endif
  </div>
  <em>Free shipping worldwide. Taxes and duties included.</em>
  <br>
  <a href="#design-your-look" class="button primary">Create Your Own</a>
</section>
