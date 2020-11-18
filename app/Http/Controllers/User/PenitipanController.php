<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\Kandang;
use App\Menu;
use App\Penitipan;
use Session;
use App\GeneralSetting;

class PenitipanController extends Controller
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
        $menu = $this->menu;
        $child = $this->child;
        $childCount = $this->childCount;
        $general = $this->general;
        $kandang = new Kandang;
        if(Session::get('status') == 'admin'){
            $kandang = $kandang->penitipan()
            ->where('kandangs.id_user', Session::get('id_log'))
            ->where('penitipans.is_finish', 'n')
            ->where('tbl_order.status', 8)
            ->select('kandangs.id', 'kandangs.foto', 'kandangs.max', 'tbl_detailuser.nama_user')
            ->get();
        }
        if(Session::get('status')=='super'){
            $kandang = new Kandang;
            $kandang = $kandang->kandang()->select('kandangs.*', 'tbl_detailuser.nama_user')
            ->where('kandangs.is_deleted', 'n')->get();
        }
        $status = 'sedang_berlangsung';
        return view('penitipan.penitipan', compact('menu','general' ,'status' ,'childCount','child', 'kandang'));
    }

    public function riwayat(){
        $menu = $this->menu;
        $child = $this->child;
        $childCount = $this->childCount;
        $general = $this->general;
        $kandang = new Kandang;
        if(Session::get('status') == 'admin'){
            $kandang = $kandang->penitipan()
            ->where('kandangs.id_user', Session::get('id_log'))
            ->where('penitipans.is_finish', 'y')
            ->Orwhere('tbl_order.status', 4)->Orwhere('tbl_order.status', 5)
            ->Orwhere('tbl_order.status', 6)->Orwhere('tbl_order.status', 7)
            ->select('kandangs.id', 'kandangs.foto', 'kandangs.max', 'tbl_detailuser.nama_user')
            ->get();
        }
        if(Session::get('status')=='super'){
            $kandang = new Kandang;
            $kandang = $kandang->kandang()->select('kandangs.*', 'tbl_detailuser.nama_user')
            ->where('kandangs.is_deleted', 'n')->get();
        }
        $status = 'riwayat';
        return view('penitipan.penitipan', compact('menu', 'general' ,'status' , 'childCount','child', 'kandang'));
    }

    public function detail(Request $request){
        $penitipan = new Penitipan;
        $menu = $this->menu;
        $child = $this->child;
        $general = $this->general;
        $childCount = $this->childCount;
        if($request->status == 'sedang_berlangsung'){
            $penitipan = $penitipan->kandang()
            ->where('kandangs.id_user', Session::get('id_log'))
            ->where('is_finish', 'n')   
            ->where('kandangs.id', $request->id)
            ->where('tbl_order.status', 8)
            ->select('penitipans.id_order','tbl_list_order.id_produk', 'tbl_produk.foto', 'tbl_list_order.jumlah',
                    'penitipans.awal', 'penitipans.akhir', 'kandangs.max', 'kandangs.fasilitas', 'kandangs.foto'
                    , 'tbl_order.status'
                    )
            ->get();
            $status = 'sedang_berlangsung';
        }
        else{
            $penitipan = $penitipan->kandang()
            ->where('kandangs.id_user', Session::get('id_log'))
            ->where('is_finish', 'n')   
            ->where('kandangs.id', $request->id)
            ->Orwhere('tbl_order.status', 4)->Orwhere('tbl_order.status', 5)
            ->Orwhere('tbl_order.status', 6)->Orwhere('tbl_order.status', 7)
            ->select('penitipans.id_order','tbl_list_order.id_produk', 'tbl_produk.foto', 'tbl_list_order.jumlah',
                    'penitipans.awal', 'penitipans.akhir', 'kandangs.max', 'kandangs.fasilitas', 'kandangs.foto'
                    , 'tbl_order.status'
                    )
            ->get();
            $status = 'riwayat';
        }
        return view('penitipan.detail', compact('menu', 'general' ,'status', 'childCount','child', 'penitipan'));
    }

    public function store(Request $request){
        dd($request);
    }
}
