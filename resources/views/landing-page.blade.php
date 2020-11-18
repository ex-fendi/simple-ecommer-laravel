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

        <!-- Styles -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">

        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
        <link href="{{asset('css/hover-min.css')}}" rel="stylesheet">
        <style type="text/css">
            .social_footer_ul { display:table; margin:15px auto 0 auto; list-style-type:none;  }
            .social_footer_ul li { padding-left:20px; padding-top:10px; float:left; }
            .social_footer_ul li a { color:#CCC; border:1px solid #CCC; padding:8px;border-radius:50%;}
            .social_footer_ul li i {  width:20px; height:20px; text-align:center;}
        </style>

    </head>
    <body>
        <div id="app">
            <header class="with-background">
                <div class="top-nav container">
                    <div class="top-nav-left">
                        <div class="logo">{{$general->app}}</div>
                        @include('partials.menus.main')
                    </div>
        
                    <div class="top-nav-right">
                        @include('partials.menus.main-right')
                    </div>
                </div> <!-- end top-nav -->
            </header>

    @if(Session::has('flash'))
    <div class="row">
        <div class="container">
            <div class="col-md-12 bg-success mt-5 breadcrumb" style="opacity:0.5; color:#fff;">
                    {{Session::get('flash')}}  
                    @php
                        Session::forget('flash');    
                    @endphp
            </div>
            
        </div>
    </div>
    @endif
    {{--  jumbotron jumbotron-fluid  --}}
    <div class="mt-4">
        <div class="container" style="background-color: transparent;" >
            @include('components.carousel')
        </div>
    </div>
 <!-- produks sample show -->
    <div class="container mt-4">
        <div class="row ">
            @foreach($produk as $produk)
            <div class="col-md-3 hvr-float-shadow">
                      <div class="product">
                        <div class="col-md-12 text-center mt-3">
                                <img src="{{asset($produk->foto)}}" width="100%" height="200" alt="product">
                                <h6 class="product-name"><strong><smalll> {{$produk->judul_produk}} </smalll></strong></h6>
                                <p class="product-price">  {{formatRupiah($produk->harga_kambing)}}</p>
                        </div>
                        <div class="col-md-12 text-center mt-2 ">
                            <div class="bg-gradient-primary" style="padding: 10px;">
                                
                                <a  href="{{route('produk.detail', ['id_produk'=>$produk->id])}}" class="form-control btn btn-success" role="button">Lihat Detail</a>
                            </div>
                        </div>
                </div>  
            </div>    
            @endforeach
        </div>

        {{--  end row  --}}

                    <div class="text-center button-container">
                        <a href="{{ route('shop.index', ['all'=>'all']) }}" class="button">Lihat lebih Banyak </a>
                    </div>
</div>
            <div class="featured-section">

                <div class="container">
                    <h1 class="text-center">SIRANDU</h1>
                    <p class="section-description text-center" style="margin-top: -20px;">{{$general->deskripsi}}</p>

                </div> 
            </div>
            <div class="featured-section">
                @include('components.blog')
            </div>
                @include('partials.footer-shop')
        <script src="js/app.js"></script>
        
        
    </body>
</html>