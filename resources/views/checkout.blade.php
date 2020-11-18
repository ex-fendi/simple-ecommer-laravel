
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
</head>
<body>

     {{--  Modal  --}}
     <div class="modal fade" id="penitipan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document" style="overflow-y: scroll; max-height:85%;  margin-top: 50px; margin-bottom:50px;">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Pilih Penitipan</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                <div class="container">
                    <div class="row">

                        @foreach($kandang as $kandang)
                        <div class="col-md-12">
                            <div class="spacer"></div>
                            <div class="container-fluid">
                                <form action="{{route('penitipan.store')}}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                    <div class="card" style="padding:10px;">
                                      <div class="card-block">
                                        <div class="row">
                                            <div class="col-md-3 text-center">
                                                <input type="hidden" name="id_kandang" value="{{$kandang->id}}">
                                                <input type="hidden" name="kandang" value="{{$kandang->foto}}">
                                                <input type="hidden" name="perhari" value="{{$kandang->harga}}">
                                                  <img src="{{asset($kandang->foto)}}" style="height:100px ; width:100px;" alt="" class="btn-md">
                                                  <br/>
                                                  <i class="fa fa-users text-primary"> </i><span style="font-size: 14px;font-family: Arial, Helvetica, sans-serif">
                                                        {{$kandang->nama_user}} 
                                                    </span>

                                            </div>
                                            <div class="col-md-6">
                                                <div class="" style="padding-top:10px;">
                                                  <p class="card-text" style="font-size: 14px;"><strong>Lokasi:</strong> {{$kandang->lokasi}}</p>
                                                  <p class="card-text" style="font-size: 14px;"><strong>Fasilitas: </strong></p>
                                                  <p style="font-size: 14px;"> {{$kandang->fasilitas}} </p>
                                                </div>
                                            </div>
                                            <div class="col-md-12 text-right">                                               
                                                <input type="submit" class="btn btn-primary btn-sm" value="Pilih"> 
                                                <small class="container" style="padding-top:10px;color:#9a9a9a;font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif; font-size:14px;"> {{formatRupiah($kandang->harga)}} / Hari</small>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                  </div>
                                </div> 
                            </form>
                            </div>
                            </div>
                            @endforeach

                        </div>
                    </div>
                </div>
              </div>
            </div>
          </div>
    
        {{--  end Modal  --}}

    <header class="with-background">
        <div class="top-nav container">
            <div class="top-nav-left">
                <div class="logo"><a href="{{route('landingpage')}}">Pasar Hewan</a></div>
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
        <h6> cart / chekckout</h6>
        </div>
    </div>

    <div class="container">
        @if (session()->has('success_message'))
            <div class="spacer"></div>
            <div class="alert alert-success">
                {{ session()->get('success_message') }}
            </div>
        @endif

        @if(count($errors) > 0)
            <div class="spacer"></div>
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{!! $error !!}</li>s
                    @endforeach
                </ul>
            </div>
        @endif
        {{--  <div class="row">  --}}
            <h1 class="checkout-heading stylish-heading mb-1">Checkout</h1>
            <div class="checkout-section">
            <div class="checkout-section-left">
                <div>
                    <form action="{{route('cart.submit')}}" method="POST" id="payment-form">
                        {{ csrf_field() }}
                        <h2 class="mb-1">Detail Penerima</h2>

                        <div class="form-group mb-1">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama') }}" placeholder="Jajang Nur Jaman" required>
                        </div>

                        <div class="half-form">
                            <div class="form-group mb-1">
                                <label for="provinsi">Provinsi</label>
                                <input type="text" class="form-control" id="provinsi" name="provinsi" value="{{ old('provinsi') }}" required placeholder="Jawa Tengah">
                            </div>
                            <div class="form-group mb-1">
                                <label for="kabupaten">Kabupaten</label>
                                <input type="text" class="form-control" id="kabupaten" name="kabupaten" value="{{ old('kabupaten') }}" required placeholder="Banyumas">
                            </div>
                        </div> <!-- end half-form -->

                        <div class="half-form">
                            <div class="form-group mb-1">
                                <label for="kecamatan">Kecamatan</label>
                                <input type="text" class="form-control" id="kecamatan" name="kecamatan" value="{{ old('kecamatan') }}" required placeholder="Karanglewas">
                            </div>
                            <div class="form-group mb-1">
                                <label for="kodepos">Kodepos</label>
                                <input type="text" class="form-control" id="kodepos" name="kodepos" value="{{ old('kodepos') }}" required placeholder="53161">
                            </div>
                        </div> <!-- end half-form -->

                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" class="form-control" id="alamat" name="alamat" value="{{ old('alamat') }}" required placeholder="Alamat Anda">
                        </div>
                    
                            <div class="form-group">
                                <label for="telp">Telp</label>
                                <input type="text" class="form-control" id="telp" name="telp" value="{{ old('telp') }}" required placeholder="085xxxxxxxxx">
                            </div>
                        </div> <!-- end half-form -->

                        <div class="spacer"></div>
                        
                        <div class="cart-totals bg-light">
                            {{--  pilih kirim / nitip  --}}
                            <div class="cart-totals bg-light">
                                
                                <div class="cart-buttons btn-sm mt-3">
                                    <div class="row">

                                        @if(Session::has('id_kandang'))
                                        <div class="col-md-6 text-right">
                                                {{-- untuk perkembangan kedepan bid penitipan --}}
                                                {{-- data-toggle="modal" data-target="#penitipan"  --}}
                                            <a href="#" class="button-primary nitip">Penitipan Hewan</a>
                                        </div>
                                        <div class="col-md-6 text-left">
                                            <a href="#" class=" button langsung">Langsung Kirim</a>
                                        </div>
                                        
                                        @else
                                        <div class="col-md-6 text-right">
                                            {{-- untuk perkembangan --}}
                                                {{-- data-toggle="modal" data-target="#penitipan" --}}
                                                <a href="#"  class="button nitip">Penitipan Hewan</a>
                                        </div>
                                        <div class="col-md-6 text-left">
                                            <a href="#" class=" button button-primary langsung">Langsung Kirim</a>
                                        </div>
                                        @endif
                                        
                                        
                                        {{-- @if(Session::has('id_kandang')) --}}
                                        <div class="col-md-12 mt-5 detail_penitipan" hidden>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    Dari Tanggal :
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="date" name="from" class="form-control from" style="width:100%;" placeholder="1">
                                                    
                                                    {{-- untuk perkembnagan kedepatn --}}
                                                    {{-- <img src="{{asset(Session::get('kandang'))}}" style="height:100px ; width:100px;" alt="" class="btn-md kandang">
                                                    <input type="hidden" name="id_kandang" value="{{Session::get('id_kandang')}}"> --}}
                                                </div>
                                                <div class="col-md-1 text-center">
                                                    <strong> __ </strong>
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="date" name="to" class="form-control to" style="width:100%;" placeholder="1">
                                                </div>
                                            </div>
                                        </div>
                                        {{-- @endif --}}
                                    </div>
                                    @if(Session::has('kandang'))
                                    <input type="hidden" value="y" name="status_penitipan" class="status_penitipan">

                                    @else
                                    <input type="hidden" value="n" name="status_penitipan" class="status_penitipan">
                                    @endif
                                </div>
                    
                            </div>
                            <div class="text-right">
                            <input type="submit" class="btn btn-primary btn-block mt-5" value="Simpan">
                            </div>

                        </div>
                    </form>
                </div>

                <div class="checkout-section-right">
                <div class="checkout-table-container">
                    <h2>Pesanan anda</h2>

                    <div class="checkout-table">
                        @foreach (Cart::instance(Session::get('id_log'))->content() as $item)
                        <div class="checkout-table-row">
                            <div class="checkout-table-row-left">
                                <img src="{{asset('assets/produk/goat.png')}}" alt="item" class="checkout-table-img">
                                <div class="checkout-item-details">
                                    <div class="checkout-table-item">{{$item->name}}</div>
                                    <div class="checkout-table-price">{{formatRupiah($item->price)}}</div>
                                </div>
                            </div> <!-- end checkout-table -->

                            <div class="checkout-table-row-right">
                                <div class="checkout-table-quantity">{{$item->qty}}</div>
                            </div>
                        </div> <!-- end checkout-table-row -->

                        
                        @endforeach

                    </div> <!-- end checkout-table -->

                    <div class="checkout-totals">
                        <div class="checkout-totals-left">
                            Subtotal <br>
                            @if (session()->has('coupon'))
                                Discount ({{ session()->get('coupon')['name'] }}) :
                                <br>
                                <hr>
                                New Subtotal <br>
                            @endif
                            Shipping <br>
                            <span class="checkout-totals-total">Total</span>

                        </div>

                        <div class="checkout-totals-right">
                            
                            {{-- subtotal --}}
                            Rp. {{Cart::instance(Session::get('id_log'))->subtotal()}}
                            {{-- shipping --}}
                            <br>
                            <small style="font-size:15px; color: red;">Menunggu Konfirmasi</small>

                            @if (session()->has('coupon'))
                                <br>
                                <hr>
                                <br>
                            @endif
                            <br>
                            <span class="checkout-totals-total">-</span>

                        </div>
                        <input type="hidden" name="flag" class="status_kirim" value="test">
                        {{-- <input type="submit" value="Bayar" class="btn btn-primary">     --}}

                    </div> <!-- end checkout-totals -->

                </div>
                {{--  </div>  --}}


            </div> <!-- end checkout-section -->
        </div>
    </div>
    @include('partials.footer-shop')

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <script> 

        {{--  ada 2 flag dititip dan langsung  --}}
        $('.nitip').click(function(){
            event.preventDefault();
            $('.detail_penitipan').removeAttr('hidden', '');
            $('.from').attr('required', '');
            $('.to').attr('required', '');
            $('.status_kirim').val('dititip');
            $(this).removeClass("button-primary").addClass("button-primary");
            $('.langsung').removeClass("button-primary").addClass("button");
            $('.status_penitipan').val('y');
        }); 

        $('.langsung').click(function(){
            $('.from').removeAttr('required', '');
            $('.to').removeAttr('required', '');
            $('.nitip').removeClass("button-primary").addClass("button");
            $(this).removeClass("button-primary").addClass("button-primary");
            $('.status_kirim').val('langsung');
            $('.status_penitipan').val('n');
            $('.detail_penitipan').attr('hidden', '');
            event.preventDefault();
        }); ;

    </script>
</body>
</html>