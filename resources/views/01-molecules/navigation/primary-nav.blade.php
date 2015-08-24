<nav class="primary-nav" role="navigation">
  <a href="/home" class="logo left"><img src="/images/logo-black.svg" alt="Sapayol Logo"></a></li>
  <a href="" class="right menu-button" ng-class="{open: displayMenu}" ng-click="displayMenu = !displayMenu">MENU </a>
  <div class="clearfix"></div>
  <ul class="no-bullet">
    @if ($action != 'pages.who-we-are')
      <li><a href="/who-we-are">Who We Are</a></li>
    @endif
    @if ($action != 'pages.how-it-works')
      <li><a href="/how-it-works">How It Works</a></li>
    @endif
    @if ($action != 'jackets.show')
      <li><a href="/jackets">Tailored Jackets</a></li>
    @endif
    <?php $currentuser = Auth::user(); ?>
    @if ($currentuser && $currentuser->orders->count() > 0)
      @if ($action != 'orders.fit')
        <li><a href="/users/{{{ $currentuser->id }}}/orders">My Orders</a></li>
      @endif
    @endif
  </ul>
</nav>