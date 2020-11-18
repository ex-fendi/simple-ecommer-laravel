<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\ProdukModel;
use App\GeneralSetting;
use App\Http\Controllers\Controller;

class LandingController extends Controller
{
    public function index(){
        $general = GeneralSetting::first();
        $produk = ProdukModel::orderBy('id', 'desc')->paginate(4);
        return view('landing-page', compact('produk', 'general'));
    }

}
