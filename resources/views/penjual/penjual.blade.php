@extends('template')
@section('breadcrumb')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
   <h1 class="h3 mb-0 text-gray-800">Data Penjual
</div>	
<a href="#" id="tambahPenjual" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#tambah"><i class="fas fa-users fa-sm text-white-50"></i> Tambah Penjual</a>
@endsection
@section('konten')

<!-- tambah -->
<div id="tambah" class="modal fade" role="dialog">
    <div class="modal-dialog modal-xs" role="document">
        <div class="modal-content">
          <form action="{{route('tambah.user')}}" method="post">
            {{csrf_field()}}
            <div class="modal-header">
                <h4 class="modal-title">Tambah Data Penjual</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
              <div class="modal-body">
                <input type="hidden" name="level" value="2">
                <label class='mb-1'>Nama Penjual</label>
                <input type="text" name="nama" class="form-control" placeholder="Nama Penjual" required="">
                <label class='mb-1 mt-2'>Alamat Penjual</label>
                <input type="text" name="alamat" class="form-control" placeholder="Alamat Penjual" required="">
                <label class='mb-1 mt-2'>Nomer Hp Penjual</label>
                <input type="text" name="nohp_user" class="form-control" placeholder="085xxxxxxxxx" required="">
                <label class='mb-1 mt-2'>Email Penjual</label>
                <input type="email" name="email_user" class="form-control" placeholder="example@gmail.com" required=""> 

                <hr class="mb-1">
                 
                <label class='mb-1 mt-2'>Username</label>
                <input type="text" name="username" class="form-control" placeholder="Username" required="">

                <label class='mb-1 mt-2'>Password</label>
                <input type="password" name="password" class="form-control pass" placeholder="example@gmail.com" required="">

                <label class='mb-1 mt-2'>Ulangi Password</label>
                <input type="password" name="ulangi" class="form-control ulangi" placeholder="example@gmail.com" required="">

              </div>
              <div class="modal-footer">
              <button class="btn btn-success" type="submit" disabled="" id="lakukan">Tambah</button>
              <button class="btn btn-primary" type="button" data-dismiss="modal">Tutup</button>
            </div>
          </form>
        </div>
    </div>
</div>

<!-- delete -->
<div id="hapus" class="modal fade" role="dialog">
    <div class="modal-dialog modal-xs" role="document">
        <div class="modal-content">
          <form action="{{route('hapus.user')}}" method="post">
            {{csrf_field()}}
            <div class="modal-header">
                <h4 class="modal-title">Hapus Data Penjual</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
              <div class="modal-body">

                <input type="hidden" class="id" name="id" value="">
                <input type="hidden" name="level" value="3">
                  <p>Apakah Anda yakin Akan Menghapus <strong class="nama"></strong> !</p>	
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
          <form action="{{route('perbarui.user')}}" method="post">
            {{csrf_field()}}
            <div class="modal-header">
                <h4 class="modal-title">Updata Data Penjual</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
              <div class="modal-body">
                <input type="hidden" class="id" name="id" value="">
                <input type="hidden" name="level" value="3">
                <label class='mb-1'>Nama Penjual</label>
                <input type="text"  name="nama" class="form-control v_nama" value="Nama Penjual" required="">
                <label class='mb-1 mt-2'>Alamat Penjual</label>
                <input type="text"  value="v_alamat" name="alamat" class="form-control v_alamat" value="Alamat Penjual" required="">
                <label class='mb-1 mt-2'>Nomer Hp Penjual</label>
                <input type="text"  value="v_nohp" name="nohp_user" class="form-control v_nohp" value="085xxxxxxxxx" required="">
                <label class='mb-1 mt-2'>Email Penjual</label>
                <input type="email"  value="v_email" name="email_user" class="form-control v_email" value="example@gmail.com" required=""> 
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
    <div class="modal-dialog modal-xs" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Lihat Data Penjual</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
              <div class="modal-body">
                <input type="hidden" name="level" value="3">
                <label class='mb-1'>Nama Penjual</label>
                <input type="text"  name="nama" class="form-control v_nama" value="Nama Penjual" required="" readonly="">
                <label class='mb-1 mt-2'>Alamat Penjual</label>
                <input type="text"  value="v_alamat" name="alamat" class="form-control v_alamat" value="Alamat Penjual" required="" readonly="">
                <label class='mb-1 mt-2'>Nomer Hp Penjual</label>
                <input type="text"  value="v_nohp" name="No_Hp" class="form-control v_nohp" value="085xxxxxxxxx" required="" readonly="">
                <label class='mb-1 mt-2'>Email Penjual</label>
                <input type="email"  value="v_email" name="email" class="form-control v_email" value="example@gmail.com" required="" readonly=""> 
              </div>
              <div class="modal-footer">
              <button class="btn btn-primary" type="button" data-dismiss="modal">Tutup</button>
            </div>
            </div>
    </div>
