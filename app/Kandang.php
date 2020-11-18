<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Kandang extends Model
{
    protected $fillable = ['id_user',
                            'foto',
                            'fasilitas',
                            'harga',
                            'luas',
                            'max',
                            'is_full',
                            'is_deleted',
                            'lokasi'
                        ];

    public $timestamps = true;

    public function kandang(){
        $result = DB::table('kandangs')->leftjoin('tbl_detailuser', 'tbl_detailuser.id_user', '=', 'kandangs.id_user');
        return $result;
    }

    public function penitipan(){
        $result = DB::table('kandangs')
        ->leftjoin('penitipans','penitipans.id_kandang', '=', 'kandangs.id')
        ->leftjoin('tbl_detailuser', 'tbl_detailuser.id_user', '=', 'kandangs.id_user')
        ->leftjoin('tbl_order', 'tbl_order.id_order', '=', 'penitipans.id_order');
        return $result;
    }
    
}
