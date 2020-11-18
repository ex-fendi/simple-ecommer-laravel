<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Dermaji e-buy | @yield('title', '')</title>

        <link href="/img/favicon.ico" rel="SHORTCUT ICON" />

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Montserrat%7CRoboto:300,400,700" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">

        @yield('extra-css')

        <style type="text/css">
            a:hover{
                color: none;s
                text-decoration: none;
            }
        </style>
    </head>


<body class="@yield('body-class', '')">

    {{--  header  --}}
    <header class="with-background">
            <div class="top-nav container">
                <div class="top-nav-left">
                    <div class="logo"><a href="{{route('landingpage')}}">SIRANDU</a></div>
                    @include('partials.menus.main')
                </div>
    
                <div class="top-nav-right">
                    @include('partials.menus.main-right')
                </div>
            </div> <!-- end top-nav -->
    </header>

    {{--  end header  --}}

        <div class="container">
                    <div class="row mt-5">
                        <div class="col-md-6 offset-3 text-center" style="padding:30px;">
                        <h2>Register</h2>
                        <div class="card" style="padding:30px;">
                            @if (session()->has('success_message'))
                            <div class="alert alert-success">
                                {{ session()->get('success_message') }}
                            </div>
                            @endif 
                            @if(count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                            <div class="spacer"></div>
                            <form action="{{ route('user.register.submit') }}" method="POST">
                                {{ csrf_field() }}
                                <div class="form-group text-left">
                                <label class="mb-1"> Username </label>
                                <input class="form-control" type="text" id="name" name="name" value="{{ old('name') }}" placeholder="Nama" required>
                                </div>
                                <div class="form-group text-left">
                                <label > Alamat </label>
                                <input class="form-control" type="text" id="alamat" name="alamat" value="{{ old('alamat') }}" placeholder="Alamat" required>
                                </div>
                                <div class="form-group text-left">
                                <label> No. Hp </label>
                                <input  class="form-control " type="number" id="No.Hp" name="nohp_user" value="{{ old('nohp_user') }}" placeholder="08xxxx" required>
                                </div>
                                <div class="form-group text-left">
                                <label> Email </label>
                                <input class="form-control " type="email" id="Email" name="email_user" value="{{ old('email') }}" placeholder="contoh@gmail.com" required>
                                </div>
                                <div class="form-group text-left">
                                <label> Password </label>
                                <input class="form-control" type="password" id="password" name="password" value="{{ old('password') }}" placeholder="Password" required>
                                </div>
                            
                                <div class="login-container">
                                    <label>
                                        {{--  <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Ingatkan  --}}
                                    </label>


                                </div>
                                <button type="submit" class="btn btn-primary form-control" style="padding:5px;">Daftar</button>
                                ______ or _____
                                <br/>
                                <a href="{{route('user.login')}}" class="btn btn-md"> Sudah Punya Akun? </a>        
                            </form>
                        </div>
                    </div>
                    </div>
                    
                </div>
            </div>
</body>
</html>