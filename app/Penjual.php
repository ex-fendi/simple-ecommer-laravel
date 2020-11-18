<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penjual extends Model
{
    protected $table = 'tbl_produk';
    protected $fillable = ['id_kategory', 'id_user' ,'judul_produk','tinggi_kambing', 'berat_kambing', 'lingkar_kambing', 'panjang_kambing', 'umur_kambing', 'deskripsi_kambing', 'harga_kambing', 'foto'];

    public $timestamps = true;
}
