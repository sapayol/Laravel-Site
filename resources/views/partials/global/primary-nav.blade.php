<?php $action = Request::route()->getAction()['as'] ?>

<nav class="primary-nav" role="navigation">
  <a href="/home" class="logo left"><img src="/images/logo-black.svg" alt="Sapayol Logo"></a></li>
  <a href="" class="right menu-button" ng-class="{open: displayMenu}" ng-click="displayMenu = !displayMenu">MENU </a>
  <div class="clearfix"></div>
  <ul class="no-bullet">
    <li><a href="/who-we-are"   class="{{{ $action == 'pages.who-we-are' ? 'hide-for-small-only' : ''}}}">Who We Are</a></li>
    <li><a href="/how-it-works" class="{{{ $action == 'pages.how-it-works' ? 'hide-for-small-only' : ''}}}">How It Works</a></li>
    <li><a href="/jackets"      class="{{{ $action == 'jackets.index' ? 'hide-for-small-only' : ''}}}">Tailored Jackets</a></li>
    <?php $currentuser = Auth::user(); ?>
    @if ($currentuser && $currentuser->unfinishedOrders->count() > 0)
      @if (strpos($action,'orders') !== 0)
        <li class="main-item"><a href="/orders/{{{ $currentuser->unfinishedOrders->first()->id }}}">My Jacket</a></li>
      @endif
    @endif
  </ul>
</nav>

<div class="page-wrap {{{ $action == 'pages.home' || $action == 'pages.terms' || $action == 'pages.our-leather' ? 'deep-info-page' : '' }}} {{{ strpos($action, 'pages') === 0 ? 'on-info-page' : '' }}} {{{ Auth::user() && Auth::user()->unfinishedOrders->count() > 0 || strpos($action, 'orders') === 0  ? 'with-existing-order' : '' }}}" ng-class="{descended: displayMenu}">

