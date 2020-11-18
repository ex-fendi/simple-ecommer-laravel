@extends('template')
@section('breadcrumb')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
   <h1 class="h3 mb-0 text-gray-800">Data Kandang
</div>
@if(Session::get('status') == 'admin')	
<a href="#" id="tambahPenjual" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#tambah"><i class="fas fa-users fa-sm text-white-50"></i> Tambah Kandang</a>
@endif
@endsection
@section('konten')

<!-- tambah -->
<div id="tambah" class="modal fade" role="dialog">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
          <form action="{{route('kandang.add.submit')}}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="modal-header bg-primary text-white">
                <h4 class="modal-title">Tambah Kandang</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
              <div class="modal-body">
                <div class="row">
                  <div class="col-lg-12">
                    <label class='mb-1 mt-2'>Luas Kandang</label>
                    <input type="text" name="luas" class="form-control" placeholder="12x5m" required=""> 
                    <label class='mb-1 mt-2'>Maksimal</label>
                    <input type="number" name="maksimal" class="form-control" placeholder="12" required=""> 
                    <label class='mb-1 mt-2'>Lokasi Kandang</label>
                    <input type="text" name="lokasi" class="form-control" placeholder="Lokasi Kandang Anda" required=""> 
                    <label class='mb-1 mt-2'>Fasilitas</label>
                    <input type="text" name="fasilitas" class="form-control" placeholder="Fasilitas" required=""> 
                    <label class='mb-1 mt-2'>Harga /hari</label>
                    <input type="number" name="harga" class="form-control" placeholder="1000000" required=""> 
                    <label class='mb-1 mt-2'>Foto Kandang</label>
                    <input type="file" name="foto" class="form-control" required=""> 
                    <p style="font-size: 12px" class="text-primary mt-1">  *Maksimal 1.5 Mb </p>
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
          <form action="{{route('kandang.delete.submit')}}" method="post">
            {{csrf_field()}}
            <div class="modal-header bg-danger text-white">
                <h4 class="modal-title">Hapus Data Penjual</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
              <div class="modal-body">
                <div class="text-center">
                    <img class="kandang" style="height:30%; width:80%;" >
                </div>
                <div class="text-center mt-4">
                    <input type="hidden" class="id_kandang" name="id" value="">
                    <p>Apakah Anda yakin Akan Menghapus Kandang ini ?</p>	
                </div>
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
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
          <form action="{{route('kandang.update.submit')}}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="modal-header bg-warning text-white">
                <h4 class="modal-title">Update Produk</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
              <div class="modal-body">
                <div class="row">
                        <div class="col-lg-12">
                            <input type="hidden" class="id_kandang" name="id">
                                <div class="text-center">
                                    <img class="kandang" style="height:30%; width:80%;" >
                                </div>
                                <label class='mb-1 mt-2'>Luas Kandang</label>
                                <input type="text" name="luas" class="form-control luas" placeholder="" required=""> 
                                <label class='mb-1 mt-2'>Maksimal</label> 
                                <input type="number" name="maksimal" class="form-control maksimal" placeholder="12" required=""> 
                                <label class='mb-1 mt-2'>Lokasi Kandang</label>
                                <input type="text" name="lokasi" class="form-control lokasi" placeholder="Lokasi Kandang Anda" required="">
                                <label class='mb-1 mt-2'>Fasilitas</label>
                                <input type="text" name="fasilitas" class="form-control fasilitas" placeholder="" required=""> 
                                <label class='mb-1 mt-2'>Harga /hari</label>
                                <input type="number" name="harga" class="form-control harga" placeholder="1000000" required=""> 
                                {{--  ketika update  --}}
                                {{--  <label class='mb-1 mt-2'>Foto Kandang</label>
                                <input type="file" name="foto" class="form-control kandang" required="">   --}}
                                {{--  end  --}}
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
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h4 class="modal-title">Lihat Produk</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
              <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center">
                            <img class="kandang" style="height:30%; width:80%;" >
                        </div>
                        <label class='mb-1 mt-2'>Luas Kandang</label>
                        <input type="text" name="panjang" class="form-control luas" placeholder="" required=""> 
                        <label class='mb-1 mt-2'>Maksimal</label>
                        <input type="number" name="maksimal" class="form-control maksimal" placeholder="12" required=""> 
                        <label class='mb-1 mt-2'>Lokasi Kandang</label>
                        <input type="text" name="lokasi" class="form-control lokasi" placeholder="Lokasi Kandang Anda" required="">
                        <label class='mb-1 mt-2'>Fasilitas</label>
                        <input type="text" name="fasilitas" class="form-control fasilitas" placeholder="" required=""> 
                        <label class='mb-1 mt-2'>Harga /hari</label>
                        <input type="number" name="harga" class="form-control harga" placeholder="1000000" required=""> 
                        {{--  ketika update  --}}
                        {{--  <label class='mb-1 mt-2'>Foto Kandang</label>
                        <input type="file" name="foto" class="form-control kandang" required="">   --}}
                        {{--  end  --}}
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
<div class="row">
 <div class="col-md-8 offset-2">
    <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data Kandang</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr class="text-center">
                      <th>No</th>
                      @if(Session::get('status')=='super')
                        <th> User </th>
                      @endif
                      <th>Foto</th>
                      <th>Max</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  
                  <tbody class="tampil">
                    <?php $i=1; ?>
                    @foreach($kandang as $kd)
                    <tr class="tr">
                    	<td class="text-center">{{$i++}}</td>
                        @if(Session::get('status')=='super')
                            <th> {{$kd->nama_user}} </th>
                        @endif
                        <td class="text-center"><img width="60px" height="50px" src="{{asset($kd->foto)}}"></td>
                    	<td class="text-center">{{$kd->max}}</td>
                        <td class="branch">
                        <div class="row">
                        <div class="col-lg-4 col-md-12 col-xs-12">
                        <a href="#"  class="btn btn-primary btn-circle btn-sm view" data-id="{{$kd->id}}" data-luas="{{$kd->luas}}" data-foto="{{asset($kd->foto)}}" data-maksimal="{{$kd->max}}" data-fasilitas="{{$kd->fasilitas}}" data-harga="{{$kd->harga}}" data-lks="{{$kd->lokasi}}" data-target="#lihat" data-toggle="modal">
                        <i class="fas fa-eye"></i>
                        </a>
                  </div>
                        <div class="col-lg-4 col-md-12 col-xs-12">
                        <a href="#" id="update" class="btn btn-warning btn-circle btn-sm view" alt="Perbarui" data-id="{{$kd->id}}" data-luas="{{$kd->luas}}" data-foto="{{asset($kd->foto)}}" data-maksimal="{{$kd->max}}" data-fasilitas="{{$kd->fasilitas}}" data-harga="{{$kd->harga}}" data-lks="{{$kd->lokasi}}" data-target="#perbarui" data-id="{{$kd->id}}" data-toggle="modal">
                        <i class="fas fa-clipboard-list"></i>
                    </a>
                  </div>
                  <div class="col-lg-4 col-md-12 col-xs-12">
                        <a href="#" id="delete" class="btn btn-danger btn-circle btn-sm view" data-foto="{{asset($kd->foto)}}" data-id="{{$kd->id}}" alt="Hapus" data-toggle="modal" data-target="#hapus">
                        <i class="fas fa-trash"></i>
                    </a>
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
        $('.kandang').removeAttr('src');
        $('.id_kandang').val($(this).data('id'));
        $('.luas').val($(this).data('luas'));
        $('.maksimal').val($(this).data('maksimal'));
        $('.fasilitas').val($(this).data('fasilitas'));
        $('.harga').val($(this).data('harga'));
        $('.kandang').attr('src', $(this).data('foto'));
        $('.lokasi').val($(this).data('lks'));
    });

</script>
@endsection
