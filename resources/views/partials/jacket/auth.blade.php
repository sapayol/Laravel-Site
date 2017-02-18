  <div class="clearfix"></div>

  @if (Auth::guest())
    <div class="large-6 medium-8 small-12 medium-centered large-centered columns" ng-hide="showLogin">
      <a href="" ng-click="showLogin = true" class="button expand">Add Your Measurements</a>
      <br><br>
    </div>
    <div class="large-6 medium-8 small-12 medium-centered large-centered columns slideInDown animated" ng-show="showLogin" ng-init="showLogin = false">
      <p>
        <strong>Enter an email address and choose a password to continue.</strong>
        <br>Use your existing credentials if you&rsquo;ve already created an account.
      </p>
      @include('partials.checkout.user-registration-form')
  @elseif (Auth::user()->unfinishedOrders()->count() > 0)
    <div class="large-6 medium-8 small-12 medium-centered large-centered columns">
        <p class="medium-text-center">Looks like you're logged in as <strong>{{{ Auth::user()->email }}}</strong></p>
        <div class="text-center">
          <a href="/orders/{{{ Auth::user()->unfinishedOrders->last()->id }}}/fit/next" class="button">Finsh Your Jacket</a>
          <p>or</p>
          <a href="{{ url('/auth/logout') }}" class="underlined">Log in as someone else</a>
        </div>
    @else
      <div class="large-6 medium-8 small-12 medium-centered large-centered columns">
        <a href="" ng-click="proceedToOrder()" class="button expand">Add Your Measurements</a>
    @endif
  </div>
