@extends('template')
@section('breadcrumb')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
   <h1 class="h3 mb-0 text-gray-800">Detail Order
</div>	
@endsection
@section('konten')

<div class="row">
    <div class="col-md-12">
        <div class="card card-body">
            @if($order->status == 1)
                <h4 class="small font-weight-bold">History Tracking <span class="float-right">0%</span></h4>
                <div class="progress mb-4">
                  <div class="progress-bar bg-warning" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            @elseif($order->status == 3)
                <h4 class="small font-weight-bold">History Tracking <span class="float-right">25%</span></h4>
                <div class="progress mb-4">
                  <div class="progress-bar bg-warning" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            @elseif($order->status == 8)
                <h4 class="small font-weight-bold">History Tracking <span class="float-right">35%</span></h4>
                <div class="progress mb-4">
                  <div class="progress-bar bg-warning" role="progressbar" style="width: 35%" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            @elseif($order->status == 4)
                <h4 class="small font-weight-bold">History Tracking <span class="float-right">50%</span></h4>
                <div class="progress mb-4">
                  <div class="progress-bar bg-warning" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            @elseif($order->status == 5)
                <h4 class="small font-weight-bold">History Tracking <span class="float-right">75%</span></h4>
                <div class="progress mb-4">
                  <div class="progress-bar bg-warning" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            @elseif($order->status > 5 && $order->status != 8)
                <h4 class="small font-weight-bold">History Tracking <span class="float-right">100%</span></h4>
                <div class="progress mb-4">
                  <div class="progress-bar bg-warning" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            @endif
            <div class="text-center">
            <span style="font-size: 14px;">
                @php

                if($order->status_penitipan = 'y')
                    $perkembangan = ['Menunggu Pembayaran', 'Sudah Dibayar', 'Dititipkan' , 'Persiapan Pengiriman', 'Pengiriman', 'Pencairan', 'Selesai'];   
                else
                    $perkembangan = ['Menunggu Pembayaran', 'Sudah Dibayar', 'Persiapan Pengiriman', 'Pengiriman', 'Pencairan', 'Selesai'];   

                $i =1;
                @endphp
                @if($order->status != 8)
                @foreach ($perkembangan as $item)
                    @if($i <= $order->status && $order->status != 8)
                    <i class="fa fa-circle fa-1x text-warning"> </i>{{$item}}
                    @else
                    <i class="fa fa-circle fa-1x"> </i>{{$item}} 
                    @endif
                    @php
                    $i++;
                    @endphp
                @endforeach 
                @else
                @foreach ($perkembangan as $item)
                    @if($i <= 3)
                    <i class="fa fa-circle fa-1x text-warning"> </i>{{$item}} 
                    @else
                    <i class="fa fa-circle fa-1x"> </i>{{$item}} 
                    @endif
                    @php
                    $i++;
                    @endphp
                @endforeach 
                @endif
            </span>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12 mt-3">
        <div class="card mb-5">
            <div class="card-header"> Detail Order </div>
            <div class="card-body row">
                <div class="col-md-6">
                    <h2 class="mb-1">Pengiriman <i class="fa fa-truck"> </i></h2>
                    <div class="form-group mb-1 mt-4">
                        <label for="nama">Penerima</label>
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
                    <div class="spacer"></div>
                </div>
                <div class="col-md-5 offset-1">
                    <h2 class="mb-1">Keranjang</h2>
                    <div class="text-right">
                        <table class="table table-striped text-left">
                                @foreach ($list as $item)
                                <tr class="">
                                    <td style="width:20%;">
                                        <img src="{{asset($item->foto)}}" width="100%">
                                    </td> <!-- end checkout-table -->
                                    <td class="text-center">
                                        <div >{{$item->judul_produk}}</div>
                                        <div >{{formatRupiah($item->harga_kambing)}}</div>
                                    </td>
                                    <td class="">
                                        <span style="border:1px solid white" class="p-2 bg-primary text-white">{{$item->jumlah}}</span>
                                    </td>
                                </tr>
                                @endforeach
                        </table>
                        <div class="table table-responsive">
                        <table id="dataTable" class="table table-bordered">
                            <thead class="text-center">
                                <tr>
                                    <td> Subtotal </td>
                                    <td> Shiping </td>
                                    <td> Penitipan </td>
                                    <td> Total </td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td> {{formatRupiah($subtotal)}} </td>
                                    <td> 
                                        @if(!(empty($list[0]->shiping)))
                                        {{formatRupiah($list[0]->shiping)}}
                                        @elseif($list[0]->status == 2)
                                            -
                                        @else
                                            <a href="#"  class="btn btn-primary btn-sm bill" data-toggle="modal" data-target="#bill" data-id="{{$order->id_order}}" data-url="{{route('pesanan.biaya.pengiriman', ['id_order'=>$order->id_order])}}" >
                                                Masukan Biaya
                                            </a>
                                        @endif
                                    </td>
                                    <td> 
                                        @if(!(empty($list[0]->total_biaya)))
                                        {{formatRupiah($list[0]->total_biaya)}}
                                        @else
                                        -
                                        @endif
                                    </td>
                                    <td> 
                                        @if(!(empty($list[0]->shiping)))
                                        {{formatRupiah($total)}}
                                        @else
                                            -
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        </div>
                    </div>
                    @if($order->status == 8)
                    <div class="row">
                        <div class="col-md-12">
                            <div class="breadcrumb bg-info text-white" >
                               <i class="fa fa-info"> Penitipan </i>
                                <br>
                                Dimulai : 10 Desember 2019 
                                <br>
                                Berakhir : 12 Desember 2019  
                            </div>
                        </div>
                        <div class="col-md-12">
                            <a href="#" data-id="{{$order->id_order}}" data-target="#persiapan_pengiriman" data-toggle="modal" class="btn btn-primary btn-sm btn-block persiapan_pengiriman"> <i class="fa fa-truck">  Persiapan Pengiriman  </i></a>
                        </div>
                    </div>
                @endif

                @if($order->status == 5)
                <div class="row mt-3">
                    <div class="col-md-12">
                        <form action="{{route('order.tracking')}}" method="post">
                            @csrf
                        <input name="id" type="hidden" value="{{$order->id_order}}"> 
                        <div class="breadcrumb bg-warning text-white" >
                           <i class="fa fa-info"> Sudah sampai mana anda hari ini ? </i>
                        </div>  
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <textarea name="wilayah" class="form-control" placeholder="Sampai Mana ?" required></textarea>
                            </div>
                            <div class="col-md-12 mt-2">
                                <button type="submit" class="btn btn-primary btn-sm btn-block"> Simpan Progres Pengiriman </button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
                </div>
            @endif
            </div>
        </div>
    </div>
