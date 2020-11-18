<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use App\Http\Requests\PenjualFromRequest;
use App\DetailUserModel as DetailUser;
use App\AktivasiModel as Aktivasi;
use App\ProdukModel as Produk;
use Illuminate\Http\Request;
use App\OrderModel as Order;
use App\User as User;
use App\GeneralSetting;
use App\list_order;
use App\Penitipan;
use App\Kandang;
use App\Menu;
use Session;

class SuperController extends Controller
{

	public $menu;
	public $childCount;
    public $child;
	public $generalsetting;

    public function __construct(Menu $menu ){
        $this->middleware('super');
        // dd(Session::get('status')); 
        $this->generalsetting = GeneralSetting::first();
        $this->menu = $menu->getmenu('y', Session::get('status'));
        $this->childCount = $menu->getChild('n', Session::get('status'))->count()-1;
        $this->child = $menu->getChild('n', Session::get('status')); 
            
    }

    public function index(){
        $general = $this->generalsetting;
        return view('home', compact('general'));
    }


    public function penjual(){
        $penjual = new DetailUser;
    	$menu = $this->menu;
        $child = $this->child;
        $childCount = $this->childCount;
        $general = $this->generalsetting;
        $this->ses = Session::get('status');
        $penjual_teraktivasi = $penjual->detailUser('s', 2);
        $penjual_belumAktivasi = $penjual->detailUser('b', 2);
        // return view

        return view('penjual.penjual	', compact('menu', 'general' ,'childCount','child', 'penjual_teraktivasi', 'penjual_belumAktivasi'));
    }

    public function pembeli(){
        $pembeli = new DetailUser;
        $menu = $this->menu;
        $child = $this->child;
        $childCount = $this->childCount;
        $general = $this->generalsetting;
        $pembeli_teraktivasi = $pembeli->detailUser('s', 1);
        $pembeli_nonverivikasi = $pembeli->detailUser('b', 1);

        return view('pembeli.pembeli', compact('menu', 'general' ,'childCount','child', 'pembeli_teraktivasi', 'pembeli_nonverivikasi'));
    }

     public function produk(){
        $kt = new Produk;
        $menu = $this->menu;
        $child = $this->child;
        $general = $this->generalsetting;
        $childCount = $this->childCount;
        if(Session::get('status') == 'admin'){
            $kandang = Kandang::where('id_user', Session::get('id_log'))->get();
            $produk = Produk::where('id_user', Session::get('id_log'))->with('kandang', 'detailuser')->get();
        }
        else{
            $kandang = Kandang::where('is_deleted', 'n')->get();
            $produk = Produk::all();
        }
        $kategory  = $kt->getData_kategory();
        // return view
        return view('produk.produk', compact('menu', 'general','childCount','child', 'produk', 'kategory', 'kandang'));
    }

