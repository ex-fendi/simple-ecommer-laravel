<?php

namespace App\Http\Controllers\AuthSuper;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\User;
use Session;

class LoginController extends Controller
{
   


     /**
     * Show the application's login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        return view('authSuper.login');
    }

    public function login(Request $request)
    {
        // dd($request->email);
        $Auth = new User;
        $this->validate($request, [
            'email'=>'required|email',
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
                if($result->level == 3){
                    Session::put('status', 'super');
                    Session::put('username', $request->email);
                    Session::put('id_log', $result->id_user);
                    return redirect()->route('penjual.home');
                }
                else{
                    Session::put('flash', 'Username atau Password anda salah');
                    return back();
                }
            }
            else{
                Session::put('flash', 'Username dan Password anda tidak cocok'); 
                return back();
            }
        }
        else{
            Session::put('flash', 'Username dan Password anda tidak cocok');
            return back();
        }
    }
    catch(\Exception $e){
        Session::put('flash', 'Username dan Password anda tidak cocok');
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
        // $this->middleware('login');
    }
}
