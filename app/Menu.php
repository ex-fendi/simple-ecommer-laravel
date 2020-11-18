<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = 'menu';
    protected $fillable = ['id_menu', 'nama_menu','is_header','induk','nama_controller', 'urutan','level_admin'];

    public $timestamps = false;

    public function getmenu($is_header, $level){
        if($level == 'admin'){
    	   $data = $this->where('is_header', $is_header)->where('level_admin', '4')->orderby('urutan', 'asc')->get();
        }
        else{
            $data = $this->where('is_header', $is_header)->orderby('urutan', 'asc')->get();
        }

    	return $data;
    }
    public function getChild($is_header, $level){
        if($level == 'admin'){
    	$data = $this->where('is_header', $is_header)->where('level_admin', '4')->orWhere('level_admin', '2')->orderby('urutan', 'asc')->get();
        }
        else{
            $data = $this->where('is_header', $is_header)->where('level_admin', '3')->orWhere('level_admin', '4')->orderby('urutan', 'asc')->get();
        }
    	return $data;
    }
   
}