</div>


<div id="bill" class="modal fade" role="dialog">
    <div class="modal-dialog modal-xs" role="document">
        <div class="modal-content">
          <form id="rute" method="post">
            @csrf
            <div class="modal-header bg-primary text-white">
                <h4 class="modal-title">Biaya Pengiriman <i class="fa fa-shipping-fast"></i></h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
              <div class="modal-body">
                <div class="container">
                  <div class="row">
                    <div class="col-lg-12">
                     <div class="form-group"> 
                        <label style="margin-left: 0;">Biaya Pengiriman</label>
                        <input type="text" class="form-control pengiriman" name="shipping" placeholder="Masukan Biaya Pengiriman" style="margin-left: 0;">
                      </div>
                      <input type="hidden" name="id_order" class="id_order_hewan" value="s">
                      <p class="breadcrumb mt-3" style="background-color:transparent; color:red; border:1px solid red;"> <strong class="id_order"></strong> Hanya bisa diisi 1x !</p>
                    </div>
                </div>
              </div>
            </div>
              <div class="modal-footer">
              <button type="submit" class="btn btn-success pengiriman"><span class="button">Simpan </span> </button>

              <button class="btn btn-primary" type="button" data-dismiss="modal">Tutup</button>
            </div>
          </form>
        </div>
    </div>
</div>

<div id="persiapan_pengiriman" class="modal fade" role="dialog">
  <form action="{{route('perbarui.pesanan', ['status'=>3])}}" method="post">
    @csrf
    <div class="modal-dialog modal-xs" role="document">
        <div class="modal-content text-center mt-5" style="border:0px;">
            <h1 class="mt-5"> <i class="fa fa-dolly text-success"> </i></h1>
            <h3>   Persiapan Pengiriman </h3>
            <input type="hidden" name="id_order" id="id_order">
            <div class="modal-footer">
              <button class="btn btn-primary" type="submit" id="lakukan">Perbarui</button>
              <button class="btn btn-danger" type="button" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
  </form>
</div>

@endsection

@section('js')
<script>
$('#dataTable tbody').on('click', '.bill', function(){
    var routee = $(this).data('url');
    $('.id_order_hewan').val($(this).data('id'));
    $('#rute').removeAttr('action', '');
    $('#rute').attr('action', routee);
});

$('.persiapan_pengiriman').click(function(){
    $('#id_order').val($(this).data('id'));
});
</script>
@endsection
