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

        {{--    --}}

        <link rel="stylesheet" href="{{asset('assets/range/range.css')}}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/10.0.0/css/bootstrap-slider.min.css">
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
       <h6> Produk / all </h6>
    </div>
</div>
{{--  <div class="featured-section">
   
</div>  --}}
{{--  side bar  --}}
<div class="container mt-5">
    <div class="row">
        <div class="col-md-3" style="padding:0 30px 0 0;">
            <div class="sidebar">
                <h3>Kategori</h3>
                <div class="list-group mt-1">
                    @foreach ($kategory as $item)
                    <a href="{{route('shop.index', ['all'=>$item->id_kategory])}}" class="list-group-item list-group-item-action">{{$item->nama_kategory}}</a>
                    @endforeach
                  </div>
            </div>
            
            <div class="row text-center">
                <div class="col-md-12" style="margin-top: 20px;">
                   <div class="slider-wrapper blue">
                       <form action="{{route('shop.range')}}" method="post">
                            @csrf
                            <input class="input-range" data-slider-id='ex1Slider' type="text" data-slider-min="1000000" data-slider-tooltip="always" data-slider-max="3000000" data-slider-step="1" data-slider-value="1500000" />
                            <hr>
                            <small> Rp. 1,000,000 - <span id="to"> 0 </span> </small> <br>
                            <input type="hidden" name="batasan_harga" id="harga" value="2500000">
                            <input type="submit" class="btn-primary btn-sm mt-4 text-white" value="Cari">
                       </form>
                    </div>
                 </div>
            </div>
        </div>
            {{--  end sidebar  --}}

            {{--  produk  --}}
<div class="col-md-9">
    <div>
        {{-- <div class="row mb-4">
            <div class="col-md-12" style="">
                <div class="input-group" style="height:50px;">
                  <input type="text" style="height:50px;" class="form-control" placeholder="Cari...">
                  <div class="input-group-append">
                    <button class="btn btn-info" type="button">
                      <i class="fa fa-search"></i>
                    </button>
                  </div>
                </div>
                
            </div> --}}
        </div>
        <div class="products-header mt-5">
            <h1 class="stylish-heading" style="border: 4px">Kambing Jawa Randu</h1>
        </div>
        <div class="row" style="margin-top:-50px;">
            <div class="col-md-12 row">
                @foreach($produk as $pr)
                <div class="col-md-4 hvr-float-shadow mt-4">
                    <div class="product">
                            <div class="col-md-12 text-center mt-3">
                                <img src="{{asset($pr->foto)}}" width="100%" height="200" alt="product">
                                <h6 class="product-name"><strong><smalll> {{$pr->judul_produk}} </smalll></strong></h6>
                                <p class="product-price"> {{formatrupiah($pr->harga_kambing)}}</p>
                            </div>
                            <div class="col-md-12 text-center mt-2 ">
                                <div class="bg-gradient-primary" style="padding: 10px;">
                                    <a  href="{{route('produk.detail', ['id'=>$pr->id])}}" class="form-control btn btn-success" role="button">Lihat Detail</a>
                                </div>
                            </div>
                        </div>  
                    </div>
                    @endforeach
                </div>
                <div class="col-md-12 mt-4">
                        {{$produk->links()}}
                </div>
            </div>
        </div>
    </div>
</div> <!-- end products -->
</div>
      

            {{--  end produk  --}}
                    
    <div class="featured-section">
                
    </div>
    @include('partials.footer-shop')
    
    
    {{--    --}}
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/10.0.0/bootstrap-slider.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="https://use.fontawesome.com/fd9dba5260.js"></script>
    <script src="{{asset('assets/range/range.js')}}"></script>

    </body>
</html>





{{-- ssssssssssssssssssssssssssssss --}}
        
