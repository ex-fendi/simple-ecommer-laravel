
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
    <link href="{{asset('assets/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
  
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
    <link href="{{asset('css/hover-min.css')}}" rel="stylesheet">
</head>
<body>
     {{--  Modal  --}}
        {{--  end Modal  --}}
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
            <h1 class="checkout-heading stylish-heading mb-1">Detail Pesanan</h1>
            <div class="checkout-section">
            <div class="checkout-section-left">
                <div>
                        <h2 class="mb-1">Pengiriman</h2>

                        <div class="form-group mb-1">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" value="{{$order->nama_pembeli}}" placeholder="Belum Mencantumkan" readonly>
                        </div>

                        <div class="half-form">
                            <div class="form-group mb-1">
                                <label for="provinsi">Provinsi</label>
                                <input type="text" class="form-control" id="provinsi" name="provinsi" value="{{$order->provinsi}}" required placeholder="Belum Mencantumkanh" readonly>
                            </div>
                            <div class="form-group mb-1">
                                <label for="kabupaten">Kabupaten</label>
                                <input type="text" class="form-control" id="kabupaten" name="kabupaten" value="{{$order->kabupaten}}" required placeholder="Belum Mencantumkan" readonly>
                            </div>
                        </div> <!-- end half-form -->

                        <div class="half-form">
                            <div class="form-group mb-1">
                                <label for="kecamatan">Kecamatan</label>
                                <input type="text" class="form-control" id="kecamatan" name="kecamatan" value="{{$order->kecamatan}}" required placeholder="Belum Mencantumkan" readonly>
                            </div>
                            <div class="form-group mb-1">
                                <label for="kodepos">Kodepos</label>
                                <input type="text" class="form-control" id="kodepos" name="kodepos" value="{{$order->kode_pos}}" required placeholder="Belum Mencantumkan" readonly>
                            </div>
                        </div> <!-- end half-form -->

                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" class="form-control" id="alamat" name="alamat" value="{{$order->alamat_pembeli}}" required placeholder="Belum Mencantumkan" readonly>
                        </div>
                    
                            <div class="form-group">
                                <label for="telp">Telp</label>
                                <input type="text" class="form-control" id="telp" name="telp" value="{{$order->telp}}" required placeholder="Belum Mencantumkan" readonly>
                            </div>
                        </div> <!-- end half-form -->

                        <div class="spacer"></div>
                        
                </div>
                <div class="checkout-section-right">
                <div class="checkout-table-container">
                    <h2>Pesanan</h2>

                    <div class="checkout-table">
                        @foreach ($list as $item)
                        <div class="checkout-table-row">
                            <div class="checkout-table-row-left">
                                <img src="{{asset($item->foto)}}" alt="item" class="checkout-table-img">
                                <div class="checkout-item-details">
                                    <div class="checkout-table-item">{{$item->judul_produk}}</div>
                                    <div class="checkout-table-price">{{formatRupiah($item->harga_kambing)}}</div>
                                </div>
                            </div> <!-- end checkout-table -->

                            <div class="checkout-table-row-right">
                                <div class="checkout-table-quantity">{{$item->jumlah}}</div>
                            </div>
                        </div> <!-- end checkout-table-row -->
                        @endforeach
                        
                        <div class="text-right">
                            @if($list[0]->status == 1)
                                <span class="button-primary btn-sm button-active" style="padding:10px; background-color:lightseagreen;">  Menunggu Pembayaran </span>
                            @elseif($list[0]->status == 2)
                                <span class="btn btn-danger btn-sm"> Dibatalkan </span>
                            @elseif($list[0]->status == 3)
                            <span class="btn btn-primary btn-sm"> Sudah Dibayar </span>
                            @elseif($list[0]->status == 4)
                                <span class="btn btn-primary btn-sm"> Persiapan Pengiriman </span>
                            @elseif($list[0]->status == 5)
                            <span class="btn btn-primary btn-sm"> Pengiriman </span>
                            @elseif($list[0]->status == 7)
                                <span class="btn btn-success btn-sm"> Diterima </span>
                            @elseif($list[0]->status == 8)
                            <span class="btn btn-primary btn-sm"> Dititipkan </span>
                            
                            @endif
                        </div>
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
                            Penitipan <br>
                            <span class="checkout-totals-total">Total</span>

                        </div>

                        <div class="checkout-totals-right">
                            
                            {{-- subtotal --}}
                            {{formatRupiah($subtotal)}}
                            {{-- shipping --}}
                            <br>
                            @if(!(empty($list[0]->shiping)))
                                {{formatRupiah($list[0]->shiping)}}
                            @elseif($list[0]->status == 2)
                                -
                            @else
                                <span style="color:red; font-size: 14px;"> Belum dikonfirmasi  </span>
                                
                            @endif
                            <br>
                            <small> @if(!(empty($list[0]->total_biaya)))
                                {{formatRupiah($list[0]->total_biaya)}}
                                @else
                                -
                                @endif
                            </small>

                            @if (session()->has('coupon'))
                                <br>
                                <hr>
                                <br>
                            @endif
                            <br>
                            <span class="checkout-totals-total">
                                @if(!(empty($list[0]->shiping)))
                                    {{formatRupiah($total)}}
                                @else
                                    -
                                @endif
                            </span>
                            <br>
                            <span class="checkout-totals-total">
                                    @if(!(empty($list[0]->shiping)) && $list[0]->bukti_pembayaran == '-')
                                      <a href="#" data-toggle="modal" data-target="#tambah" class="btn btn-primary btn-sm"> Bayar</a>
                                    @elseif($list[0]->bukti_pembayaran != '-' )
                                        <a href="#" class="btn btn-success btn-sm active"><i class="fa fa-check"> </i> </a>
                                    @else
                                        <a href="#" class="btn btn-primary btn-sm disabled"> Bayar </a>
                                    <br>
                                    @endif
                                </span>

                        </div>
                        <input type="hidden" name="flag" class="status_kirim" value="test">
                        {{-- <input type="submit" value="Bayar" class="btn btn-primary">     --}}
                    </div> <!-- end checkout-totals -->
                </div>
                {{--  </div>  --}}
            </div> <!-- end checkout-section -->
        </div>

        {{--  tracking  --}}

        <div class="row mb-5 table-responsive" style="margin-top:-30px;" hidden>

            <div class="col-md-12">
                <strong style="font-size: 16px;">Track Order</strong>
                <table class="table table-bordered table-striped" style="font-size: 16px;">
                    <thead>
                        <tr>
                            <th> No.</th>
                            <th> Pesanan</th>
                            <th> Quantitas</th>
                            <th> Tracking</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;   
                        @endphp
                        @foreach ($track as $item)
                        <tr>
                            <td> {{$i++}} </td>
                            <td> {{$item->produk->judul_produk}} </td>
                            <td> {{$item->jumlah}}</td>
                            <td>
                                @foreach ($item->tracking as $item)
                                   - {{$item->tracking}}
                                    <br>
                                @endforeach 
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        {{--  end tracking  --}}
    </div>
    @include('partials.footer-shop')

<!-- tambah -->
<div id="tambah" class="modal fade" role="dialog">
    <div class="modal-dialog modal-xs" role="document">
        <div class="modal-content">
          <form action="{{route('pesanan.bayar.submit')}}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            <input type="hidden" name="id" value="{{$list[0]->id_order}}">
            <div class="modal-header">
                <h4 class="modal-title">Konfirmasi Pembayaran</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
              <div class="modal-body">
                <div class="row">
                    <div class="col-md-10 offset-1">
                        <strong style="font-size: 14px;">Bukti Pembayaran</strong>
                        <input type="file" name="pembayaran" class="form-control" required>
                    </div>
                </div>
              </div>
              <div class="modal-footer">
              <button class="btn btn-primary btn-sm" style="padding:10px;font-size: 14px;" type="submit" id="lakukan">Kirim</button>
              <button class="btn btn-danger btn-sm" style="padding:10px;font-size: 14px;" type="button" data-dismiss="modal">Tutup</button>
            </div>
          </form>
        </div>
    </div>
</div>


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <script> 

        

    </script>
</body>
</html>