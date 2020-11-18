@extends('template')

@section('breadcrumb')

{{--  <div class="d-sm-flex align-items-center justify-content-between mb-4">  --}}
   {{--  <h1 class="h3 mb-0 text-gray-800">Profil  --}}
{{--  </div>	  --}}

@endsection

@section('konten')
<div class="row">
   <div class="col-md-2 offset-md-2 col-xs-12 text-center">
         <img class="img-profile rounded-circle" src="{{asset('assets/img/users/user.png')}}" style="width:150px;">
             
   </div>

   <div class="col-md-3 col-xs-12">
      <form action="{{route('profile.update')}}" method="post">
      @csrf
      <div class="form-group">
         <label> Nama </label>
         <input name="nama" type="text" class="form-control" value="{{$detail->nama_user}}">
      </div>

      <div class="form-group">
         <label> Alamat </label>
         <input name="alamat" type="text" class="form-control" value="{{$detail->alamat_user}}">
      </div>
      <div class="form-group">
         <label> No Hp </label> 
         <input name="nohp_user" type="text" class="form-control" value="{{$detail->nohp_user}}">
      </div>
      <div class="form-group">
         <label> E-Mail </label>
         <input name="email_user" type="text" class="form-control" value="{{$detail->email_user}}">
      </div>

      <div class="form-group text-right mt-4">
         <button type="#" class="btn btn-primary form-control"> Perbarui </button>
      </div>
      </form>
   </div>
</div>



@endsection

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
@endsection
