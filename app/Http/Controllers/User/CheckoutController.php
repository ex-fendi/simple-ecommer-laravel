<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Kandang;
use App\GeneralSetting;
use Session;
use Cart;

class CheckoutController extends Controller
{

    public function index(){   
        $kandang = new Kandang;
        $general = GeneralSetting::first();
        $kandang = $kandang->kandang()->where('kandangs.is_deleted', 'n')->where('kandangs.is_full', 'n')
                ->select('tbl_detailuser.nama_user', 'kandangs.*')->get();
        return view('checkout', compact('kandang', 'general'));
    }

}
