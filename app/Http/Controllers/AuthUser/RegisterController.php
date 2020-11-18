<?php

namespace App\Http\Controllers\AuthUser;

use App\User;
use App\DetailUserModel;
use App\Http\Requests\UserRegisterFormRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Session;

class RegisterController extends Controller
{
   

    public function __construct()
    {
        // $this->middleware('guest');
    }

    public function index(){
        return view('authUser.register');
    }


    public function store(UserRegisterFormRequest $request){
        // dd('oek');
        DetailUserModel::create([
            'nama_user'=>$request->name,
            'alamat_user'=>$request->alamat,
            'nohp_user'=>$request->nohp_user,
            'email_user'=>$request->email
        ]);

        $id = DetailUserModel::where('email_user', $request->email)->pluck('id_user')->first();
        
        User::create([
            'id_user'=>$id,
            'username'=>$request->email_user,
            'password'=>bcrypt($request->password),
            'level'=>1
        ]);

        Session::put('flash', 'Akun berhasil di registrasi.');
        return redirect()->route('user.login');

    }

 
   
}
