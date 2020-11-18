@extends('template')
@section('breadcrumb')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
   <h1 class="h3 mb-0 text-gray-800">Daftar Pencairan
</div>	
@endsection
@section('konten')

<!-- tambah -->
<div id="tambah" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <form action="{{route('tambah.produk')}}" method="post">
            {{csrf_field()}}
            <div class="modal-header bg-primary text-white">
                <h4 class="modal-title">Tambah Produk</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
              <div class="modal-body">
                <div class="row">
                  <div class="col-lg-6">
                    <input type="hidden" name="id_user" value="3">
                    <label class='mb-1 mt-2'>Kategory Produk</label>
                    <select name="kategory" class="form-control">
                     @foreach($kategory as $kt)
                     <option value="{{$kt->id_kategory}}">{{$kt->nama_kategory}}</option>
                    @endforeach
                    </select>
                   
                    <label class='mb-1 mt-2'>Judul Produk</label>
                    <input type="text" name="nama" class="form-control" placeholder="Nama Produk" required="">
                    <label class='mb-1 mt-2'>Tinggi Produk</label>
                    <input type="number" name="tinggi" class="form-control" placeholder="100" required="">
                    <label class='mb-1 mt-2'>Berat Produk</label>
                    <input type="text" name="berat" class="form-control" placeholder="100 " required="">
                    <label class='mb-1 mt-2'>Lingkar Produk</label>
                    <input type="number" name="lingkar" class="form-control" placeholder="" required=""> 
                  </div>
                  <div class="col-lg-6">
                    <label class='mb-1 mt-2'>Panjang Produk</label>
                    <input type="text" name="panjang" class="form-control" placeholder="" required=""> 
                    <label class='mb-1 mt-2'>Umur Produk</label>
                    <input type="number" name="umur" class="form-control" placeholder="12" required=""> 
                    <label class='mb-1 mt-2'>Deskripsi Produk</label>
                    <input type="text" name="deskripsi" class="form-control" placeholder="" required=""> 
                    <label class='mb-1 mt-2'>Harga Produk</label>
                    <input type="number" name="harga" class="form-control" placeholder="1000000" required=""> 
                    <label class='mb-1 mt-2'>Foto Produk</label>
                    <input type="text" name="foto" class="form-control" value="assets/produk/goat.png" required=""> 
                  </div>
                </div>
              </div>
              <div class="modal-footer">
              <button class="btn btn-primary" type="submit" id="lakukan">Tambah</button>
              <button class="btn btn-danger" type="button" data-dismiss="modal">Tutup</button>
            </div>
          </form>
        </div>
    </div>
</div>

<!-- update -->
<div id="hapus" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <form action="{{route('hapus.pesanan')}}" method="post">
            {{csrf_field()}}
            <div class="modal-header bg-danger text-white">
                <h4 class="modal-title">Batalkan Pesanan</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
              <div class="modal-body">
                <div class="container">
                  <div class="row">
                    <div class="col-lg-6" mb-1>
                      <input type="hidden" name="id_order" class="order">
                      <label>Order Id : <strong class="order"></strong></label><br>
                      <label>Pemesan : <strong class="pemesan"></strong></label><br>
                      </div>
                    <div class="col-lg-6 mb-1">
                      <label>Tempat Tujuan : <strong class="tujuan"></strong></label><br>
                      <label>Telp : <strong class="telp"></strong></label>
                    </div>
                  <table class="table table-consedered" width="100%" cellspacing="0">
                  <thead>
                    <tr class="text-center">
                      <th>No</th>
                      <th>Id Produk</th>
                      <th>Nama Produk</th>
                      <th>Kuantity</th>
                      <!-- untuk admin super -->
                      <th>Harga</th>
                    </tr>
                  </thead>
                  <tbody class="orderProduk">
                    
                  </tbody>
                  <tfoot>
                    <td colspan="4 text-primary"><strong>Total</strong></td>
                    <td class="total">-</td>
                  </tfoot>
                </table>
                <div class="col-lg-12 text-white pb-2" style="background-color: #FF7F7F;">
                  <label>Alasan</label>
                  <textarea name="alasan" class="form-control" placeholder="Alasan..." required=""></textarea>
                </div>
                </div>
                </div>
              </div>
              <div class="modal-footer">
              <button type="submit" class="btn btn-danger"> Batalkan Sekarang! </button>

              <button class="btn btn-primary" type="button" data-dismiss="modal">Tutup</button>
            </div>
          </form>
        </div>
    </div>
</div>


<!-- lihat -->
<div id="lihat" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          @if(!(empty($batal)))
            <div class="modal-header bg-danger text-white">
                <h4 class="modal-title">Detail Pembatalan Pesanan</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
          @else
            <div class="modal-header bg-primary text-white">
                <h4 class="modal-title">Detail Pesanan</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
          @endif
              <div class="modal-body">
                <div class="container">
                  <div class="row">
                    <div class="col-lg-6" mb-1>
                      <label>Order Id : <strong class="order"></strong></label><br>
                      <label>Pemesan : <strong class="pemesan"></strong></label><br>
                      </div>
                    <div class="col-lg-6 mb-1">
                      <label>Tempat Tujuan : <strong class="tujuan"></strong></label><br>
                      <label>Telp : <strong class="telp"></strong></label>
                    </div>
                  <table class="table table-consedered" width="100%" cellspacing="0">
                  <thead>
                    <tr class="text-center">
                      <th>No</th>
                      <th>Id Produk</th>
                      <th>Nama Produk</th>
                      <th>Kuantity</th>
                      <!-- untuk admin super -->
                      <th>Harga</th>
                    </tr>
                  </thead>
                  <tbody class="orderProduk">
                    
                  </tbody>
                  <tfoot>
                    <td colspan="4 text-primary"><strong>Total</strong></td>
                    <td class="total">-</td>
                  </tfoot>
                </table>
                <input type="hidden" name="statusPembatalan">

                  <div class="col-lg-12 text-white pb-2" id="alasan_pembatalan" style="background-color: #FF7F7F;" hidden="">
                    <label>Alasan</label>
                    <textarea name="alasan" class="form-control alasan" placeholder="Alasan..." required="" readonly=""></textarea>
                  </div>
                </div>
                </div>
              </div>
              <div class="modal-footer">
              @if(!(empty($batal)))
              <button class="btn btn-danger" type="button" data-dismiss="modal">Tutup</button>
              @else
              <button class="btn btn-primary" type="button" data-dismiss="modal">Tutup</button>
              @endif
            </div>
            </div>
    </div>
