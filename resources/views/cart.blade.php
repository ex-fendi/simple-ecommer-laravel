
<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Dermaji e-buy</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Montserrat%7CRoboto:300,400,700" rel="stylesheet">
         <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
         <link href="{{asset('assets/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
  
        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
        <link href="{{asset('css/hover-min.css')}}" rel="stylesheet">

        <style type="text/css">
            a:hover{
                text-decoration: none;
                color: black;
            }
        </style>

    </head>
    <body>
     <div id="app">
    <header class="with-background">
        <div class="top-nav container">
            <div class="top-nav-left">
                <div class="logo"><a href="{{route('landingpage')}}">SIRANDU</a></div>
                @include('partials.menus.main')
            </div>

            <div class="top-nav-right">
                @include('partials.menus.main-right')
            </div>
        </div> 
        <!-- end top-nav -->
    </header>

    <div id="second-header" class="breadcrumb">
            <div class="ml-5" style="color:#7a7a7a">
            <h6> cart / detail</h6>
            </div>
        </div>

    <div class="cart-section container">
        <div>
            @if (session()->has('success_message'))
                <div class="alert alert-success">
                    {{ session()->get('success_message') }}
                </div>
            @endif

            @if(count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (Cart::count() > 0)

            <h2>4 item(s) in Shopping Cart</h2>

            <div class="cart-table">
                @foreach(Cart::instance(Session::get('id_log'))->content() as $cart)
                    <div class="cart-table-row">

                    <div class="cart-table-row-left">
                        <a href="#"><img src="{{asset($cart->options->asset)}}" alt="item" class="cart-table-img"></a>
                        <div class="cart-item-details">
                            <div class="cart-table-item text-left"><a href="{{route('produk.detail', ['id'=>$cart->id])}}">{{$cart->name}}</a></div>
                            <div class="cart-table-description">Percobaan</div>
                        </div>
                    </div>
                    <div class="cart-table-row-right">
                        <div class="cart-table-actions">
                            <form action="{{route('cart.remove')}}" method="POST">
                                @csrf                                
                                <input name="rowid" type="hidden" value="{{$cart->rowId}}">
                                <button type="submit" class="cart-options text-dark">Hapus</button>
                            </form>

                            <form action="#" method="POST">
                                {{ csrf_field() }}

                            </form>
                        </div>
                        <div>
                            <p style="border:1px solid black;" class="p-1 pr-3 text-center">
                               {{ $cart->qty}}
                            </p>
                        </div>
                        <div></div>
                    </div>

                </div> <!-- end cart-table-row -->
             @endforeach
                {{-- endforeach --}}
            </div> <!-- end cart-table -->

            <div class="cart-totals bg-light">
                
            <div class="cart-buttons btn-sm mt-3" style="position: center">
                <a href="{{route('shop.index', ['all'=>'all'])}}" class="button">Lanjut Berbelanja</a>
                <a href="{{route('cart.checkout')}}" class="button-primary">proses dan keluar</a>
            </div>

        </div>

            @else
            <div class="text-center">
                <i class="fa fa-shopping-cart" style="font-size: 70px;"> </i>
                <h3 class="mt-3">Keranjang anda masih kosong!</h3>
                <div class="mt-5"></div>
                <a href="{{route('shop.index', ['all'=>'all'])}}" class="button">Lanjut Berbelanja</a>
                <div class="spacer"></div>
            </div>
            @endif


    </div> <!-- end cart-section -->
    </div>
    </div>
    </div>

    {{--  @include('partials.might-like')  --}}

    @include('partials.footer-shop')
</body>
</html>

@section('extra-js')
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        
    </script>
    <script src="https://cdn.jsdelivr.net/autocomplete.js/0/autocomplete.min.js"></script>
@endsection
