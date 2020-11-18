<?php

namespace App\Http\Controllers;

use App\Http\Requests\PenjualFromRequest;
use App\Http\Requests\TrackingAddRequest;
use App\DetailUserModel as DetailUser;
use App\AktivasiModel as Aktivasi;
use App\ProdukModel as Produk;
use Illuminate\Http\Request;
use App\OrderModel as Order;
use App\GeneralSetting;
use App\User as User;
use App\list_order;
use App\Penitipan;
use App\Tracking;
use App\Menu;
use Session;

class TrackingController extends Controller
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
        $psn = new Order;
        $kt = new Produk;
        $menu = $this->menu;
        $child = $this->child;
        $childCount = $this->childCount;
        $general = $this->general;
        if(Session::get('status')=='super'){
            $order = $psn->pesanan(5);
        }
        else{
            $order = $psn->tracking(5);
        }
        $kategory  = $kt-> getData_kategory();
        $status = 'tracking';
        $header = 'Tracking';
        return view('order.order', compact('menu', 'general', 'childCount','child', 'produk', 'kategory', 'order', 'status', 'header'));
    }

    public function detail(Request $request){
        // dd($request->id);
        $menu = $this->menu;
        $child = $this->child;
        $childCount = $this->childCount;
        $order = Order::where('id_order', $request->id)->first();
        $list = new Order;
        $list = $list->pesanan_user()
        ->where('tbl_order.id_order', $request->id)
        ->select('tbl_produk.judul_produk', 'tbl_order.status_penitipan', 
        'tbl_order.status' ,'tbl_order.shiping', 'tbl_order.id_order' , 'tbl_order.bukti_pembayaran' ,
        'tbl_produk.harga_kambing', 'tbl_list_order.jumlah','tbl_produk.foto',
        'penitipans.total_biaya', 'kandangs.lokasi')
        ->get();
        $general = $this->general;
        $subtotal = 0;
        $total = 0;
        foreach($list as $l){
            $subtotal += $l->harga_kambing*$l->jumlah;
        }

        if(!(empty($list[0]->shiping))){
            $total =  $subtotal+$list[0]->shiping;
        }

        if($list[0]->status_penitipan = 'y'){
            $total +=  $list[0]->total_biaya;
        }
        return view('order.detail-order', compact('menu', 'general' ,'child', 'childCount', 'order', 'list', 'subtotal', 'total'));

    }

    public function tracking(TrackingAddRequest $request){
        $list = list_order::where('id_order', $request->id)->get();

        foreach($list as $item){
            if($item->produk->id_user == Session::get('id_log')){
            Tracking::create([
                'id_listorder'=>$item->no,
                'tracking'=>$request->wilayah
            ]);
            }
        }
        return back()->with('success', 'Tracking berhasil di perbarui');
    }
}
