<?php $action = Request::route()->getAction()['as'] ?>

<div class="row">
  <nav class="primary-nav large-12 medium-12 small-12 columns" role="navigation">
    <a href="/home" class="logo left"><img src="/images/logo-black.svg" alt="Sapayol Logo"></a></li>
    <a href="" class="right menu-button" ng-class="{open: displayMenu}" ng-click="displayMenu = !displayMenu">MENU </a>
    <div class="clearfix"></div>
    <ul class="no-bullet">
      <li class="{{{ $action == strpos($action, 'jackets') ? 'current' : ''}}}"><a href="/jackets">Our Jackets</a></li>
      <li class="{{{ $action == 'pages.who-we-are' ? 'current' : ''}}}"><a href="/who-we-are">Who We Are</a></li>
      <li class="{{{ $action == 'pages.how-it-works' ? 'current' : ''}}}"><a href="/how-it-works">How It Works</a></li>
      <?php $currentuser = Auth::user(); ?>
      @if ($currentuser && $currentuser->unfinishedOrders->count() > 0)
        @if (strpos($action,'orders') !== 0)
          <li class="main-item"><a href="/orders/{{{ $currentuser->unfinishedOrders->first()->id }}}">Your Order</a></li>
        @endif
      @endif
    </ul>
  </nav>
</div>



<div class="page-wrap {{{ strpos($action, 'pages') === 0  ? 'headless-page' : '' }}} {{{ strpos($action, 'pages') === 0 ? 'on-info-page' : '' }}} {{{ Auth::user() && Auth::user()->unfinishedOrders->count() > 0 || strpos($action, 'orders') === 0  ? 'with-existing-order' : '' }}}" ng-class="{descended: displayMenu}">

