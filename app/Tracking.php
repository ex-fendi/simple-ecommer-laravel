<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tracking extends Model
{
    protected $fillable = ['id_listorder', 'tracking'];

    public $timestamps = true;

    public function list_order(){
        return $this->belongsTo(list_order::class, 'id_listorder');
    }
}
