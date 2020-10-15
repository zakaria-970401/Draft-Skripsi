<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/adminlogin', 'Auth\AdminAuthController@getLogin')->name('admin.login');
Route::post('/adminlogin', 'Auth\AdminAuthController@postLogin')->name('admin.login.submit');

Route::get('/admin', 'AdminController@index')->name('admin.home')->middleware('auth:admin');
Route::get('/siswa', 'SiswaController@index')->name('siswa.home')->middleware('auth');

Route::get('/home', 'HomeController@index')->name('home');



Route::GET('/adminlogout', 'Auth\AdminAuthController@adminlogout')->middleware('auth:admin');
Route::GET('/walaslogout', 'Auth\WalasAuthController@walaslogout')->middleware('auth:teacher');
Route::GET('/logout', 'Auth\LoginController@logout');

// MODULE IMPORT EXCEL //
Route::post('/admin/import_akunsiswa', 'AdminController@import_akunsiswa');
Route::post('/admin/import_datasiswa', 'AdminController@import_datasiswa');
Route::post('/admin/insert_data_training', 'AdminController@insert_data_training');


// MODULE AKUN SISWA //
Route::get('/admin/akunsiswa', 'AdminController@get_insert_akunsiswa');
Route::POST('/admin/insert_akunsiswa', 'AdminController@post_insert_akunsiswa');
Route::get('/admin/edit_akunsiswa/{id}', 'AdminController@get_edit_akunsiswa');
Route::PATCH('/admin/update_akunsiswa/{id}', 'AdminController@post_edit_akunsiswa');
Route::get('/admin/hapus_akunsiswa/{id}', 'AdminController@hapus_akunsiswa');

// MODULE PROFILE ADMIN //
Route::get('/admin/profile/{id}', 'AdminController@get_profileadmin');
Route::POST('/admin/profile/{id}', 'AdminController@post_edit_akunadmin');


// MODULE AKUN ADMIN //
Route::get('/admin/akunadmin', 'AdminController@get_akunadmin');
Route::post('/admin/post_akunadmin', 'AdminController@post_akunadmin');
Route::get('/admin/get_edit_akunadmin/{id}', 'AdminController@get_edit_akunadmin');
Route::patch('/admin/update_akunadmin/{id}', 'AdminController@post_edit_akunadmin');
Route::get('/admin/hapus_akunadmin/{id}', 'AdminController@hapus_akunadmin');


// MODULE DATA KRITERIA //
Route::get('/admin/data_kriteria', 'AdminController@data_kriteria');
Route::get('/admin/edit_kriteria/{id}', 'AdminController@get_edit_datakriteria');
Route::PATCH('/admin/edit_kriteria/{id}', 'AdminController@post_edit_datakriteria');
Route::get('/admin/hapus_datakriteria/{id}', 'AdminController@hapus_datakriteria');
Route::post('/admin/tambah_datakriteria', 'AdminController@tambah_datakriteria');

// MODULE DATA TRAINING //
Route::get('/admin/data_training', 'AdminController@data_training');
Route::get('/admin/edit_datatraining/{id}', 'AdminController@get_edit_data_training');
Route::patch('/admin/update_data_training/{id}', 'AdminController@update_data_training');
Route::get('/admin/hapus_data_training/{id}', 'AdminController@hapus_data_training');
//** HAPUS DATA TRAINING ALL **/
Route::get('/admin/hapus_data_training/', 'AdminController@hapus_data_training_all');

// MODULE DATA BANSOS SISWA //
Route::GET('/siswa/detail_databansos/{id}', 'SiswaController@detail_databansos');
Route::GET('/siswa/print_databansos/{id}', 'SiswaController@print_databansos');

/// MODULE DATA SET SISWA ////
Route::get('/admin/dataset_siswa', 'AdminController@get_dataset_siswa');
Route::GET('/admin/detail_datatraining/{id}', 'AdminController@detail_dataset_siswa');
Route::PATCH('/admin/update_dataset_siswa/{id}', 'AdminController@update_dataset_siswa');
Route::patch('/admin/tolak_dataset_siswa/{id}', 'AdminController@tolak_dataset_siswa');
Route::get('/admin/hapus_dataset_siswa/{id}', 'AdminController@hapus_dataset_siswa');
Route::POST('/admin/proses_dataset_siswa/{id}', 'NaiveBaiyesController@hitung_dataset_siswa')->middleware('auth:admin');
Route::POST('/admin/simpan_dataset_siswa', 'NaiveBaiyesController@post_hitung_dataset_siswa')->middleware('auth:admin');

Route::POST('/admin/simpan_to_datatraining', 'AdminController@simpan_to_datatraining');



/// MODULE DATA SISWA ///
Route::get('/admin/data_siswa', 'AdminController@getdata_siswa');
Route::POST('/admin/insertsiswa', 'AdminController@insert_datasiswa');
Route::GET('/admin/hapus_datasiswa/{id}', 'AdminController@hapus_datasiswa');
Route::GET('/admin/edit_datasiswa/{id}', 'AdminController@get_edit_datasiswa');
Route::PATCH('/admin/update_datasiswa/{id}', 'AdminController@post_edit_datasiswa');

