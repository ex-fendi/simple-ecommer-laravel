
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
                color:black;
                text-decoration: none;
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
            @if (count($order) > 0)
            <h2>Riwayat Pesanan</h2>
            <div class="cart-table">
                @foreach($order as $or)
                    <div class="cart-table-row">
                    <div class="cart-table-row-right">
                        <a href="#"><img src="{{asset($or->foto)}}" alt="item" class="cart-table-img"></a>
                        <div class="cart-item-details text-right" style="padding-top:21px;">
                            <a href="{{route('pesanan.detail', ['id'=>$or->id_order])}}">{{$or->id_order}}</a>
                        </div>
                    </div>

                    <div class="cart-table-row-right" style="padding-top:30px;">
                        <div class="text-right">
                            {{$or->nama_pembeli}}
                        </div>
                    </div>
                    <div style="padding-top:0px;">
                       
                            @if($or->status == 1)
                            <button type="button" class="btn btn-info btn-sm text-white"> 
                                <i class="fa fa-file-invoice-dollar"> </i>
                            </button>
                            @elseif($or->status == 2)
                            <button type="button" class="btn btn-danger btn-sm">     
                                <i class="fa fa-window-close"> </i>
                            </button>
                            @elseif($or->status == 3)
                            <button type="button" class="btn btn-primary btn-sm">     
                                <i class="fa fa-money-check-alt"> </i>
                            </button>
                            @elseif($or->status == 4)
                            <button type="button" class="btn btn-primary btn-sm">     
                                <i class="fa fa-people-carry"> </i>
                            </button>
                            @elseif($or->status == 5)
                            <button type="button" class="btn btn-primary btn-sm">     
                                <i class="fa fa-shipping-fast"> </i>
                            </button>
                            @elseif($or->status == 7)
                            <button type="button" class="btn btn-success btn-sm">     
                                <i class="fa fa-check-circle"> </i>
                            </button>
                            @elseif($or->status == 8)
                            <button type="button" class="btn btn-primary btn-sm">     
                                <i class="fa fa-warehouse"> </i>
                            </button>
                            @endif
                    </div>
                </div> <!-- end cart-table-row -->
             @endforeach
            </div> <!-- end cart-table -->
            @endif
            {{$order->links()}}
        </div>
         <!-- end cart-section -->
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
