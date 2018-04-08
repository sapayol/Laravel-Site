<div class="look-options-form">
  <form action="/orders" method="POST" name="createOrderForm" ng-init="init(
    {{{ $jacket->leather_types()->first()->id }}},
    {{{ $jacket->leather_colors()->first()->id }}},
    {{{ $jacket->lining_colors()->first()->id }}},
    {{{ $jacket->hardware_colors()->first()->id }}},
    {{{ $jacket->collar_colors()->count() > 0  ? $jacket->collar_colors()->first()->id : 0 }}}
    )">
    @if (empty($order))
      <h2 class="thin hide-for-small">
        {{{ !empty($order) ? 'Change' : 'Design' }}} your look <br><br>
      </h2>
    @endif

    <fieldset>
      <legend>Leather Color</legend>
      @if ($jacket->leather_colors()->count() > 1)
        @foreach ($jacket->leather_colors() as $leather_color)
          <label class="button tiny hollow {{{ camel_case($leather_color->name) }}}" ng-class="{active: jacket.leather_color == '{{{ $leather_color->id}}}' }">{{{ $leather_color->name }}}
            <input type="radio" name="jacket_look[leather_color]" ng-model="jacket.leather_color" value="{{{ $leather_color->id }}}" ng-change="changeJacketColor()">
          </label>
        @endforeach
      @else
        {{{ $jacket->leather_colors()->first()->name }}}
      @endif
    </fieldset>

    <fieldset>
      <legend>Lining Color</legend>
      @if ($jacket->lining_colors()->count() > 1)
        @foreach ($jacket->lining_colors() as $lining_color)
          <label ng-if="compatibleLinings.includes('{{{ camel_case($lining_color->name) }}}')" class="button tiny hollow {{{ camel_case($lining_color->name) }}}" ng-class="{active: jacket.lining_color == '{{{ $lining_color->id }}}' }">{{{ $lining_color->name }}}
            <input type="radio" name="jacket_look[lining_color]" ng-model="jacket.lining_color" value="{{{ $lining_color->id }}}" ng-change="updateSessionCache()">
          </label>
        @endforeach
      @else
        {{{ $jacket->lining_colors()->first()->name }}}
      @endif
    </fieldset>

    <fieldset>
      <legend>Zipper &amp; Button Color</legend>
      @if ($jacket->hardware_colors()->count() > 1)
        @foreach ($jacket->hardware_colors() as $hardware_color)
          <label class="button tiny hollow {{{ camel_case($hardware_color->name) }}}" ng-class="{active: jacket.hardware_color == '{{{ $hardware_color->id }}}' }">{{{ $hardware_color->name }}}
            <input type="radio" name="jacket_look[hardware_color]" ng-model="jacket.hardware_color" value="{{{ $hardware_color->id }}}" ng-change="updateSessionCache()">
          </label>
        @endforeach
      @else
        {{{ $jacket->hardware_colors()->first()->name }}}
      @endif
    </fieldset>
    @if ($jacket->model === 'linden')
      <fieldset>
        <legend>Collar <small>+ $70</small></legend>
      @if ($jacket->collar_colors()->count() > 1)
        @foreach ($jacket->collar_colors() as $collar_color)
          <label class="button tiny hollow {{{ camel_case($collar_color->name) }}}" ng-class="{active: jacket.collar_color == '{{{ $collar_color->id }}}' }">{{{ $collar_color->name }}}
            <input type="radio" name="jacket_look[collar_color]" ng-model="jacket.collar_color" value="{{{ $collar_color->id }}}" ng-change="updateSessionCache()">
          </label>
        @endforeach
        <label class="button tiny hollow" >None
          <input type="radio" name="jacket_look[collar_color]" ng-model="jacket.collar_color" value="0" ng-change="updateSessionCache()">
        </label>
      @else
        {{{ $jacket->hardware_colors()->first()->name }}}
      @endif
        <br>
      </fieldset>
      <input type="hidden" name="jacket_look[collar_color]" value="@{{ jacket.collar_color }}">
    @endif
    <input type="hidden" name="jacket_look[hardware_color]" value="@{{ jacket.hardware_color }}">
    <input type="hidden" name="jacket_look[lining_color]" value="@{{ jacket.lining_color }}">
    <input type="hidden" name="_token"         value="{{{ csrf_token() }}}">
    <input type="hidden" name="model"          value="{{{ $jacket->model }}}">
    @if (Auth::guest())
      <input type="hidden" name="user_id" value="@{{ user.id }}">
    @else
      <input type="hidden" name="user_id" value="{{{ Auth::user()->id }}}">
    @endif
  </form>
</div>