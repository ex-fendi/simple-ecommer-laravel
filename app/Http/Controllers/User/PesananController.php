<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\OrderModel as Order;
use Session;
use App\GeneralSetting;
use App\Tracking;
use App\list_order;

class PesananController extends Controller
{
    public function index(){

        $general = GeneralSetting::first();
        $order = new Order;
        $order = $order->pesanan_user()->where('tbl_order.id_user', Session::get('id_log'))
        ->select('tbl_order.nama_pembeli', 'tbl_produk.foto', 'tbl_order.id_order', 'tbl_order.status')
        ->groupBy('tbl_order.no')
        ->orderBy('tbl_order.no', 'desc')
        ->take(1)->paginate(4);
        return view('pesanan-user', compact('order', 'general'));
    }

    public function detail(Request $request){

        $general = GeneralSetting::first();
        $list = new Order;
        $order = Order::where('id_order', $request->id)->first();
        $list = $list->pesanan_user()
        ->where('tbl_order.id_order', $request->id)
        ->select('tbl_produk.judul_produk', 'tbl_order.status_penitipan', 
        'tbl_order.status' ,'tbl_order.shiping', 'tbl_order.id_order' , 'tbl_order.bukti_pembayaran' ,
        'tbl_produk.harga_kambing', 'tbl_list_order.jumlah','tbl_produk.foto',
        'penitipans.total_biaya', 'kandangs.lokasi')
        ->get();
        $track = list_order::where('id_order', $request->id)->with('tracking')->get();
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

        return view('detail-pesanan-user', compact('order', 'list', 'track','subtotal', 'total', 'general'));
    }

    public function pembayaran(Request $request){
        // dd($request->id);
        $target_dir = "assets/pembayaran/"; //set direktori
        $target_file = $target_dir . $_FILES["pembayaran"]["name"]; //target dir dan nama
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION)); //tipe
        if (move_uploaded_file($_FILES["pembayaran"]["tmp_name"], $target_file)) { //upload
            $url = $target_file;
        } 

        Order::where('id_order', $request->id)->update([
            'bukti_pembayaran'=>$url,
            'status'=>3
        ]);
        return redirect()->back();
    }
}
