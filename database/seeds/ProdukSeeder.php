<?php

use Illuminate\Database\Seeder;
use App\ProdukModel as Produk;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		Produk::truncate();
        $produk = [1, 1, 'Kambing Jawa Randu ', 150, 123, 144, 200, 12, "Sehat dan Kuat", 2500000, 'assets/produk/goat.png'];
        for ($i=0; $i <= 5 ; $i++) { 
        	Produk::create([
        		'id_kategory'=>1,
        		'id_user'=>$i,
        		'judul_produk'=>$produk[2].$i,
        		'tinggi_kambing'=>$produk[3],
        		'berat_kambing'=>$produk[4],
        		'lingkar_kambing'=>$produk[5],
        		'panjang_kambing'=>$produk[6],
        		'umur_kambing'=>$produk[7],
        		'deskripsi_kambing'=>$produk[8],
        		'harga_kambing'=>$produk[9],
        		'foto'=>$produk[10],
        		'stok'=>10
        	]);
        }
    }
}
