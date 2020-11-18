@extends('template')
@section('breadcrumb')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
   <h1 class="h3 mb-0 text-gray-800">Chat
</div>	
@endsection
@section('konten')

<div class="row">
  @foreach($keluhan as $keluhan)
  @if($keluhan->is_super == 'n')
  <div class="row col-md-12">
  <div class="col-lg-5 text-left">
    <div class="breadcrumb">
    {{$keluhan->pesan}}
    </div>
    <div class="text-right" style="margin-top: -15px; margin-bottom: 10px;">
     <small> 19:00 </small>
    </div>
  </div>
</div>
  @else
  <div class="row col-md-12">
  <div class="col-lg-5 offset-md-7 text-left">
    <div class="breadcrumb bg-info text-white">
      
    {{$keluhan->pesan}}
    </div>
    <div class="text-right" style="margin-top: -15px; margin-bottom: 10px;">
     <small> 19:01 </small>
    </div>
  </div>
</div>
  @endif
  @endforeach
</div>

<form action="{{route('keluhan.kirim')}}" method="post">
@if(!(empty($keluhanId)))
<input name="id" type="hidden" value="{{$keluhanId}}">
@endif  
@csrf
<div class="row" style="bottom: 30px;position: fixed; width:50%; margin-left: 15%; padding: 0px;">
  <div class="col-md-12" style="padding: 0px;">
    <div class="form-group row">
      <div class="input-group col-lg-12" style="">
               <input type="text" class="form-control" name="pesan" style="border-radius: 10px 0 0 10px; box-shadow: 0 0 1px;">
               <span class="input-group-btn">
                  <button class="btn btn-success" style="border-radius: 0 10px 10px 0 ;"><i class="fa fa-headset"></i></button>
               </span>
        </div>
    </div>
  </div>
</div>
</form>
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
