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
      <li><a href="/jackets/bomber">Tailored Jackets</a></li>
    @endif
  </ul>
</nav>