    public function tambah_produk(Request $request){
        try{
            $target_dir = "assets/produk/"; //set direktori
            $target_file = $target_dir . $_FILES["foto"]["name"]; //target dir dan nama
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION)); //tipe
            if (move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file)) { //upload
                $url = $target_file;
            } 
            $tambah = Produk::create([
                'id_kategory'=>$request->kategory,
                'id_user'=>Session::get('id_log'),
                'id_kandang'=>$request->kandang,
                'judul_produk'=>$request->nama,
                'tinggi_kambing'=>$request->tinggi,
                'berat_kambing'=>$request->berat,
                'lingkar_kambing'=>$request->lingkar,
                'panjang_kambing'=>$request->panjang,
                'umur_kambing'=>$request->umur,
                'deskripsi_kambing'=>$request->deskripsi,
                'harga_kambing'=>$request->harga,
                'foto'=>$url,
                'stok'=>intval($request->stok)
            ]);
            Session::put('flash', 'Barang Berhasil Disimpan');
            return back();
        }
        catch(\Exception $e){
            echo $e;
        }
    }

    public function perbarui_produk(Request $request){
        try{
            $target_dir = "assets/produk/"; //set direktori
            $target_file = $target_dir . $_FILES["foto"]["name"]; //target dir dan nama
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION)); //tipe
            if (move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file)) { //upload
                $url = $target_file;
            } 
            $tambah = Produk::where('id', $request->id)->update([
                'id_kategory'=>$request->kategory,
                'judul_produk'=>$request->nama,
                'tinggi_kambing'=>$request->tinggi,
                'berat_kambing'=>$request->berat,
                'lingkar_kambing'=>$request->lingkar,
                'panjang_kambing'=>$request->panjang,
                'umur_kambing'=>$request->umur,
                'deskripsi_kambing'=>$request->deskripsi,
                'harga_kambing'=>$request->harga,
                'foto'=>$url,
                'stok'=>$request->stok
            ]);
            
            Session::put('flash', 'Data Berhasil di Perbarui');
            return back();
        }
        catch(\Exception $e){
            echo $e;
        }

    }

    public function hapus_produk(Request $request){
        try{
            Produk::where('id', $request->id)->delete();
            Session::put('flash', 'Data Berhasil di hapus');
            return back();
        }
        catch(\Exception $e){
            echo "error";
        }
    }

    public function data_produk(Request $request){
        $kt = new Produk;
            $data = Produk::where('id', $request->id)->get();
            $kategory  = $kt-> getData_kategory();
            $tampil = '';
            foreach ($kategory as $k) {
                if($k->id_kategory == $data[0]->id_kategory){
                    $tampil .= '<option class="sub" selected="" value="'.$k->id_kategory.'">
                            '.$k->nama_kategory.'
                           </option>';
                }
                else{
                $tampil .= '<option class="sub" value="'.$k->id_kategory.'">
                            '.$k->nama_kategory.'
                           </option>';
                       }
            }
            $kirim = [$data, $tampil];
            return $kirim;
    }

    public function pesanan_tungguPembayaran(){
        $psn = new Order;
        $kt = new Produk;
        $menu = $this->menu;
        $child = $this->child;
        $general = $this->generalsetting;
        $childCount = $this->childCount;
        if(Session::get('status') == 'super'){
            $order = $psn->pesanan(1);
        }
        else{
            $order = $psn->getpesananPenjual(1);
        }
        $kategory  = $kt-> getData_kategory();
        $status = 'nunggupembayaran';
        $header = 'Menunggu Pembayaran';
        return view('pesanan.pesanan', compact('menu', 'general' ,'childCount','child', 'produk', 'kategory', 'order' , 'status', 'header'));
    }

    public function pesanan_sudahDibayar(){
        $psn = new Order;
        $kt = new Produk;
        $menu = $this->menu;
        $child = $this->child;
        $general = $this->generalsetting;
        $childCount = $this->childCount;
        if(Session::get('status') == 'super'){
        $order = $psn->pesanan(3);
        }
        else{
            $order = $psn->getpesananPenjual(3);
        }
        $header = "Sudah Dibayarkan";
        $kategory  = $kt-> getData_kategory();
        $status = 'dibayar';
        return view('pesanan.pesanan', compact('menu','general' ,'childCount','child', 'produk', 'kategory', 'order', 'status', 'header'));
    }

    public function pesanan_persiapanPengiriman(){
        $psn = new Order;
        $kt = new Produk;
        $menu = $this->menu;
        $child = $this->child;
        $general = $this->generalsetting;
        $childCount = $this->childCount;
        if(Session::get('status') == 'super'){
        $order = $psn->pesanan(4);
        }
        else{
            $order = $psn->getpesananPenjual(4);
        }

        // dd($order); 
        $header = "Persiapan Pengiriman";
        $kategory  = $kt-> getData_kategory();
        $status = 'persiapanpengiriman';
        return view('pesanan.pesanan', compact('menu', 'general' ,'childCount','child', 'produk', 'kategory', 'order', 'status', 'header'));
    }

    public function biaya_pengiriman(Request $request){
        Order::where('id_order', $request->id_order)->update([
            'shiping'=>$request->shipping,
        ]);
        return back()->with('success', 'Biaya Pengiriman Berhasil Disimpan');
    }

    public function pesanan_pengiriman(){
        $psn = new Order;
        $kt = new Produk;
        $menu = $this->menu;
        $child = $this->child;
        $general = $this->generalsetting;
        $childCount = $this->childCount;
        if(Session::get('status')=='super'){
            $order = $psn->pesanan(5);
        }
        else{
            $order = $psn->getpesananPenjual(5);
        }
        $kategory  = $kt-> getData_kategory();
        $status = 'pengiriman';
        $header = 'Pengiriman';
        
        return view('pesanan.pesanan', compact('menu', 'general' ,'childCount','child', 'produk', 'kategory', 'order', 'status','header'));
    }

     public function pesanan_pembatalan(){
        $psn = new Order;
        $kt = new Produk;
        $menu = $this->menu;
        $child = $this->child;
        $childCount = $this->childCount;
        $general = $this->generalsetting;
        $order = $psn->pesanan(2, 6, 7);
        if(Session::get('status')=='super'){
            $order = $psn->pesanan(5);
        }
        else{
            $order = $psn->getpesananPenjual(5);
        }
        $kategory  = $kt-> getData_kategory();
        $status = 'pembatalan';
        $header = 'Pembatalan Pesanan';
        return view('pesanan.pesanan', compact('menu', 'general' ,'childCount','child', 'produk', 'kategory', 'order', 'status', 'header'));
    }

    public function perbarui_pesanan(Request $request){
        try{
            if($request->status == 3){
                $check = Order::where('id_order', $request->id_order)->first();
                if($check->status == 3 && $check->status_penitipan ==  'n' ){
                    $hasil = Order::where('id_order', $request->id_order)->update([
                        'status'=>'4'
                    ]);
                }
                
                else if($check->status == 3 && $check->status_penitipan == 'y'){
                    $hasil = Order::where('id_order', $request->id_order)->update([
                        'status'=>'8'
                    ]);
                }

                else if($check->status == 8 ){
                    $hasil = Order::where('id_order', $request->id_order)->update([
                        'status'=>'4'
                    ]);
                    Penitipan::where('id_order', $request->id_order)->update([
                        'is_fisnish' => 'y'
                    ]);
                }
              
               return back();
            }
            elseif($request->status == 4){
                $hasil = Order::where('id_order', $request->id_order)->update([
                    'status'=>'5'
                ]);
               return back();
            }
            elseif($request->status == 5){
                $hasil = Order::where('id_order', $request->id_order)->update([
                    'status'=>'6'
                ]);
               return back();
            }
            elseif($request->status == 6){
                $hasil = Order::where('id_order', $request->id_order)->update([
                    'status'=>'7'
                ]);
               return back()->with('success', 'Berhasil diproses');
            }
        }
        catch(\Exception $e){
            return back()->with('error', 'Gagal dirubah');
        }
    }

    public function transaksi_batal(){
        $psn = new Order;
        $kt = new Produk;
        $menu = $this->menu;
        $child = $this->child;
        $childCount = $this->childCount;
        $general = $this->generalsetting;
        $order = $psn->getpesananPenjual(2);
        $kategory  = $kt-> getData_kategory();
        $status = 'transaksi';
        $batal = 'batal';
        $header = 'Transaksi Batal';
        // dd($order);
        // return view
        return view('pesanan.pesanan', compact('menu', 'general' ,'childCount','child', 'produk', 'kategory', 'order', 'status', 'header'));
    }

    public function transaksi_menunggu_pencairan(){
        $psn = new Order;
        $kt = new Produk;
        $menu = $this->menu;
        $child = $this->child;
        $childCount = $this->childCount;
        $general = $this->generalsetting;
        if(Session::get('status')=='super'){
            $order = $psn->pesanan(6);
        }
        else{
            $order = $psn->getpesananPenjual(6);
        }
        $kategory  = $kt-> getData_kategory();
        $status = 'menunggu_pencairan';
        $header = 'Menunggu Pencairan';

        // dd($order);
        // return view
        return view('pesanan.pesanan', compact('menu', 'general' ,'childCount','child', 'produk', 'kategory', 'order', 'status', 'header'));
    }

    public function sudah_cair(){
        $psn = new Order;
        $kt = new Produk;
        $menu = $this->menu;
        $child = $this->child;
        $general = $this->generalsetting;
        $childCount = $this->childCount;
        if(Session::get('status')=='super'){
            $order = $psn->pesanan(7);
        }
        else{
            $order = $psn->getpesananPenjual(7);
        }
        $kategory  = $kt-> getData_kategory();
        $status = 'cair';
        $header = 'Transaksi Selesai';
        // dd($order);
        // return view
        return view('pesanan.pesanan', compact('menu', 'general' ,'childCount','child', 'produk', 'kategory', 'order', 'status', 'header'));
    }


    public function cairkan(Request $request){
        $psn = new Order;
        $kt = new Produk;
        $menu = $this->menu;
        $child = $this->child;
        $general = $this->generalsetting;
        $childCount = $this->childCount;
        $order = $psn->detailPencairanOrder($request->id_order);
        // dd($hasil);
        $kategory  = $kt-> getData_kategory();
        $status = 'cair';
        // dd($order);
        // return view
        return view('pesanan.pencairan', compact('menu','general' ,'childCount','child', 'produk', 'kategory', 'order', 'status'));
    }

    public function data_pesanan(Request $request){
        $ps = new Order;
        $hasil = $ps->detailOrder($request->id_order);
        $i = 1;
        $tampil = '';
        $harga_total = 0;
        foreach ($hasil as $hs) {

            $id_pembeli = Produk::where('id', $hs->id_produk)->where('id_user', Session::get('id_log'))->pluck('id_user')->first();
            $id_pembeli = $id_pembeli;

            $class = ' ';
             if($id_pembeli == Session::get('id_log')){
                $class = 'bg-primary text-white';
             }

            $harga_sementara = $hs->harga_kambing * intval($hs->jumlah);
            $harga_total += $harga_sementara; 
            

            $tampil .= '<tr class="'.$class.'"><td class="sub text-center">'. $i++ .'</td>
                        <td class="sub text-center">'. $hs->telp .'</td>
                        <td class="sub">'. $hs->judul_produk .'</td>
                        <td class="sub text-center">'. $hs->jumlah .'</td>
                        <td class="sub">'. $harga_sementara .'</td></tr>';

        }
        $subtotal  = $harga_total;
        $harga_total += $hasil[0]->shiping;

        $kirim = [$hasil, $subtotal, $tampil, $harga_total];
        return $kirim;
        
    }

    public function pencairan_pesanan(Request $request){
        try{
            list_order::where('no', $request->id_list_order)->update([
                'cair'=>'sudah',
            ]);
            $hitung = list_order::where('id_order', $request->id_order)->where('cair', 'belum')->get()->count();
            if($hitung < 1){
                Order::where('id_order', $request->id_order)->update([
                    'status'=>'7',
                ]);
            }
            return back();
        }
        catch(\Exception $e){
            return back()->with('error', 'Gagal Diperbarui!');
        }

    }

    public function hapus_pesanan(Request $request){
        try{
            Order::where('id_order', $request->id_order)->update([
                'batalkan'=>'y',
                'alasan'=>$request->alasan,
                'status'=>'2'
            ]);
            // session
            return back();
        }
        catch(\Exception $e){

        }
    }

    public function kategory(){
        $kategories = new Produk;
        $menu = $this->menu;
        $child = $this->child;
        $childCount = $this->childCount;
        $general = $this->generalsetting;
        $kategory = $kategories->getData_kategory();
        // return view
        return view('produk.kategory', compact('menu', 'general' ,'childCount','child', 'kategory'));
    }

    public function data_kategory(Request $request){
        $kategory = Db::table('tbl_kategory')->where('id_kategory', $request->id)->get();
        return $kategory;
    }

    public function tambah_kategory(Request $request){
        $kategory = Db::table('tbl_kategory')->insert([
                'nama_kategory'=>$request->nama
            ]);
        Session::flash('sukses','Data Berhasil di Simpan');
        return back();
    }

    public function perbarui_kategory(Request $request){
        $kategory = Db::table('tbl_kategory')->where('id_kategory', $request->id)->update([
                'nama_kategory'=>$request->nama
            ]);
        Session::flash('sukses','Data Berhasil di Perbarui');
        return back();
    }

    public function hapus_kategory(Request $request){
        $kategory = Db::table('tbl_kategory')->where('id_kategory', $request->id)->delete();
        Session::flash('sukses','Data Berhasil di Hapus');
        return back();
    }

    public function tambah_user(PenjualFromRequest $request){
        $tambah_user = DetailUser::create(['nama_user'=>$request->nama, 'alamat_user'=>$request->alamat, 'nohp_user'=>$request->nohp_user,'email_user'=>$request->email_user, 'is_deleted'=>'n'
        ]);
        if($tambah_user){
            $id_user = $this->getIdUser($request->nohp_user);
            $user = User::create(['id_user'=> $id_user, 'username'=>$request->username, 'password'=>bcrypt($request->password), 'level'=>$request->level ]);
            if($user){
                $kode = $this->getAktivasiKode();
                $aktivasi = aktivasi::create(['id_user'=>$id_user, 'kode_aktivasi'=>$kode, 'status_aktivasi'=>'b']);

            }
        }
        return back();
    }

    public function perbarui_user(Request $request){
        $tambah_user = DetailUser::where('id_user', $request->id)->update(['nama_user'=>$request->nama, 'alamat_user'=>$request->alamat, 'nohp_user'=>$request->nohp_user,'email_user'=>$request->email_user
        ]);

        return back();
    }

    public function hapus_user(Request $request){
        $tambah_user = DetailUser::where('id_user', $request->id)->update([
                'is_deleted'=>'y'
        ]);
        return back();
    }

    public function getIdUser($no_hp){
        $id_user = DetailUser::where('nohp_user', $no_hp)->pluck('id_user')->last();
        return $id_user;
    }

    public function aktifkan(Request $request){
        Aktivasi::where('id_user', $request->id)->update([
            'status_aktivasi'=>'s'
        ]);
        return back()->with('success', $request->nama. ' Berhasil Diaktifkan');

    }

    public function nonaktif(Request $request){
        Aktivasi::where('id_user', $request->id)->update([
            'status_aktivasi'=>'b'
        ]);
        return back()->with('success', $request->nama. ' Berhasil Diaktifkan');

    }

    public function getAktivasiKode($length = 5){
       $flag = false;
       $pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
       do{
       $kode = substr(str_shuffle(str_repeat($pool, 5)), 0, $length);
       $check = Aktivasi::where('kode_aktivasi', $kode)->get()->count();
           if($check < 1){
                return $kode;
              }
        }while($flag = false);
       
    }
}
