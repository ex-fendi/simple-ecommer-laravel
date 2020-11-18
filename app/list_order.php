<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class list_order extends Model
{
    protected $table = 'tbl_list_order';
    protected $fillable = ['id_order', 'jumlah', 'id_produk', 'cair'];

    public $timestamps = false;

    public function tracking(){
        return $this->hasMany(Tracking::class,'id_listorder');
    }

    public function produk(){
        return $this->belongsTo(ProdukModel::class, 'id_produk');
    }
}
