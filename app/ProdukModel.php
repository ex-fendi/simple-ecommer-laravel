<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ProdukModel extends Model
{
    protected $table = 'tbl_produk';
    protected $fillable = ['id_kategory', 'id_user' , 'id_kandang', ',judul_produk','tinggi_kambing', 'berat_kambing', 'lingkar_kambing', 'panjang_kambing', 'umur_kambing', 'deskripsi_kambing', 'harga_kambing', 'foto', 'stok'];

    public $timestamps = true;

    public function tambah_kategory($nama){
    	$kategory = DB::table('tbl_kategory')->insert([
    		'nama_kategory'=>$nama,
    	]);
    }

    public function getData_kategory(){
    	$kategory = Db::table('tbl_kategory')->get();
    	return $kategory;
    }

    public function detailproduk($id){
        $result = DB::table('tbl_produk')->leftjoin('tbl_detailuser', 'tbl_detailuser.id_user', '=', 'tbl_produk.id_user')
        ->where('tbl_produk.id', $id);
        

        return $result;
    }

    public function kandang(){
        return $this->belongsTo(Kandang::class, 'id_kandang');
    }

    public function detailuser(){
        return $this->belongsTo(DetailUserModel::class, 'id_user', 'id_user');
    }

}
