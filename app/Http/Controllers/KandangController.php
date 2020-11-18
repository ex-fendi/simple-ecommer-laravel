<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kandang;
use App\Menu;
use App\Http\Requests\KandangFormRequest;
use Session;
use App\GeneralSetting;

class KandangController extends Controller
{

    public $menu;
	public $childCount;
    public $child;
    public $general;

    public function __construct(Menu $menu ){
        $this->middleware('super');
        // dd(Session::get('status')); 
        $this->general = GeneralSetting::first();
        $this->menu = $menu->getmenu('y', Session::get('status'));
        $this->childCount = $menu->getChild('n', Session::get('status'))->count()-1;
        $this->child = $menu->getChild('n', Session::get('status')); 
            
    }

    public function index(){
        $menu = $this->menu;
        $child = $this->child;
        $general = $this->general;
        $childCount = $this->childCount;
        if(Session::get('status') == 'admin'){
            $kandang = Kandang::where('id_user', Session::get('id_log'))->where('is_deleted', 'n')->get();
        }
        if(Session::get('status')=='super'){
            $kandang = new Kandang;
            $kandang = $kandang->kandang()->select('kandangs.*', 'tbl_detailuser.nama_user')
            ->where('kandangs.is_deleted', 'n')->get();
        }
        // $kategory  = $kt-> getData_kategory();
        // return view
        return view('kandang.kandang', compact('menu', 'general' ,'childCount','child', 'kandang'));
    }

    public function store(KandangFormRequest $request){
        try{
            $target_dir = "assets/kandang/"; //set direktori
            $target_file = $target_dir . $_FILES["foto"]["name"]; //target dir dan nama
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION)); //tipe
            if (move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file)) { //upload
                $url = $target_file;
            } 

            $tambah = Kandang::create([
                            'id_user'=>Session::get('id_log'),
                            'foto'=>$url,
                            'fasilitas'=>$request->fasilitas,
                            'lokasi'=>$request->lokasi,
                            'harga'=>$request->harga,
                            'luas'=>$request->luas,
                            'max'=>$request->maksimal
            ]);
            Session::put('flash', 'Kandang Berhasil Ditambahkan');
            return back();
        }
        catch(\Exception $e){
            echo $e;
        }
    }

    public function update(Request $request){
        $update = Kandang::where('id', $request->id)->update([
            'id_user'=>Session::get('id_log'),
            'fasilitas'=>$request->fasilitas,
            'harga'=>$request->harga,
            'luas'=>$request->luas,
            'max'=>$request->maksimal
        ]);
        Session::put('flash', 'Kandang Berhasil Diperbarui');
        return back();
    }

    public function delete(Request $request){
        Kandang::where('id', $request->id)->update([
            'is_deleted'=>'y'
        ]);
        Session::put('flash', 'Kandang Berhasil Dihapus');
        return back();
    }

}

