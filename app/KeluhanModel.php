<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class KeluhanModel extends Model
{
    protected $fillable = ['id_pesan', 'id_user', 'pesan','is_super'];

    public $timestamps = true;

    public function getData(){
        $result = DB::table('keluhan_models')
        ->leftjoin('tbl_detailuser', 'tbl_detailuser.id_user', '=' , 'keluhan_models.id_user')
        ->orderBy('keluhan_models.no', 'desc')
        ->where('keluhan_models.id_user', '!=', '0')
        ->get();
    	return $result;
    }

}
