<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AktivasiModel extends Model
{
    protected $table = 'tbl_aktivasi';
    protected $fillable = ['id_user', 'kode_aktivasi', 'status_aktivasi'];

    public $timestamps = true;
}