// MODUL DATA KELAS //
Route::get('/siswa/daftar_kelas', 'SiswaController@data_kelas');
Route::get('/siswa/detail_kelas/{id}', 'SiswaController@detail_kelas');

// MODUL DATA WALI KELAS //
Route::get('/admin/daftar_walas', 'AdminController@data_walas');
Route::POST('/admin/post_walas', 'AdminController@post_data_walas');
Route::PATCH('/admin/edit_walas/{id}', 'AdminController@edit_walas');
Route::get('/admin/edit_walas/{id}', 'AdminController@get_edit_data_walas');
Route::GET('/admin/hapus_datawalas/{id}', 'AdminController@hapus_datawalas');


// MODULE ANALISA DATA //
Route::get('/admin/analisa_databansos', 'GrafikController@analisa_databansos');
Route::post('/admin/cari_penerimaan_tahun', 'GrafikController@post_analisa_databansos');
Route::get('/admin/status_kelengkapan_ortu', 'GrafikController@status_kelengkapan_ortu');
Route::post('/admin/cari_statusortu_tahun', 'GrafikController@post_status_kelengkapan_ortu');
Route::get('/admin/status_pekerjaan_ortu', 'GrafikController@status_pekerjaan_ortu');
Route::post('/admin/cari_pekerjaanortu_tahun', 'GrafikController@post_status_pekerjaan_ortu');

//MODULE NAIK KELAS //
Route::get('/admin/naik_kelas', 'AdminController@naik_kelas');
Route::post('/admin/naik_kelas', 'AdminController@post_naik_kelas');

//MODULE DATA KELAS //
Route::get('/admin/daftar_kelas', 'AdminController@data_kelas');
Route::get('/admin/detail_kelas/{id}', 'AdminController@detail_kelas');
Route::POST('/admin/tambah_datakelas', 'AdminController@tambah_datakelas');
Route::PATCH('/admin/update_datakelas/{id}', 'AdminController@update_datakelas');
Route::GET('/admin/hapus_kelas/{id}', 'AdminController@hapus_datakelas');


/// MODULE DAFTAR BANSOS SISWA ///
Route::get('/siswa/daftar_bansos', 'SiswaController@getdaftarbansos');
Route::POST('/siswa/daftar_bansos', 'SiswaController@postdaftarbansos');

/// MODULE RUANGAN KELAS ///
Route::get('/siswa/data_siswa', 'SiswaController@data_siswa');
Route::get('/siswa/hasil_bansos', 'SiswaController@hasil_bansos');

/// MODULE PROFILE SISWA ///
Route::get('/siswa/profile', 'SiswaController@profile');
Route::patch('/siswa/update_profilesiswa/{id}', 'SiswaController@update_profilesiswa');
Route::get('/siswa/profile', 'SiswaController@profile');


// *** ROUTE WALIKELAS **//
Route::GET('/walaslogout', 'Auth\WalasAuthController@walaslogout')->middleware('auth:teacher');
Route::get('/walaslogin', 'Auth\WalasAuthController@getLogin')->name('walas.login');
Route::post('/walaslogin', 'Auth\WalasAuthController@postLogin')->name('walas.login.submit');
Route::get('/walas', 'WalasController@index')->name('walas.home')->middleware('auth:teacher');
// MODULE VERIFIKASI BANSOS ANAK DIDIK //
Route::get('/walas/bansos_anakdidik', 'WalasController@verifikasi_databansos');
Route::GET('/walas/detail_databansos/{id}', 'WalasController@detail_dataset_siswa');
Route::PATCH('/walas/update_dataset_siswa/{id}', 'WalasController@update_dataset_siswa');
Route::patch('/walas/tolak_dataset_siswa/{id}', 'WalasController@tolak_dataset_siswa');
Route::get('/walas/hapus_dataset_siswa/{id}', 'WalasController@hapus_dataset_siswa');
Route::POST('/walas/proses_dataset_siswa/{id}', 'WalasController@hitung_bansos_anakdidik')->middleware('auth:teacher');
Route::POST('/walas/simpan_dataset_siswa', 'WalasController@post_hitung_bansos_anakdidik')->middleware('auth:teacher');
// MODULE HASIL VERIFIKASI //
Route::get('/walas/get_hasil_dataverifikasi', 'WalasController@get_hasil_dataverifikasi');
Route::get('/walas/show_hitung_hasil_datatraining/{id}', 'WalasController@show_hitung_hasil_datatraining');
//MODULE PROFILE WALI KELAS //
Route::get('/walas/profile/{id}', 'WalasController@get_profilewalas');
Route::patch('/walas/update_akunwalas/{id}', 'WalasController@post_edit_akunwalas');


// MODULE PEERHITUNGAN NAIVE BAIYES //
Route::POST('/admin/hitung_data_training', 'NaiveBaiyesController@index');
Route::get('/admin/get_hitung_hasil_datatraining', 'NaiveBaiyesController@get_hitung_hasil_datatraining');
Route::get('/admin/show_hitung_hasil_datatraining/{id}', 'NaiveBaiyesController@show_hitung_hasil_datatraining');
Route::POST('/admin/post_hitung_hasil_datatraining', 'NaiveBaiyesController@post_hitung_hasil_datatraining');