</div>


<!-- Aktivasi -->
<div id="aktivasi" class="modal fade" role="dialog">
    <div class="modal-dialog modal-xs" role="document">
        <div class="modal-content">
          <form method="POST" action="{{route('penjual.aktivasi')}}">
            @csrf
            <div class="modal-header">
                <h4 class="modal-title"><i class="fa fa-info"> Aktivasi </i></h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
              <div class="modal-body">
                <input type="hidden" class="id" name="id" value="">
                <input type="hidden" class="nama" name="nama" value="">
                <span> Apakah anda yakin <strong class="nama"> </strong> akan diaktifkan ? </span>
              </div>
              <div class="modal-footer">
                  <button class="btn btn-default" type="button" data-dismiss="modal">Tutup</button>
                  <button class="btn btn-primary" type="submit">Aktifkan</button>
              </div>
          </form>
            </div>
    </div>
</div>

<!-- nonaktivasi -->
<div id="disaktivasi" class="modal fade" role="dialog">
    <div class="modal-dialog modal-xs" role="document">
        <div class="modal-content">
          <form method="POST" action="{{route('penjual.nonaktif')}}">
            @csrf
            <div class="modal-header">
                <h4 class="modal-title"><i class="fa fa-info"> Nonaktifkan User </i></h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
              <div class="modal-body">
                <input type="hidden" class="id" name="id" value="">
                <input type="hidden" class="nama" name="nama" value="">
                <span> Apakah anda yakin <strong class="nama"> </strong> akan dinonaktifkan ? </span>
              </div>
              <div class="modal-footer">
                  <button class="btn btn-default" type="button" data-dismiss="modal">Tutup</button>
                  <button class="btn btn-danger" type="submit">Nonaktifkan</button>
              </div>
          </form>
            </div>
    </div>
</div>

<!-- Belum Teraktivasi -->
 <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Belum di Aktivasi</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr class="text-center">
                      <th>No</th>
                      <th>Nama Penjual</th>
                      <th>No.Hp</th>
                      <th>Email</th>
                      <th>Aksi</th>
                      <th>Aktivasi</th>
                    </tr>
                  </thead>
                  
                  <tbody class="tampil">
                    <?php $i=1; ?>
                    @foreach($penjual_belumAktivasi as $pj)
                    <tr class="tr">
                      <td>{{$i++}}</td>
                      <td>{{$pj->nama_user}}</td>
                      <td>{{$pj->nohp_user}}</td>
                      <td>{{$pj->email_user}}</td>
                      <td class="branch">
                      <div class="row">
                        <div class="col-lg-4 col-md-12 col-xs-12">
                        <a href="#"  class="btn btn-primary btn-circle btn-sm view" data-id="{{$pj->id_user}}" data-target="#lihat" data-toggle="modal">
                        <i class="fas fa-eye"></i>
                    </a>
                  </div>
                  @if(Session::get('status') == 'admin')
                        <div class="col-lg-4 col-md-12 col-xs-12">
                        <a href="#" id="update" class="btn btn-warning btn-circle btn-sm view" alt="Perbarui" data-target="#perbarui" data-id="{{$pj->id_user}}" data-toggle="modal">
                        <i class="fas fa-clipboard-list"></i>
                    </a>
                  </div>
                  @endif
                  <div class="col-lg-4 col-md-12 col-xs-12">
                        <a href="#" id="delete" class="btn btn-danger btn-circle btn-sm view" data-id="{{$pj->id_user}}" alt="Hapus" data-toggle="modal" data-target="#hapus">
                        <i class="fas fa-trash"></i>
                    </a>
                  </div>
                </div>
                      </td>
                      <td>
                        <div class="row">
                          <div class="col-md-12">
                            <a href="#" class="btn btn-success btn-sm btn-block aktivasi" data-id="{{$pj->id_user}}" data-nama="{{$pj->nama_user}}" data-target="#aktivasi" data-toggle="modal"> Aktifkan </a>
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


