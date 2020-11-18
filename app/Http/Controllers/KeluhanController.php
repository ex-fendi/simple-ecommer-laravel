<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\PenjualFromRequest;
use App\DetailUserModel as DetailUser;
use App\AktivasiModel as Aktivasi;
use App\ProdukModel as Produk;
use App\OrderModel as Order;
use App\User as User;
use App\KeluhanModel;
use App\GeneralSetting;
use App\list_order;
use App\Menu;
use Session;

class KeluhanController extends Controller
{

	public $menu;
	public $childCount;
	public $child;
	public $general;


	public function __construct(){
		$menu = new Menu;
		
		$this->middleware('super');
        // dd(Session::get('status')); 
        $this->general = GeneralSetting::first();
        $this->menu = $menu->getmenu('y', Session::get('status'));
        $this->childCount = $menu->getChild('n', Session::get('status'))->count()-1;
        $this->child = $menu->getChild('n', Session::get('status')); 
	}

    public function index(){
    	$menu = $this->menu;
        $child = $this->child;
        $childCount = $this->childCount;
        $general = $this->general;
        $keluhanId = KeluhanModel::where('id_user', Session::get('id_log'))->pluck('id_pesan')->first();
        $keluhan = KeluhanModel::where('id_pesan', $keluhanId)->get();

        return view('keluhan.keluhan', compact('menu', 'general' ,'child', 'childCount', 'keluhan'));
    }

    public function superchat(Request $request){
        $menu = $this->menu;
        $child = $this->child;
        $general = $this->general;
        $childCount = $this->childCount;
        $keluhanId = KeluhanModel::where('id_user', $request->id_user)->pluck('id_pesan')->first();
        $keluhan = KeluhanModel::where('id_pesan', $keluhanId)->get();
        // dd($keluhanId);
        return view('keluhan.keluhan', compact('menu', 'general' ,'child', 'childCount', 'keluhan', 'keluhanId'));
    }

    public function list(){
        $menu = $this->menu; $kelhanmodel = new KeluhanModel;
        $child = $this->child;
        $childCount = $this->childCount;
        $general = $this->general;
        $keluhan = $kelhanmodel->getData();
        // dd($keluhan);
        return view('keluhan.list', compact('menu', 'general' , 'child', 'childCount', 'keluhan'));
    }

    public function kirim(Request $request){
        $super = 'n';
        $id_pesan = KeluhanModel::where('id_user', Session::get('id_log'))->get();
        if(!(empty($request->id))){
            $id_pesan = $request->id;
        }
        else if(count($id_pesan) < 1){
            $id_pesan = $this->getIdPesan();
        }
        else{
            $id_pesan = $id_pesan[0]->id_pesan;
        }        
        if(Session::get('status') == 'super')
        {
            $super = 'y';
        }

        KeluhanModel::create([
            'id_user'=>Session::get('id_log'),
            'id_pesan'=>$id_pesan,
            'pesan'=>$request->pesan,
            'is_super'=>$super,
        ]);
        
        return back();
    }

    public function getIdPesan($length = 6){
        $flag = false;
        $pool = '0123456789';

        do{
        $kode = substr(str_shuffle(str_repeat($pool, 5)), 0, $length);
        $check = KeluhanModel::where('id_pesan', $kode)->get()->count();
            if($check < 1){
                 return $kode;
                 $flag = true;
               }
         }while($flag = false);
        
     }
}
