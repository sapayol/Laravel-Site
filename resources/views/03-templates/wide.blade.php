{!! view('00-atoms.meta._head') !!}

{!! view('01-molecules.navigation.primary-nav') !!}

@yield('header')

@yield('main')

@yield('footer')

{!! view('00-atoms.meta._foot') !!}
