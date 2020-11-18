<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/percobaan', 'SuperController@penjual');

Route::get('/', function(){
	return redirect()->route('landingpage');
});

Route::get('/login', 'HomeController@index')->name('login');

Route::get('/auth/logout', 'HomeController@logout')->name('logout');

// prefix user
// [users.edit.index] 

Route::get('home/cart/checkout', 'User\CheckoutController@index')->name('cart.checkout');
Route::group(['prefix' => 'home', 'middleware'=>'destroy'], function () {
	Route::get('/', 'User\LandingController@index')->name('landingpage');
	Route::get('/produk/{all}/', 'User\ShopController@index')->name('shop.index');
	Route::post('/produk/range', 'User\ShopController@index')->name('shop.range');
	Route::get('/detail/{id}', 'User\DetailProdukController@index')->name('produk.detail');
	Route::post('/cart/add', 'User\CartController@add')->name('cart.add')->middleware('addcart');
	Route::post('/cart/submit', 'User\CartController@submit')->name('cart.submit')->middleware('addcart');
	Route::get('/cart', 'User\CartController@index')->name('cart.index')->middleware('addcart');
	Route::get('/pesanan', 'User\PesananController@index')->name('pesanan.index')->middleware('addcart');
	Route::get('/pesanan/detail/{id}', 'User\PesananController@detail')->name('pesanan.detail')->middleware('addcart');
	Route::post('/pembayaran/pesanan', 'User\PesananController@pembayaran')->name('pesanan.bayar.submit')->middleware('addcart');
	Route::post('/penitipan/store', 'User\CartController@penitipanCart')->name('penitipan.store')->middleware('addcart');
	Route::post('/cart/remove', 'User\CartController@remove')->name('cart.remove')->middleware('addcart');
	Route::get('/r', 'User\LandingController@index')->name('coustomerservice.index');
	Route::get('/c', 'User\LandingController@index')->name('user.edit');
	Route::get('/o', 'User\LandingController@index')->name('register');
});

Route::group(['prefix' => 'user'], function () {
	Route::get('/', 'AuthUser\LoginController@showloginform')->name('user.login');
	Route::post('/login', 'AuthUser\LoginController@login')->name('user.login.submit');
	Route::post('/logout', 'AuthUser\LoginController@logout')->name('user.logout.submit');
	Route::get('/register', 'AuthUser\RegisterController@index')->name('user.register');
	Route::post('/register', 'AuthUser\RegisterController@store')->name('user.register.submit');
	Route::get('/account', 'User\AccountController@index')->name('user.account.detail');
	Route::post('/account/perbarui', 'User\AccountController@update')->name('user.account.update.submit');
});

// prefix admin
Route::group(['prefix' => 'admin'], function () {;
	Route::get('/', 'HomeController@index')->name('home');
	Route::get('/dashboard', 'Dashboard@dashboard_view')->name('dashboard.home');
	Route::get('/login', 'AuthPenjual\LoginController@showLoginForm')->name('admin.login');
	Route::post('/login', 'AuthPenjual\LoginController@login')->name('admin.login.submit');

});

