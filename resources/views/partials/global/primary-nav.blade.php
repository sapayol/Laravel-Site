<?php
  if (request()->route()  && array_key_exists('as', request()->route()->getAction())) {
    $action = request()->route()->getAction()['as'];
  } else {
    $action = null;
  }
 ?>

<div class="row">
  <nav class="primary-nav large-12 medium-12 small-12 columns" role="navigation">
    <a href="/home" class="logo left"><img src="/images/logo-black.svg" alt="Sapayol Logo"></a>
    <a href="" class="right underlined menu-button" ng-class="{open: displayMenu}" ng-click="displayMenu = !displayMenu">MENU </a>
    <div class="clearfix"></div>
    <div class="right text-right secondary-nav">
      @if (isset($current_user))
        @if ($current_user->isAdmin())
          <a class="" href="{{{ route('admin.order-index') }}}">All Orders</a>
        @endif
        @if ($current_user->orders->last() && $current_user->orders->last()->status == 'started' && $action !== 'users.show')
          <a href="/orders/{{{ $current_user->orders->last()->id }}}" class=" highlight-color">Your Order</a>
        @endif
        <a class="" href="/auth/logout">Logout</a>
      @else
        <a class="" href="/auth/login">Login</a>
      @endif
    </div>
    <ul class="no-bullet">
      <li class="{{{ strpos($action, 'jackets') === 0 ? 'current' : ''}}}"><a class="underlined" href="/jackets">Our Jackets</a></li>
      <li class="{{{ $action == 'pages.how-it-works' ? 'current' : ''}}}"><a class="underlined" href="/how-it-works">How It Works</a></li>
      <li class="{{{ $action == 'pages.who-we-are' ? 'current' : ''}}}"><a class="underlined" href="/who-we-are">Who We Are</a></li>
    </ul>
  </nav>
</div>

<div class="@yield('page_wrap_class') page-wrap" ng-class="{descended: displayMenu}">

