<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menu;
use App\Kandang;
use App\ProdukModel;
use App\OrderModel;
use App\GeneralSetting;
use Session;
use Carbon\Carbon;

class Dashboard extends Controller
{

	public $menu;
	public $childCount;
	public $child;

	public function __construct(menu $Menu){
        // dd(Session::get('status')); 
        $menu = new Menu;
        $this->menu = $menu->getmenu('y', Session::get('status'));
        $this->childCount = $menu->getChild('n', Session::get('status'))->count()-1;
        $this->child = $menu->getChild('n', Session::get('status')); 
            
	}

    public function index(){
    }

    public function dashboard_view(menu $menu){
    	$menu = $this->menu;
        $child = $this->child;
        $childCount = $this->childCount;
        $psn = new OrderModel;
        $year = Carbon::now();
        $general = GeneralSetting::first();
        if(Session::get('status') == 'admin'){
            $total_kambing = ProdukModel::where('id_user', Session::get('id_log'))->where('is_deleted', 'n')->get()->count();
            $total_order = $psn->getpesananPenjual(7);
            $total_kandang = Kandang::where('id_user', Session::get('id_log'))->where('is_deleted', 'n')->get()->count();
            $sedang_berlangsung = $psn->tracking(5);
        }
        else{
            $order = $psn->pesanan(7);
            $total_kambing = ProdukModel::where('is_deleted', 'n')->get()->count();
            $total_order = $psn->getpesananPenjual(7);
            $total_kandang = Kandang::where('is_deleted', 'n')->get()->count();
            $sedang_berlangsung = $psn->pesanan(5);
        }
    	return view('dashboard.dashboard', compact('menu', 'general','childCount','child', 'total_kambing', 'total_kandang', 'total_order', 'sedang_berlangsung'));
    }
}
