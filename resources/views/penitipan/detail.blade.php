@extends('template')
@section('breadcrumb')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
   <h1 class="h3 mb-0 text-gray-800">Detail Penitipan
</div>	
@endsection
@section('konten')
@if(count($penitipan) > 0)

{{--  modal  --}}
<!-- perbarui-->
<div id="perbarui" class="modal fade" role="dialog">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
          <form action="{{route('tambah.produk')}}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="modal-header">
                <h4 class="modal-title">Perawatan</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
              <div class="modal-body">
                <div class="row">
                  <div class="col-md-10 offset-1">
                  <textarea class="form-control">{{$penitipan[0]->fasilitas}}</textarea>
                  <p class="mt-3"> <input type="checkbox" name="sudah" required> <label for="sudah"> Sudah Melakukan Perawatan ? </label></p>
                  </div>  
                </div>
              </div>
              <div class="modal-footer">
              <button class="btn btn-primary" type="submit" id="lakukan">Simpan</button>
              <button class="btn btn-danger" type="button" data-dismiss="modal">Tutup</button>
            </div>
          </form>
        </div>
    </div>
</div>

<!-- perbarui-->
<div id="info" class="modal fade" role="dialog">s
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content bg-transparent text-center text-white mt-5" style="border:0px;">
            <h1 class="mt-5"> <i class="fa fa-hand-holding-heart text-success"> </i></h1>
            <h1>   Panel ini digunakan untuk memonitoring hewan penitipan. </h1>
        </div>
        
    </div>
</div>

{{-- pengambilan --}}
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
{{--  end modal  --}}


<!-- Sudah Teraktivasi -->
<div class="row">
    <div class="col-md-12 row">
        <div class="col-md-2 offset-2">
            <div class="card shadow mb-4 bg-success" style="padding:10px;">
                <div class="row">
                    <div class="col-md-12 text-center text-white">
                        Max :
                        <span style="font-size: 30px;"> {{$penitipan[0]->max}} </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 text-right">
          <div class="row">
            <div class="col-md-12">
              <a class="text-info" style="font-size: 25px;" href="#" data-target="#info" data-toggle="modal"> <i class="fa fa-info-circle"> </i> </a>
            </div>
            @if($status != 'riwayat')
            <div class="col-md-12">
                <a href="#" class="btn btn-info mt-3" data-target="#perbarui" data-toggle="modal"> <i class="fa fa-clipboard"> </i> </a>
            </div>
            @endif
          </div>
        </div>
    </div>
 <div class="col-md-8 offset-2">
    <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Kandang</h6>
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
                      <th>Id Order</th>
                      <th>Id Produk</th>
                      <th>Foto</th>
                      <th>Ekor</th>
                      <th>Lama Penitipan</th>
                      @if($status != 'riwayat')
                      <th>Aksi</th>
                      @endif
                    </tr>
                  </thead>
                  
                  <tbody class="tampil">
                    <?php $i=1;
                        $a = 2;
                    ?>
                    @foreach($penitipan as $p)
                    <tr class="tr">
                    	<td class="text-center">{{$i++}}</td>
                        @if(Session::get('status')=='super')
                            <th>  </th>
                        @endif
                        <td class="text-center">{{$p->id_order}}</td>
                        <td class="text-center">{{$p->id_produk}}</td>
                        <td class="text-center"><img width="60px" height="50px" src="{{asset($p->foto)}}"></td>
                        <td class="text-center">{{$p->jumlah}}</td>
                        <td> {{$p->awal}} - {{$p->akhir}} </td>
                        @if($status != 'riwayat')
                        <td>
                              @if( $i > 2 && count($penitipan) >= 2 && $p->id_order == $penitipan[$a-2]->id_order)
                                @php  $a++ @endphp
                              @else
                              <a href="#" data-id="{{$p->id_order}}" data-target="#persiapan_pengiriman" data-toggle="modal" class="btn btn-primary btn-sm status"> <i class="fa fa-truck"> </i> </a>
                              @endif
                        </td>
                        @endif
                       
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
@endif


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

    $('.status').click(function(){
      $('#id_order').val($(this).data('id'));
    });

</script>
@endsection
