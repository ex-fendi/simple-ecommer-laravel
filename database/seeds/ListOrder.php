<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ListOrder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('tbl_list_order')->truncate();
        $id_order = ['1950129101', '2929102120'];
    	$id_produk = ['1','2'];
    	for ($i=0; $i < 2 ; $i++) { 
    			DB::table('tbl_list_order')->insert(['id_order'=>$id_order[$i], 'id_produk'=>$id_produk[$i], 'jumlah'=>'2']);
    		}	
    }
}
