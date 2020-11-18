<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DetailUserModel as Detail;
use App\User as User;
use Session;


class AjaxController extends Controller
{
    public function detail_user(Request $request){
    	$detail = Detail::where('id_user', $request->id)->get();
    	return $detail;
    }
}
