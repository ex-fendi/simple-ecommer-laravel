<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Cart;
use App\Http\Controllers\Controller;
use Session;
use App\Http\Requests\CheckoutFormRequest;
use App\OrderModel;
use App\list_order;
use Carbon\Carbon;
use App\GeneralSetting;
use App\Penitipan;

class CartController extends Controller
{
    
    public function index(){
        // dd(Cart::instance(Session::get('id_log'))->content());
        $general = GeneralSetting::first();
        return view('cart', compact('general'));
    }

    public function add(Request $request){
        // cara penyimpanan cart
        // Cart::destroy();
        Cart::instance(Session::get('id_log'))
        ->add($request->id,$request->nama ,$request->qty, $request->harga, ['user'=>Session::get('id_log'), 'asset'=>$request->asset]);
        return redirect()->back();
    }

    public function penitipanCart(Request $request){
        Session::put('id_kandang', $request->id_kandang);
        Session::put('kandang', $request->kandang);
        Session::put('perhari', $request->perhari);
        return back();
    }

    public function submit(CheckoutFormRequest $request){
        try{
        $id_order = $this->get_idorder(10);
        if($request->status_penitipan == 'y'){
            $date = Carbon::parse($request->from);
            $now = Carbon::parse($request->to);
            $diff = $date->diffInDays($now);
            // dd($diff);
            Penitipan::create([
                'id_user'=>Session::get('id_log'),
                // 'id_kandang'=>$request->id_kandang,
                'id_order'=>$id_order,
                'awal'=>$request->from,
                'ahir'=>$request->to,
                // 'lama_penitipan'=>$diff,
                'total_biaya'=>Session::get('perhari')*$diff
            ]);
        }
            OrderModel::create([
                'id_order'=>$id_order,
                'id_user'=>Session::get('id_log'),
                'telp'=>$request->telp,
                'nama_pembeli'=>$request->nama,
                'provinsi'=>$request->provinsi,
                'kecamatan'=>$request->kecamatan,
                'kabupaten'=>$request->kabupaten,
                'alamat_pembeli'=>$request->alamat,
                'kode_pos'=>$request->kodepos,
                'status_penitipan'=>$request->status_penitipan,
                'pembayaran'=>'rekening',
                'bukti_pembayaran'=>'-',
                'status'=>'1',
                'batalkan'=>'n',
                'alasan'=>'-'
            ]);
        
        foreach(Cart::instance(Session::get('id_log'))->content() as $order){
            list_order::create([
                'id_order'=>$id_order,
                'id_produk'=>$order->id,
                'jumlah'=>$order->qty,
                'cair'=>'belum',
            ]);
        }
        // Session::flash()
        Session::forget('id_kandang');
        Session::forget('kandang');
        Session::forget('perhari');
        Cart::instance(Session::get('id_log'))->destroy();
        return redirect()->route('pesanan.index');
        }
        catch(\Exception $e){
            // return back();
            dd($e);
        }
    }

    public function remove(Request $request){
        // $rowId  = $
        Cart::instance(Session::get('id_log'))->remove($request->rowid);
        return redirect()->back();
    }

    public function get_idorder($length){
            $flag = false;
            $pool = '0123456789';
            do{
            $kode = substr(str_shuffle(str_repeat($pool, 5)), 0, $length);
            $check = OrderModel::where('id_order', $kode)->get()->count();
                if($check < 1){
                     return $kode;
                   }
             }while($flag = false);
    }

}
