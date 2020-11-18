<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Session;

class OrderModel extends Model
{
    protected $table = 'tbl_order';
    protected $fillable = ['status_penitipan','id_order', 'id_user', 'nama_pembeli','provinsi', 'alamat_pembeli' , 'telp', 'kabupaten', 'kecamatan','kelurahan', 'alamat', 'kode_pos', 'pembayaran', 'bukti_pembayaran', 'status', 'batalkan', 'alasan', 'shiping'];

    public $timestamps = true;

    public function pesanan_user(){
        $result = DB::table('tbl_order')->leftjoin('tbl_list_order', 'tbl_list_order.id_order', '=', 'tbl_order.id_order')
                ->leftjoin('tbl_produk', 'tbl_produk.id', '=' ,'tbl_list_order.id_produk')
                ->leftjoin('penitipans', 'penitipans.id_order', '=', 'tbl_order.id_order')
                ->leftjoin('kandangs', 'kandangs.id', '=', 'penitipans.id_kandang');
        return $result;
    }

    public function setListOrder($id_order, $id_produk, $jumlah){
    	try{
    		DB::table('tbl_list_order')->insert(['id_order'=>$id_order, 'id_produk'=>$id_produk, 'jumlah'=>$jumlah]);
    	}
    	catch(\Exception $e){

    	}
    }

    public function pesanan($status = 1, $status_1 = 0, $status_2 = 0){
        // jika $status = 1 maka, data pesanan jika bukan maka data pembatalan
        try{
            if($status_1 == 0){
                
                $hasil = DB::table('tbl_order')->leftjoin('tbl_status_order', 'tbl_status_order.kode_status', '=', 'tbl_order.status')->where('tbl_status_order.kode_status' , $status)->paginate(20);
                return $hasil;
            }
            else{
                $hasil = DB::table('tbl_order')->leftjoin('tbl_list_order', 'tbl_order.id_order', '=', 'tbl_list_order.id_order')->leftjoin('tbl_status_order', 'tbl_order.status', '=', 'tbl_status_order.kode_status')->where('tbl_order.status','!=' , $status)->where('tbl_order.status','!=' , $status_1)->where('tbl_order.status','!=' , $status_2)->paginate(20);
                return $hasil;
            }
        }
        catch(\Exception $e){
            // return $e;
        }
    }

    public function getPesananPenjual($status){
        $result = DB::table('tbl_order')->leftjoin('tbl_list_order', 'tbl_list_order.id_order', '=', 'tbl_order.id_order')
        ->leftjoin('tbl_produk', 'tbl_produk.id', '=' ,'tbl_list_order.id_produk')
        ->where('tbl_order.status', $status)
        ->where('tbl_produk.id_user', Session::get('id_log'))->get();
        return $result;
    }

    public function tracking(){
        $result = DB::table('tbl_order')->leftjoin('tbl_list_order', 'tbl_list_order.id_order', '=', 'tbl_order.id_order')
        ->leftjoin('tbl_produk', 'tbl_produk.id', '=' ,'tbl_list_order.id_produk')
        ->where('tbl_order.status', '!=', 2)
        ->where('tbl_order.status', '!=', 7)
        ->where('tbl_produk.id_user', Session::get('id_log'))->paginate(20);
        return $result;
    }

    public function detailOrder($id_order){
        $result = DB::table('tbl_order')->leftjoin('tbl_list_order', 'tbl_list_order.id_order', '=', 'tbl_order.id_order')->leftjoin('tbl_produk', 'tbl_list_order.id_produk', '=', 'tbl_produk.id')->leftjoin('tbl_detailuser', 'tbl_order.id_user', '=', 'tbl_detailuser.id_user')->where('tbl_list_order.id_order', $id_order)->get();
         return $result;
    }
     public function detailPencairanOrder($id_order){
        $result = DB::table('tbl_order')->leftjoin('tbl_list_order', 'tbl_list_order.id_order', '=', 'tbl_order.id_order')
        ->leftjoin('tbl_produk', 'tbl_list_order.id_produk', '=', 'tbl_produk.id')
        ->leftjoin('tbl_detailuser', 'tbl_produk.id_user', '=', 'tbl_detailuser.id_user')
        ->where('tbl_list_order.id_order', $id_order)
        ->get();
         return $result;
    }
}
