<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProfilFormRequest;
use App\Menu;
use Session;
use App\DetailUserModel;
use App\GeneralSetting;

class ProfileController extends Controller
{
    public $menu;
	public $childCount;
    public $child;
    public $general;

    public function __construct(Menu $menu ){
        $this->middleware('super');
        // dd(Session::get('status')); 
        $this->general = GeneralSetting::first();
        $this->menu = $menu->getmenu('y', Session::get('status'));
        $this->childCount = $menu->getChild('n', Session::get('status'))->count()-1;
        $this->child = $menu->getChild('n', Session::get('status')); 
            
    }
    
    public function index(){
        $detail = DetailUserModel::where('id_user', Session::get('id_log'))->first();
        $menu = $this->menu;
        $child = $this->child;
        $general = $this->general;
        $childCount = $this->childCount;
        return view('profil.profil-show', compact('menu', 'general' ,'child', 'childCount', 'detail'));
    
    }

    public function update(ProfilFormRequest $request){
        DetailUserModel::where('id_user', Session::get('id_log'))->update([
            "nama_user"=>$request->nama,
            "alamat_user"=>$request->alamat,
            "nohp_user"=>$request->nohp_user,
            "email_user"=>$request->email_user
        ]);
        Session::put('flash', 'Berhasil Diperbarui');
        return redirect()->back();
    }
}