</div>


<div id="status" class="modal fade" role="dialog">
    <div class="modal-dialog modal-xs" role="document">
        <div class="modal-content">
          <form id="aksi" method="post">
            {{csrf_field()}}
            <div class="modal-header bg-danger text-white">
                <h4 class="modal-title"><span class="judulStatus"></span></h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
              <div class="modal-body">
                <div class="container">
                  <div class="row">
                    <div class="col-lg-12">
                      <input type="hidden" name="id_order" class="id_order">
                      <p><span class="isi"></span> <strong class="id_order"></strong> <span class="tambahan"> </span></p>
                    </div>
                </div>
              </div>
            </div>
              <div class="modal-footer">
              <button type="submit" class="btn btn-danger"><span class="button">Sudah dibayar! </span> </button>

              <button class="btn btn-primary" type="button" data-dismiss="modal">Tutup</button>
            </div>
          </form>
        </div>
    </div>
</div>

<!-- Sudah Teraktivasi -->
 <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data Pesanan</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr class="text-center">
                      <th>No</th>
                      <th>Id Order</th>
                      <th>Nama Penjual</th>
                      <th>Kuantitas</th>
                      <th>Uang</th>
                      <th>Status</th>
                     
                      <!-- untuk admin super -->

                      <th>Aksi</th>

                    </tr>
                  </thead>
                  
                  <tbody class="tampil">
                    <?php $i=1; ?>

                    @foreach($order as $ord)
                    <tr class="tr">
                      @php
                      $jumlah = intval($ord->jumlah);
                      $harga = intval($ord->harga_kambing);
                      $total = $jumlah * $harga;
                      @endphp
                    	<td>{{$i++}}</td>
                    	<td>{{$ord->id_order}}</td>
                      <td>{{$ord->nama_user}}</td>
                      <td>{{$ord->jumlah}} Ekor</td>
                      <td>{{$total}}</td>
                      <td class="text-center"><span class="@if($ord->cair == 'belum')btn btn-warning @else btn btn-success @endif">
                      {{$ord->cair}}

                      </span></td>
                     
                      <!-- untuk admin super -->
                      <td class="branch">
                      <div class="row">
                    <div class="col-lg-6 col-md-12 col-xs-12">
                        <a href="#"  class="btn btn-primary btn-circle btn-sm view" data-id="{{$ord->id_order}}" data-target="#lihat" data-toggle="modal">
                        <i class="fas fa-eye"></i>
                    </a>
                  </div>
                   <div class="col-lg-6 col-md-12 col-xs-12">
                     @if(Session::get('status') == 'super')
                      <a href="#" class="btn btn-danger btn-sm btn-circle status" data-target="#status" data-toggle="modal" data-judul="Cairkan Sekarang" data-isi="Cairkan orderan" data-tambahan="sekarang!" data-btn="Cairkan" data-penjual="{{$ord->nama_user}}" data-id="{{$ord->id_order}}" data-action="{{route('pencairan.pesanan.penjual', ['id_order'=>$ord->id_order, 'id_list_order'=>$ord->no])}}">
                        <i class="fa fa-hand-holding-usd"></i>
                    </a>
                    @endif
                  </div>
                                   
                </div>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>

            </table>
          <div class="container">
                
          </div>
        </div>
    </div>
  </div>


@endsection

@section('js')
<script>
  var url='{{route('ajax.data.pesanan')}}';

   $('.view').click(function(){
      const id = $(this).data('id');
      $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
      }
    });
    $.ajax({
      url: url,
      data: {id_order : id},
      type: 'post',
      success: function(data){
        console.log(data);
        if(data[0][0].status == 2){
          $('#alasan_pembatalan').removeAttr('hidden');
        }
        $('.sub').remove();
        $('.telp').html(data[0][0].telp);
        $('.tujuan').html(data[0][0].alamat);
        $('.pemesan').html(data[0][0].nama_user);
        $('.order').val(data[0][0].id_order);
        $('.order').html(data[0][0].id_order);
        $('.orderProduk').append(data[2]);
        $('.total').html(data[1]);
        $('.alasan').val(data[0][0].alasan);

      }
    });

    });

   $('.status').click(function(){
    // get
    var action = $(this).data('action');
    const id = $(this).data('id');
    const penjual = $(this).data('penjual');
    const judul = $(this).data('judul');
    var btn = $(this).data('btn');
    var isi = $(this).data('isi');
    var tambahan = $(this).data('tambahan');
    // control
    $('#aksi').removeAttr('action');
    $('#aksi').attr('action', action);
    $('.id_order').html(penjual);
    $('.id_order').val(id);
    $('.judulStatus').html(judul);
    $('.isi').html(isi);
    $('.tambahan').html(tambahan);
    $('.button').html(btn);
   });

</script>
@endsection
