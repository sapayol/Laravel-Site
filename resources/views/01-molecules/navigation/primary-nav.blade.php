<nav class="primary-nav" role="navigation">
  <a href="/home" class="logo"><img src="/images/logo-black.svg" alt="Sapayol Logo"></a></li>
  <ul class="no-bullet">
    {{-- <li class="{!! Request::is('jackets') ? 'active' : '' !!}"> --}}
      {{-- <a href="/jackets">Our Jackets</a> --}}
    {{-- </li> --}}
    <li class="{!! Request::is('who-we-are') ? 'active' : '' !!}">
      <a href="/who-we-are">Who We Are</a>
    </li>
    <li class="{!! Request::is('how-it-works') ? 'active' : '' !!}">
      <a href="/how-it-works">How It Works</a>
    </li>
    <li class="{!! Request::is('jackets/bomber') ? 'active' : '' !!}">
      <a href="/jackets/bomber">Our Signature Jacket</a>
    </li>
    @if (Request::is('jackets/*/*') || Request::is('checkout'))
      <li class="{!! Request::is('checkout') ? 'active' : '' !!}">
        <a href="/jackets/bomber/look">Your Order</a>
      </li>
    @endif
  </ul>
</nav>