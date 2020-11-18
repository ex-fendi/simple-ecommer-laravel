<header>
    <div class="top-nav container">
      <div class="top-nav-left">
          <div class="logo"><a href="{{route('landingpage')}}">Pasar Hewan</a></div>
          @if (! (request()->is('checkout') || request()->is('guestCheckout')))
          {{ menu('main', 'partials.menus.main') }}
          @endif
      </div>
      <div class="top-nav-right"><!-- <a class="header_color">ss</a> --> 
          @if (! (request()->is('checkout') || request()->is('guestCheckout')))
          @include('partials.menus.main-right')
          @endif
      </div>
    </div> <!-- end top-nav -->
</header>
