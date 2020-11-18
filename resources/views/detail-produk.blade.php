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
        
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
        <link href="{{asset('css/hover-min.css')}}" rel="stylesheet">

        <style type="text/css">
            a:hover{
                color: none;
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
                    </div> <!-- end top-nav -->
            </header>

            <div id="second-header" class="breadcrumb">
                <div class="ml-5" style="color:#7a7a7a">
                <h6> Produk / details / </h6>
                </div>
            </div>

    @if(Session::has('flash'))
    <div class="row">
        <div class="container">
            <div class="col-md-12 bg-danger mt-5 breadcrumb" style="opacity:0.5; color:#fff;">
                    {{Session::get('flash')}}  
                    @php
                        Session::forget('flash');    
                    @endphp
            </div>
            
        </div>
    </div>
    @endif
    <div class="product-section container" style="margin-top:-40px;">
        <div>
            <div class="product-section-image">
                <img src="{{asset($produk->foto)}}" alt="product" class="active" id="currentImage">
            </div>
            <div class="product-section-images">
                <div class="product-section-thumbnail selected">
                    <img src="{{asset($produk->foto)}}" alt="product">
                </div>
            </div>
        </div>
        <div class="product-section-information">
            <h1 class="product-section-title">{{$produk->judul_produk}}</h1>
            <div class="">
                <strong><a href="#" style="color: #5490dc">{{$produk->nama_user}}</a></strong>
            </div>
            
            <div><i class="fa fa-stars"></i></div>
            <div id="detail" class="mt-3">
                <p> Umur : {{$produk->umur_kambing}} <span style="font-size: 12px;"> th </span></p>
                <p style="margin-top: -15px;"> Tinggi :  {{$produk->tinggi_kambing}} <span style="font-size: 12px;"> Cm </span> </p>
                <p style="margin-top: -15px;"> Berat :  {{$produk->berat_kambing}} <span style="font-size: 12px;"> Cm </span> </p>
                <p style="margin-top: -15px;"> Panjang  :  {{$produk->panjang_kambing}} <span style="font-size: 12px;"> Cm </span></p>
                <p style="margin-top: -15px;"> Lingkar  :  {{$produk->lingkar_kambing}} <span style="font-size: 12px;"> Cm </span></p>
            </div>
            <div id="deskripsi">
                {{$produk->deskripsi_kambing}}
            </div>
            <div class="product-section-price mt-1">{{formatrupiah($produk->harga_kambing)}}</div>
            <form action="{{route('cart.add')}}" method="POST">
                @csrf
                <div class="">
                    Tersedia : {{$produk->stok}} Ekor
                </div>
                <div class="row mt-3">
                <div class="col-md-2 text-left">
                    Pesan:
                </div>
                <div class="col-md-2 text-left" style="padding: auto 0px;">
                    <p>
                        <input type="number" name="qty" class="form-control" value="1" max="{{$produk->stok}}">
                    </p>
                </div>
                </div>

                <p>&nbsp;</p>
                    <input type="hidden" name="asset" value="{{$produk->foto}}">
                    <input type="hidden" name="nama" value="{{$produk->judul_produk}}">
                    <input type="hidden" name="id" value="{{$produk->id}}">
                    <input type="hidden" name="harga" value="{{$produk->harga_kambing}}">
                    <button type="submit" class="btn btn-primary btn-xs form-control">Tambah Ke Keranjang</button>
            </form>
        </div>
    </div> <!-- end product-section -->

    @include('partials.might-like')

    @include('partials.footer-shop')

    <script src="js/app.js"></script>
    </body>
</html>
