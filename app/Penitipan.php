<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Penitipan extends Model
{
    protected $fillable = ['id_user', 'id_kandang', 'id_order', 'lama_penitipan', 'total_biaya', 'awal', 'akhir'];

    public $timestamps = true;

    public function kandang(){
        $result = DB::table('penitipans')
        ->leftjoin('kandangs','kandangs.id', '=', 'penitipans.id_kandang')
        ->leftjoin('tbl_list_order', 'tbl_list_order.id_order', '=', 'penitipans.id_order')
        ->leftjoin('tbl_produk', 'tbl_produk.id', '=', 'tbl_list_order.id_produk')
        ->leftjoin('tbl_order', 'tbl_order.id_order', '=' ,'penitipans.id_order');
        return $result;
    }
}
