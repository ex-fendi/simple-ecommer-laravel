<ul style="margin-top: -30px;">
    @guest

    <li><a href="{{ route('cart.index') }}">Cart <a class="badge badge-info badge-pill"> {{Cart::instance(Session::get('id_log'))->count()}} </a>
    <li><a href="{{ route('pesanan.index') }}">Pesanan</a>
    <li><a style="color: #ffff; border-bottom-width: 1px solid black;" target="_blank" href="http://desadermaji.com/docs/1.0/overview">Bantuan</a></li>
    
    @if(!Session::has('id_log'))
    <li><a style="color: #ffff;" href="{{ route('user.login')}}">Login | Register</a></li>
    @else
    <li>
        <a  class="header_color" href="{{ route('user.account.detail') }}">Akun Saya</a>
    </li>
    <li>
        <a href="{{ route('logout') }}"
            onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();">
            Keluar
        </a>
    </li>

    <form id="logout-form" action="{{ route('user.logout.submit') }}" method="POST" style="display: none;">
        {{ csrf_field() }}
    </form>
    @endif
    @endguest
    <!-- untuk cart -->
    </a></li>
   <!-- diisi nanti -->
</ul>
