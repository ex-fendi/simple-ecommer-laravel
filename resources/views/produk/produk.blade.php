@extends('template')
@section('breadcrumb')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
   <h1 class="h3 mb-0 text-gray-800">Data Produk
</div>	
@if(Session::get('status') == 'admin')
<a href="#" id="tambahPenjual" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#tambah"><i class="fas fa-users fa-sm text-white-50"></i> Tambah Poduk</a>
@endif
@endsection
@section('konten')

<!-- tambah -->
<div id="tambah" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <form action="{{route('tambah.produk')}}" method="post" enctype="multipart/form-data">
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

                    <label class="mt-2"> Kandang </label>
                    <select name="kandang" class="form-control mb-2">
                      @foreach($kandang as $item)
                      <option value="{{$item->id}}">{{$item->lokasi}}</option>
                     @endforeach
                     </select>
                     <hr>
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
                    <input type="file" name="foto" class="form-control" required=""> 
                    <label class='mb-1 mt-2'>Stok</label>
                    <input type="number" name="stok" class="form-control" value="0" max="999" min="1" required=""> 
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

<!-- delete -->
<div id="hapus" class="modal fade" role="dialog">
    <div class="modal-dialog modal-xs" role="document">
        <div class="modal-content">
          <form action="{{route('hapus.produk')}}" method="post">
            {{csrf_field()}}
            <div class="modal-header bg-danger text-white">
                <h4 class="modal-title">Hapus Data Penjual</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
              <div class="modal-body">

                <input type="hidden" class="id" name="id" value="">
                  <p>Apakah Anda yakin Akan Menghapus Produk <strong class="judul"></strong> !</p>	
              </div>
              <div class="modal-footer">
              <button class="btn btn btn-danger" type="submit"> Hapus! </button>
              <button class="btn btn-primary" type="button" data-dismiss="modal">Tutup</button>
            </div>
          </form>
        </div>
    </div>
</div>

<!-- update -->
<div id="perbarui" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <form action="{{route('perbarui.produk')}}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="modal-header bg-warning text-white">
                <h4 class="modal-title">Update Prpduk</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
              <div class="modal-body">
                <div class="row">
                  <div class="col-lg-6">
                    <input type="hidden" name="id_user" class="id_user">
                    <input type="hidden" name="id" class="id">
                    <label class='mb-1 mt-2'>Kategory Produk</label>

                    <select name="kategory" class="form-control update_kategory">
                        
                    </select>

                    <label class='mb-1 mt-2'>Judul Produk</label>
                    <input type="text" name="nama" class="form-control judul" placeholder="Nama Penjual" required="">
                    <label class='mb-1 mt-2'>Tinggi Produk</label>
                    <input type="number" name="tinggi" class="form-control tinggi" placeholder="100" required="">
                    <label class='mb-1 mt-2'>Berat Produk</label>
                    <input type="text" name="berat" class="form-control berat" placeholder="085xxxxxxxxx" required="">
                    <label class='mb-1 mt-2'>Lingkar Produk</label>
                    <input type="number" name="lingkar" class="form-control lingkar" placeholder="" required=""> 
                  </div>
                  <div class="col-lg-6">
                    <label class='mb-1 mt-2'>Panjang Produk</label>
                    <input type="text" name="panjang" class="form-control panjang" placeholder="" required=""> 
                    <label class='mb-1 mt-2'>Umur Produk</label>
                    <input type="number" name="umur" class="form-control umur" placeholder="12" required=""> 
                    <label class='mb-1 mt-2'>Deskripsi Produk</label>
                    <input type="text" name="deskripsi" class="form-control deskripsi" placeholder="" required=""> 
                    <label class='mb-1 mt-2'>Harga Produk</label>
                    <input type="number" name="harga" class="form-control harga" placeholder="1000000" required=""> 
                    <label class='mb-1 mt-2'>Foto Produk</label>
                    <input type="file" name="foto" class="form-control" required=""> 
                    <label class='mb-1 mt-2'>Stok</label>
                    <input type="number" name="stok" class="form-control stoks" max="999" min="0" required=""> 
                    
                  </div>
                </div>
              </div>
              <div class="modal-footer">
              <button type="submit" class="btn btn-warning"> Update! </button>

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
            <div class="modal-header bg-primary text-white">
                <h4 class="modal-title">Lihat Produk</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
              <div class="modal-body">
                <div class="row">
                  <div class="col-lg-6">
                    <input type="hidden" name="id_user" value="3">
                    <label class='mb-1 mt-2'>Kategory Produk</label>
                    <input type="text" name="kategory" class="form-control kategory" value="" readonly="">
                    <label class='mb-1 mt-2'>Kandang</label>
                    <input type="text" name="kandang" class="form-control kategory" value="" readonly="">
                    <label class='mb-1 mt-2'>Judul Produk</label>
                    <input type="text" name="nama" class="form-control judul" placeholder="Nama Penjual" readonly="" required="">
                    <label class='mb-1 mt-2'>Tinggi Produk</label>
                    <input type="number" name="tinggi" class="form-control tinggi" placeholder="100" readonly="" required="">
                    <label class='mb-1 mt-2'>Berat Produk</label>
                    <input type="text" name="berat" class="form-control berat" placeholder="085xxxxxxxxx" readonly="" required="">
                    <label class='mb-1 mt-2'>Lingkar Produk</label>
                    <input type="email" name="lingkar" class="form-control lingkar" placeholder="" readonly="" required=""> 
                  </div>
                  <div class="col-lg-6">
                    <label class='mb-1 mt-2'>Panjang Produk</label>
                    <input type="text" name="panjang" class="form-control panjang" placeholder="" readonly="" required=""> 
                    <label class='mb-1 mt-2'>Umur Produk</label>
                    <input type="number" name="umur" class="form-control umur" placeholder="12" readonly="" required=""> 
                    <label class='mb-1 mt-2'>Deskripsi Produk</label>
                    <input type="text" name="deskripsi" class="form-control deskripsi" readonly="" placeholder="" required=""> 
                    <label class='mb-1 mt-2'>Harga Produk</label>
                    <input type="number" name="email" class="form-control harga" placeholder="1000000" readonly="" required=""> 
                    
                  </div>
                </div>
              </div>
              <div class="modal-footer">
              <button class="btn btn-primary" type="button" data-dismiss="modal">Tutup</button>
            </div>
            </div>
    </div>
