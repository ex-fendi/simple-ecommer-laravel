<?php

use Illuminate\Database\Seeder;
use App\ProdukModel;

class kategoryData extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProdukModel::truncate();
        $kategory = new ProdukModel;
		$jenis = ['Dewasa', 'Remaja', 'Bocah'];        
		for ($i=0; $i < 3 ; $i++) { 
			$kategory->tambah_kategory($jenis[$i]);
		}
    }
}
