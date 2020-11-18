<?php

namespace App\Http\Controllers\AuthPenjual;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\User;
use Session;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */
     public function showLoginForm()
    {
        return view('authPenjual.login');
    }

    public function login(Request $request)
    {        $Auth = new User;
        $this->validate($request, [
            'email'=>'required',
            'password'=>'required|min:6'
        ]);

        $credentials = [
            'username'=>$request->email,
            'password'=>$request->password
        ];

        // login
       try{
        $auth = $Auth->check_login($request->email, bcrypt($request->password));
        if($auth){
            if(Hash::check($request->password, $auth[0]->password)){
                $result = User::where('username', $request->email)->first();
                if($result->level == 2){
                    Session::put('status', 'admin');
                    Session::put('username', $request->email);
                    Session::put('id_log', $result->id_user);
                    Session::put('flash', 'Selamat datang di panel admin');
                    return redirect()->route('produk.home');
                }
                else{
                    Session::put('flash', 'Username atau Password anda salah');
                    return back();
                }
            }
            else{
                Session::put('flash', 'Username atau Password anda salah');
            return back();
            }
        }
        else{
            Session::put('flash', 'Username atau Password anda salah');
            return back();
        }
    }
    catch(\Exception $e){
        Session::put('flash', 'Hubungi Progammer anda');
        return back();
    }
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }
}
