<?php

use Illuminate\Database\Seeder;
use App\OrderModel as Order;

class OrderData extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Order::truncate();
       $id_user  = [1, 2];
       $id_order = ['1950129101', '2929102120'];
       $telp = ['085747767270', '085777777777'];

       for ($i=0; $i < 2 ; $i++) { 
           Order::create([
                'id_order'=>$id_order[$i],
                'id_user'=>$id_user[$i],
                'telp'=>$telp[$i],
                'nama_pembeli'=>'Jajang nur jaman',
                'provinsi'=>'Jawa Tengah',
                'kecamatan'=>'Karanglewas',
                'kabupaten'=>'Banyumas',
                'alamat_pembeli'=>'rt4 rw5',
                'kode_pos'=>'53161',
                'pembayaran'=>'rekening',
                'bukti_pembayaran'=>'-',
                'status'=>'1',
                'batalkan'=>'n',
                'alasan'=>'-'
            ]);
       }

    }
}
