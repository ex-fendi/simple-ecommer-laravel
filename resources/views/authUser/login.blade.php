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
        <style type="text/css">
            a:hover{
                color: none;
                text-decoration: none;
            }
        </style>
        @yield('extra-css')
    </head>


<body class="@yield('body-class', '')">

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

        <div class="container">

            
                <div class="">
                    <div class="row mt-5">

                        
                        <div class="col-md-6 offset-3 text-center" style="padding:30px;">
                        {{--  notif  --}}
                        @if(Session::has('flash'))
                        <div class="row">
                            <div class="container">
                                <div class="col-md-12 bg-danger mt-5 breadcrumb" style="opacity:0.5; color:#fff;">
                                        {{Session::get('flash')}}  
                                        @php
                                            Session::forget('flash');    
                                        @endphp
                                </div>
                                
                            </div>
                        </div>
                        @endif
                        {{--  notif  --}}
                        <h2>Login</h2>
                        <div class="card" style="padding:15px;padding:30px;">
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
                            <form action="{{ route('user.login.submit') }}" method="POST">
                                {{ csrf_field() }}
                            
                                <input class="form-control" type="text" id="username" name="username" value="{{ old('email') }}" placeholder="Email" required autofocus>
                                <input type="password" class="form-control mt-3" id="password" name="password" value="{{ old('password') }}" placeholder="Password" required>
                            
                                <div class="login-container">
                                    <label>
                                        {{--  <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Ingatkan  --}}
                                    </label>


                                </div>
                                <button type="submit" class="btn btn-primary form-control" style="padding:5px;">Login</button>
                            
                            <div class="spacer"></div>
            
                            <a href="{{ route('home') }}" class="btn btn-danger btn-md">
                                Lupa Password Anda ?
                            </a>
                            or  
                            <a href="{{ route('user.register') }}" class="btn btn-primary btn-md">
                                    Register Sekarang
                                </a>
            
                        </form>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
</body>
</html>