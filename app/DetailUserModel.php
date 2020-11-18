<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DetailUserModel extends Model
{
    protected $table = 'tbl_detailuser';
    protected $fillable = ['nama_user', 'alamat_user', 'nohp_user','tentang_user','email_user', 'is_deleted'];
    public $timestamps = false;

    public function detailUser($aktivasi, $level){
    	 $result = DB::table('tbl_detailuser')->leftjoin('tbl_aktivasi', 'tbl_detailuser.id_user', '=', 'tbl_aktivasi.id_user')->leftjoin('users', 'tbl_detailuser.id_user', '=', 'users.id_user')->where('tbl_aktivasi.status_aktivasi', $aktivasi)->where('tbl_detailuser.is_deleted', 'n')->where('users.level', $level)->get();
    	 return $result;
    }

    
}
