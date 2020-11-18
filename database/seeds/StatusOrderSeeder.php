<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusOrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tbl_status_order')->truncate();
        $status = ['Menunggu Pembayaran', 'Batal', 'Sudah Dibayar', 'Persiapan Pengiriman', 'Pengiriman', 'Pencairan', 'Selesai', 'Dititipkan' ];
        for($i = 0; $i<=6; $i++){
            DB::table('tbl_status_order')
            ->insert(['nama_status'=>$status[$i]]);
        }
    }
}