<!-- Sudah Teraktivasi -->
 <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data Penjual</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr class="text-center">
                      <th>No</th>
                      <th>Nama Penjual</th>
                      <th>No.Hp</th>
                      <th>Email</th>
                      <th>Aksi</th>
                      <th>Aktivasi</th>
                    </tr>
                  </thead>
                  
                  <tbody class="tampil">
                    <?php $i=1; ?>
                    @foreach($penjual_teraktivasi as $pj)
                    <tr class="tr">
                    	<td>{{$i++}}</td>
                    	<td>{{$pj->nama_user}}</td>
                    	<td>{{$pj->nohp_user}}</td>
                    	<td>{{$pj->email_user}}</td>
                      <td class="branch">
                      <div class="row">
                        <div class="col-lg-4 col-md-12 col-xs-12">
                        <a href="#"  class="btn btn-primary btn-circle btn-sm view" data-id="{{$pj->id_user}}" data-target="#lihat" data-toggle="modal">
                        <i class="fas fa-eye"></i>
                    </a>
                  </div>
                  @if(Session::get('status') == 'admin')
                        <div class="col-lg-4 col-md-12 col-xs-12">
                        <a href="#" id="update" class="btn btn-warning btn-circle btn-sm view" alt="Perbarui" data-target="#perbarui" data-id="{{$pj->id_user}}" data-toggle="modal">
                        <i class="fas fa-clipboard-list"></i>
                    </a>
                  </div>
                  @endif
                  <div class="col-lg-4 col-md-12 col-xs-12">
                        <a href="#" id="delete" class="btn btn-danger btn-circle btn-sm view" data-id="{{$pj->id_user}}" alt="Hapus" data-toggle="modal" data-target="#hapus">
                        <i class="fas fa-trash"></i>
                    </a>
                  </div>
                </div>
                      </td>
                      <td>
                        <div class="row">
                          <div class="col-md-12">
                            <a href="#" class="btn btn-danger btn-sm btn-block aktivasi" data-id="{{$pj->id_user}}" data-nama="{{$pj->nama_user}}" data-target="#disaktivasi" data-toggle="modal"> Nonaktifkan </a>
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
  var url='{{route('ajax.detail.user')}}';

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
        $('.id').val(data[0].id_user);
        $('.v_nama').val(data[0].nama_user);
        $('.v_alamat').val(data[0].alamat_user);
        $('.v_nohp').val(data[0].nohp_user);
        $('.v_email').val(data[0].email_user);
        $('.nama').html(data[0].nama_user);
      }
    });

    });

  $('.aktivasi').click(function(){
    $('.nama').val($(this).data('nama'));
    $('.nama').html($(this).data('nama'));
    $('.id').val($(this).data('id'));
  });

   $('.ulangi').change(function(){
      var password = $('.pass').val();
      var fix_password = $(this).val();
      
      if(fix_password == password){
        $('#lakukan').removeAttr('disabled', ' ');
        $('.pass').css({'border-color': 'green'});
        $('.ulangi').css({'border-color': 'green'});
      }

      else{
        $('#lakukan').attr('disabled', ' ');
        $('.pass').css({'border-color': 'red'});
        $('.ulangi').css({'border-color': 'red'});
      }

   });

</script>
@endsection
