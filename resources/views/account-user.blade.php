
<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Dermaji e-buy</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Montserrat%7CRoboto:300,400,700" rel="stylesheet">
         <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
        <link href="{{asset('css/hover-min.css')}}" rel="stylesheet">
    </head>
    <body>
        <div id="app">
            <header class="with-background">
                <div class="top-nav container">
                    <div class="top-nav-left">
                        <div class="logo"><a href="{{route('landingpage')}}">SIRANDU</a></div>
                        @include('partials.menus.main')
                    </div>

                    <div class="top-nav-right">
                        @include('partials.menus.main-right')
                    </div>
                </div> 
                <!-- end top-nav -->
            </header>

            <div id="second-header" class="breadcrumb">
                <div class="ml-5" style="color:#7a7a7a">
                <h6> Account / Detail</h6>
                </div>
            </div>
            <div class="container">
            <div class="row">
            <div class="col-md-12">
            <div class="spacer"></div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                   <div class="card" style="padding:20px;">
                          <div class="card-block">
                            <div class="row">
                            <div class="col-md-4 col-sm-4 text-center">
                                  <img src="{{asset('assets/img/users/user.png')}}" alt="" class="btn-md">
                              </div>
                              <div class="col-md-8 col-sm-8">
                                  <h2 class="card-title">Name: {{$account->nama_user}}</h2>
                                  <p class="card-text"><strong>Alamat: </strong> {{$account->alamat_user}}</p>
                                  <p class="card-text"><strong>Kontak: </strong> {{$account->nohp_user}} </p>
                                  <p><strong>Email: </strong> {{$account->email_user}}
                                      
                                  </p>
                                  <p class="card-text mt-3"><strong>Deskripsi: </strong><br>
                                    {{$account->tentang_user}}
                                    @if(empty($account->tentang_user))
                                    Belum diisi
                                    @endif
                                    </p>
                                  
                              </div>         
                            </div>
                            </div>
                        </div>
                  </div>
                </div> 
              </div>
            </div>

            <div class="col-md-12 mt-4">
                <dv class="breadcrumb bg-success text-white" style="opacity:0.5"><strong>Form Perbarui Data Account</strong></dv>
            </div>

            <div class="col-md-12 mt-4">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                       <p class="mb-2" style="padding:0 10px;"> Perbarui Data </p>
                        <form action="{{route('user.account.update.submit')}}" method="POST">
                        @csrf    
                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-5 col-sm-5">
                                    <div class="form-group">
                                        <label> Nama </label>
                                        <input type="text" name="nama_user" class="form-control" placeholder="Example Nama" value="{{$account->nama_user}}">
                                    </div>  
                                    <div class="form-group">
                                        <label> Alamat </label>
                                        <input type="text" name="alamat_user" class="form-control" placeholder="Example Rt 222 Rw 333" value="{{$account->alamat_user}}">
                                    </div>  
                                    <div class="form-group">
                                        <label> Kontak </label>
                                        <input type="text" name="nohp_user" class="form-control" placeholder="08xxxxxxxxx" value="{{$account->nohp_user}}">
                                    </div>  
                            </div>
                            <div class="col-md-5 col-sm-5">
                                <div class="form-group">
                                    <label> Email </label>
                                    <input type="text" name="email_user" class="form-control" placeholder="example@gmail.com" value="{{$account->email_user}}">
                                </div>
                                
                                <div class="form-group">
                                    <label> Deskripsi </label>
                                    <textarea class="form-control" name="tentang_user" placeholder="Optional">{{$account->tentang_user}}</textarea>
                                </div> 
                                <hr>
                                <div class="text-right">
                                <input type="checkbox" name="rubah">
                                <label class="mb-3" style="font-size: 14px;"> Rubah Keamanan ? </label>
                                </div>
                                <div class="form-group">
                                    <label> Username <span style="font-size: 12px;"> (optional) </span>  </label>
                                    <input type="text" name="username" class="form-control" placeholder="Username Anda" value="">
                                </div>  
                                <div class="form-group">
                                    <label> Password <span style="font-size: 12px;"> (optional) </span> </label>
                                    <input type="password" name="password" class="form-control" placeholder="Password Anda" value="">
                                </div>    
                            </div>
                            <div class="col-md-11 col-sm-12 text-right">
                                <button type="submit" class="btn btn-danger btn-md"><span class="fa fa-google-plus-square"></span> Simpan Perubahan </button>  
                            </div>
                        </div>
                        </form>
                    </div>
                  </div>
                </div> 
              </div>
            </div>
            </div>
            <div class="spacer"></div>
            @include('partials.footer-shop')
        </div>
        {{--  end app  --}}
    </body>

</html>