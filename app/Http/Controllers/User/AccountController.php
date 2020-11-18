<?php

namespace App\Http\Controllers\User;

use Session;
use App\User;
use App\GeneralSetting;
use App\DetailUserModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserUpdateFormRequest;

class AccountController extends Controller
{
    public function index(){
        $general = GeneralSetting::first();
        $account = DetailUserModel::where('id_user', Session::get('id_log'))->first();
        return view('account-user', compact('account', 'general'));
    }

    public function update(UserUpdateFormRequest $request){
        if(!(empty($request->rubah))){
            if(!(empty($request->username)) && !(empty($request->password))){
                if(strlen($request->username) >= 8 && strlen($request->password) >= 8){
                    User::where('id_user', Session::get('id_log'))->update([
                        'username'=>$request->username,
                        'password'=>bcrypt($request->password)
                    ]);
                }
                else{
                    Session::put('flash', 'Maaf, Form Username dan Password harus lebih dari 8 karakter');
                    return back();
                }
            }
            else{
                Session::put('flash', 'Maaf, Form Username dan Password harus diisi terlebih dahulu');
                return back();
            }
            
        }

        $tentang_user = $request->tentang_user;
        if(empty($request->tentang_user)){
            $tentang_user = null;
        }
        DetailUserModel::where('id_user', Session::get('id_log'))->update([
            'nama_user'=>$request->nama_user,
        	'alamat_user'=>$request->alamat_user,
        	'nohp_user'=>$request->nohp_user,
        	'tentang_user'=>$request->tentang_user,
        	'email_user'=>$request->email_user
        ]);
        
        Session::put('flash', 'Data berhasil diperbaharui');
        return back();
    }
}
