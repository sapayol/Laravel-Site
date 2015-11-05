<?php $action = Request::route() !== null ? Request::route()->getAction()['as'] : null ?>
<?php $uri = Request::route()->getUri(); ?>
<?php $currentuser = Auth::user(); ?>

<div class="row">
  <nav class="primary-nav large-12 medium-12 small-12 columns" role="navigation">
    <a href="/home" class="logo left"><img src="/images/logo-black.svg" alt="Sapayol Logo"></a></li>
    <a href="" class="right menu-button" ng-class="{open: displayMenu}" ng-click="displayMenu = !displayMenu">MENU </a>
    <div class="clearfix"></div>
    <ul class="no-bullet">
      <small class="right text-right">
        <span class="pipe"> | </span>
        @if ($currentuser)
          @if ($currentuser->isAdmin())
            <a href="{{{ route('admin.order-index') }}}">Orders</a><br>
          @endif
          @if ($action !== 'users.show')
            <a href="{{{ route('users.show', $currentuser->id) }}}">Your Profile</a><br>
          @endif
          <a href="/auth/logout">Logout</a>
        @elseif (!$currentuser && !strpos($uri, 'login'))
          <a href="/auth/login">Login</a>
        @endif
      </small>
      <li class="{{{ strpos($action, 'jackets') === 0 ? 'current' : ''}}}"><a href="/jackets">Our Jackets</a></li>
      <li class="{{{ $action == 'pages.who-we-are' ? 'current' : ''}}}"><a href="/who-we-are">Who We Are</a></li>
      <li class="{{{ $action == 'pages.how-it-works' ? 'current' : ''}}}"><a href="/how-it-works">How It Works</a></li>
      @if ($currentuser && $currentuser->orders->last() && $currentuser->orders->last()->status == 'started')
        @if ((strpos($action,'orders') !== 0 && strpos($action,'fit') !== 0) && $action !== 'users.show' || $action = 'jackets.index')
          <li class="main-item"><a href="/orders/{{{ $currentuser->orders->last()->id }}}">Your Order</a></li>
        @endif
      @endif
    </ul>
  </nav>
</div>



<div class="@yield('page_wrap_class') page-wrap" ng-class="{descended: displayMenu}">

