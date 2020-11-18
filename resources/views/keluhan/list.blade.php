@extends('template')
@section('css') 
  <style type="text/css">
    .list:hover{
      background-color: #eaeaea;
    }
  </style>
@endsection
@section('breadcrumb')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
   <h1 class="h3 mb-0 text-gray-800">Daftar Keluhan
</div>	
@endsection
@section('konten')
<div class="row">
  <div class="col-md-6 offset-md-3">
     <div class="card shadow mb-4">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">List</h6>
              </div>
              <div class="card-body" style="padding: 10px 0 0 30px;">
                <div class="form-group row">
                <!-- foreach disini -->
                @php
                $a = 0;
                $i[$a]=0;
                $lanjut = 1;
                @endphp

                @foreach($keluhan as $keluhan)
                
                  @for($b = 0; $b < $a; $b++)
                      @if($keluhan->id_user == $i[$b])
                          @php
                            $lanjut = 0;
                            break;
                          @endphp
                    @else
                      @php
                      $lanjut = 1;
                      @endphp
                    @endif
                  @endfor
                  @if($lanjut == 1)
                  <div class="col-md-12 row list" style="padding: 20px 0; margin-bottom: 2px;">
                        <div class="col-md-4 text-center">
                          <i class="fa fa-user fa-2x" style="margin-top: 8px;"></i>
                        </div>
                        <div class="col-md-8 row">
                          <div class="col-md-12">
                           <a href="{{route('keluhan.super', ['id_user' => $keluhan->id_user])}}"> <strong>{{$keluhan->nama_user}} </strong></a>
                          </div>
                          <div class="col-md-12">
                              <small>Kelompok 2</small>
                          </div>
                         
                        </div>
                      </div>
                      @endif
                  @php
                    $lanjut = 0;
                  @endphp
                  @php
                    $i[$a] = $keluhan->id_user;
                    $a++;
                  @endphp
                @endforeach
                </div>
          </div>
      </div>
    </div>
  </div>



@endsection

@section('js')

@endsection
