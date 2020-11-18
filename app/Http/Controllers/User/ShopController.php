<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ProdukModel;
use App\GeneralSetting;
use Illuminate\Support\Facades\DB;

class ShopController extends Controller
{
    
    public function index(Request $request){

        $general = GeneralSetting::first();
        $kategory = DB::table('tbl_kategory')->get();
        $produk = ProdukModel::orderBy('id', 'desc')->paginate(15);
        if(!(empty($request->all != 'all'))){
            $produk = ProdukModel::where('id_kategory', $request->all)->orderBy('id', 'desc')->paginate(15);
        } 
        
        if(!(empty($request->batasan_harga))){
            $produk = ProdukModel::whereBetween('harga_kambing', array(1000000, $request->batasan_harga))->orderBy('id_produk', 'desc')->paginate(15);
        }

        return view('shop', compact('produk', 'kategory', 'general'));
    }

}
