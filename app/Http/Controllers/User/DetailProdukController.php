<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\ProdukModel;
use App\GeneralSetting;
use App\Http\Controllers\Controller;

class DetailProdukController extends Controller
{
    
    public function index(Request $request){
        // dd($request->id);detailproduk
        
        $general = GeneralSetting::first();
        $detail = new ProdukModel;
        $serupa = ProdukModel::paginate(4);
        $produk = $detail->detailproduk($request->id)->select('tbl_produk.*', 'tbl_detailuser.nama_user')
        ->first();
    	return view('detail-produk', compact('produk', 'serupa', 'general'));
    }

}