// prefix super
Route::group(['prefix' => 'admin/control_panel'], function () {
	
	// profile
	Route::get('/profile', 'ProfileController@index')->name('profile');
	Route::post('/profile/perbarui', 'ProfileController@update')->name('profile.update');
	
	Route::get('/login', 'AuthSuper\LoginController@showLoginForm')->name('super.login');
	Route::post('/login', 'AuthSuper\LoginController@login')->name('super.login.submit');

	Route::get('/', 'SuperController@index')->name('super.home');
	Route::get('/data_penjual', 'SuperController@penjual')->name('penjual.home');
	Route::post('/data_penjual/aktivasi', 'SuperController@aktifkan')->name('penjual.aktivasi');
	Route::post('/data_penjual/disaktivasi', 'SuperController@nonaktif')->name('penjual.nonaktif');
	Route::get('/data_pembeli', 'SuperController@pembeli')->name('pembeli.home');
	Route::get('/kategory', 'SuperController@kategory')->name('kategory.home');

	// kategory
	Route::post('/perbarui_kategory', 'SuperController@perbarui_kategory')->name('perbarui.kategory');
	Route::post('/hapus_kategory', 'SuperController@hapus_kategory')->name('hapus.kategory');
	Route::post('/tambah_kategory', 'SuperController@tambah_kategory')->name('tambah.kategory');
	Route::post('/data_kategory', 'SuperController@data_kategory')->name('ajax.data.kategory');

	// produk
	Route::get('/data_produk', 'SuperController@produk')->name('produk.home');
	Route::post('/tambah_produk', 'SuperController@tambah_produk')->name('tambah.produk');
	Route::post('/hapus_produk', 'SuperController@hapus_produk')->name('hapus.produk');
	Route::post('/perbarui_produk', 'SuperController@perbarui_produk')->name('perbarui.produk');
	Route::post('/data_produk', 'SuperController@data_produk')->name('ajax.data.produk');

	// Kandang
	Route::get('/data_kandang', 'KandangController@index')->name('kandang.home');
	Route::post('/data_kandang/simpan', 'KandangController@store')->name('kandang.add.submit');
	Route::post('/data_kandang/perbarui', 'KandangController@update')->name('kandang.update.submit');
	Route::post('/data_kandang/hapus', 'KandangController@delete')->name('kandang.delete.submit');

	// Kandang super
	Route::get('/data_kandang/super', 'KandangController@index')->name('kandang.home.super');

	// penitipan
	Route::get('/penitipan/sedang_berlangsung', 'User\PenitipanController@index')->name('penitipan.home');
	Route::get('/penitipan/riwayat', 'User\PenitipanController@riwayat')->name('penitipan.riwayat');
	Route::get('/penitipan/{status}/{id}', 'User\PenitipanController@detail')->name('penitipan.detail');

	//pesanan

	// Tracking
	Route::get('/order','TrackingController@index')->name('order');

	Route::post('/order/track','TrackingController@tracking')->name('order.tracking');

	Route::get('/order/detail/{id}','TrackingController@detail')->name('order.detail');

	Route::post('/data_pesanan/biaya_pengiriman/{id_order}', 'SuperController@biaya_pengiriman')->name('pesanan.biaya.pengiriman');
	Route::get('/data_pesanan/menunggu_pembayaran', 'SuperController@pesanan_tungguPembayaran')->name('pesanan.home');
	Route::get('/data_pesanan/sudah_dibayar', 'SuperController@pesanan_sudahDibayar')->name('pesanan.dibayar');
	Route::get('/data_pesanan/persiapan_pengiriman', 'SuperController@pesanan_persiapanPengiriman')->name('pesanan.persiapanpengiriman');
	Route::get('/data_pesanan/pengiriman', 'SuperController@pesanan_pengiriman')->name('pesanan.pengiriman');
	Route::get('/batal_pesanan', 'SuperController@pesanan_pembatalan')->name('batal.pesanan.home');
	Route::post('/hapus_pesanan', 'SuperController@hapus_pesanan')->name('hapus.pesanan');
	Route::post('/perbarui_pesanan/{status}', 'SuperController@perbarui_pesanan')->name('perbarui.pesanan'); 
	Route::post('/data_pesanan', 'SuperController@data_pesanan')->name('ajax.data.pesanan');
	Route::post('/cairkan/{id_order}/{id_list_order}', 'SuperController@pencairan_pesanan')->name('pencairan.pesanan.penjual');

	Route::get('/transaksi/batal', 'SuperController@transaksi_batal')->name('transaksi.batal');
	Route::get('/transaksi/menunggu_pencairan', 'SuperController@transaksi_menunggu_pencairan')->name('transaksi.menunggu.cair');

	Route::get('/transaksi/cairkan/{id_order}', 'SuperController@cairkan')->name('transaksi.cair');

	Route::get('/transaksi/dicairkan', 'SuperController@sudah_cair')->name('transaksi.sudah.cair');
	// keluhan

	Route::post('/keluhan/post', 'KeluhanController@kirim')->name('keluhan.kirim');

	Route::get('/keluhan', 'KeluhanController@index')->name('keluhan.home');
	
	Route::get('/keluhan/list', 'KeluhanController@list')->name('keluhan.list');

	Route::get('/keluhan/{id_user}', 'KeluhanController@superchat')->name('keluhan.super');
});

// CRUD
Route::post('/tambah_user', 'SuperController@tambah_user')->name('tambah.user');
Route::post('/detail_user', 'AjaxController@detail_user')->name('ajax.detail.user');
Route::post('/perbarui_user', 'SuperController@perbarui_user')->name('perbarui.user');
Route::post('/hapus_user', 'SuperController@hapus_user')->name('hapus.user');

