@extends('template')
@section('breadcrumb')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
   <h1 class="h3 mb-0 text-gray-800">Kategory
</div>	
<a href="#" id="tambahPenjual" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#tambah"><i class="fas fa-users fa-sm text-white-50"></i> Tambah Kategory</a>
@endsection
@section('konten')

<!-- tambah -->
<div id="tambah" class="modal fade" role="dialog">
    <div class="modal-dialog modal-xs" role="document">
        <div class="modal-content">
          <form action="{{route('tambah.kategory')}}" method="post">
            {{csrf_field()}}
            <div class="modal-header">
                <h4 class="modal-title">Tambah Data Penjual</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
              <div class="modal-body">

                <label class='mb-1'>Nama Kategory</label>
                <input type="text" name="nama" class="form-control" placeholder="Nama Kategory" required="">

              </div>
              <div class="modal-footer">
              <button class="btn btn-primary" type="submit" id="lakukan">Tambah</button>
              <button class="btn btn-default" type="button" data-dismiss="modal">Tutup</button>
            </div>
          </form>
        </div>
    </div>
</div>

<!-- delete -->
<div id="hapus" class="modal fade" role="dialog">
    <div class="modal-dialog modal-xs" role="document">
        <div class="modal-content">
          <form action="{{route('hapus.kategory')}}" method="post">
            {{csrf_field()}}
            <div class="modal-header">
                <h4 class="modal-title">Hapus Data Penjual</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
              <div class="modal-body">

                <input type="hidden" class="id" name="id" value="">
                <input type="hidden" name="level" value="3">
                  <p>Apakah Anda yakin Akan Menghapus Kategory <strong class="nama"></strong> !</p>	
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
    <div class="modal-dialog modal-xs" role="document">
        <div class="modal-content">
          <form action="{{route('perbarui.kategory')}}" method="post">
            {{csrf_field()}}
            <div class="modal-header">
                <h4 class="modal-title">Update Kategory</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
              <div class="modal-body">
              
                <input type="hidden" class="id" name="id" value="">
                <label class='mb-1'>Nama Kategory</label>
                <input type="text" name="nama" class="form-control nama" placeholder="Nama Kategory" required="">
              
              </div>
              <div class="modal-footer">
              <button type="submit" class="btn btn-warning"> Update! </button>

              <button class="btn btn-primary" type="button" data-dismiss="modal">Tutup</button>
            </div>
          </form>
        </div>
    </div>
</div>

<!-- Sudah Teraktivasi -->
<div class="row">
  <div class="col-lg-2"></div>
  <div class="col-lg-8">
   <div class="card shadow mb-4">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Kategory</h6>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                      <tr class="text-center">
                        <th>No</th>
                        <th>Nama Kategory</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    
                    <tbody class="tampil">
                      <?php $i=1; ?>
                      @foreach($kategory as $pj)
                      <tr class="tr">
                      	<td>{{$i++}}</td>
                      	<td>{{$pj->nama_kategory}}</td>
                        <td class="branch">
                        <div class="row">
                          <div class="col-lg-6 col-md-12 col-xs-12">
                            <a href="#" id="update" class="btn btn-warning btn-circle btn-sm view" alt="Perbarui" data-target="#perbarui" data-id="{{$pj->id_kategory}}" data-toggle="modal">
                            <i class="fas fa-clipboard-list"></i>
                            </a>
                          </div>
                          <div class="col-lg-6 col-md-12 col-xs-12">
                            <a href="#" id="delete" class="btn btn-danger btn-circle btn-sm view" data-id="{{$pj->id_kategory}}" alt="Hapus" data-toggle="modal" data-target="#hapus">
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

@section('js')
<script>
  var url='{{route('ajax.data.kategory')}}';

   $('.view').click(function(){
      const id = $(this).data('id');
      // alert(id);
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
        $('.id').val(data[0].id_kategory);
        $('.nama').val(data[0].nama_kategory);
        $('.nama').html(data[0].nama_kategory);
      }
    });

    });

</script>
@endsection