</div>

<!-- Sudah Teraktivasi -->
 <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data Produk</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr class="text-center">
                      <th>No</th>
                      <th>User</th>
                      <th>Poduk</th>
                      <th>Foto</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  
                  <tbody class="tampil">
                    <?php $i=1; ?>
                    @foreach($produk as $pj)
                    <tr class="tr">
                    	<td>{{$i++}}</td>
                    	<td>
                          @if(empty($pj->detailuser->nama_user))
                          @else
                          {{$pj->detailuser->nama_user}}
                          @endif
                      </td>
                    	<td>
                        @if(empty($pj->kandang->lokasi))
                        -
                        @else
                        {{$pj->kandang->lokasi}}
                        @endif
                      </td>
                    	<td class="text-center"><img width="60px" height="50px" src="{{asset($pj->foto)}}"></td>
                      <td class="branch">
                      <div class="row">
                        <div class="col-lg-4 col-md-12 col-xs-12">
                        <a href="#"  class="btn btn-primary btn-circle btn-sm view" data-id="{{$pj->id_produk}}"  data-target="#lihat" data-toggle="modal">
                        <i class="fas fa-eye"></i>
                    </a>
                  </div>
                  @if(Session::get('status') == 'admin')
                        <div class="col-lg-4 col-md-12 col-xs-12">
                        <a href="#" id="update" class="btn btn-warning btn-circle btn-sm view" alt="Perbarui" data-target="#perbarui" data-id="{{$pj->id_produk}}" data-toggle="modal">
                        <i class="fas fa-clipboard-list"></i>
                    </a>
                  </div>
                  <div class="col-lg-4 col-md-12 col-xs-12">
                        <a href="#" id="delete" class="btn btn-danger btn-circle btn-sm view" data-id="{{$pj->id_produk}}" alt="Hapus" data-toggle="modal" data-target="#hapus">
                        <i class="fas fa-trash"></i>
                    </a>
                  </div>
                  @endif
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

@section('css')
  <style type="text/css">
  
  </style>

@section('js')
@if(Session::has('flash'))
  <script>
      $.notify("{{Session::get('flash')}}","success"
     
      );
  </script>
  @php
  Session::forget('flash');
  @endphp
@endif

<script>

  var url='{{route('ajax.data.produk')}}';

   $('.view').click(function(){
      const id = $(this).data('id');
      $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
      }
    });
    $.ajax({
      url: url,
      data: {id : id},
      type: 'post',
      success: function(data){
        console.log(data);
        $('.id').val(data[0][0].id_produk);
        $('.id_user').val(data[0][0].id_user);
        $('.judul').val(data[0][0].judul_produk);
        $('.judul').html(data[0][0].judul_produk);
        $('.berat').val(data[0][0].berat_kambing);
        $('.tinggi').val(data[0][0].tinggi_kambing);
        $('.lingkar').val(data[0][0].lingkar_kambing);
        $('.panjang').val(data[0][0].panjang_kambing);
        $('.umur').val(data[0][0].umur_kambing);
        $('.deskripsi').val(data[0][0].deskripsi_kambing);
        $('.harga').val(data[0][0].harga_kambing);
        $('.kategory').val(data[0][0].id_kategory);
        $('.stoks').val(data[0][0].stok);
        $('.update_kategory').append(data[1]);
      }
    });

    });

</script>
@endsection
