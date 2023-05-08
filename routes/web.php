<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\DeskripsiUsahaController;
use App\Http\Controllers\PemilikUsahaController;
use App\Http\Controllers\PendanaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProyekPendanaanController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
  return view('welcome');
});

// PROFILE VIEW
Route::get('/profile', [ProfileController::class, 'profile'])->middleware('logineduser')->name('profile.view');

// PROFILE POST
Route::post('/profile/edit', [ProfileController::class, 'profile_post'])->middleware('logineduser')->name('profile.post');

// DESKRIPSI USAHA VIEW
Route::get('/daftar-usaha/tambah', [DeskripsiUsahaController::class, 'tambah_usaha'])->middleware(['logineduser', 'pengusaha']);
Route::get('/admin/daftar-usaha', [DeskripsiUsahaController::class, 'admin_daftar_usaha'])->middleware(['logineduser', 'admin']);
Route::get('/daftar-usaha/pendana', [DeskripsiUsahaController::class, 'pendana_daftar_usaha'])->middleware(['logineduser',]);
Route::get('/daftar-usaha/view/{id_deskripsi_usaha}', [DeskripsiUsahaController::class, 'lihat_detail_usaha'])->middleware(['logineduser']);
Route::get('/daftar-usaha/edit/{id_deskripsi_usaha}', [DeskripsiUsahaController::class, 'edit_detail_usaha'])->middleware(['logineduser', 'pengusaha']);
Route::get('/daftar-usaha/{id_pemilik_usaha}', [DeskripsiUsahaController::class, 'pengusaha_daftar_usaha'])->middleware(['logineduser',]);

// DESKRIPSI USAHA POST
Route::post('/daftar-usaha/tambah/{id_pemilik_usaha}', [DeskripsiUsahaController::class, 'tambah_usaha_post'])->middleware(['logineduser', 'pengusaha']);
Route::post('/daftar-usaha/edit/{id_deskripsi_usaha}', [DeskripsiUsahaController::class, 'edit_usaha_post'])->middleware(['logineduser', 'pengusaha']);
Route::get('/daftar-usaha/hapus/{id_deskripsi_usaha}', [DeskripsiUsahaController::class, 'hapus_usaha_post'])->middleware(['logineduser', 'pengusaha']);
Route::get('/daftar-usaha/konfirmasi/{id_deskripsi_usaha}', [DeskripsiUsahaController::class, 'konfirmasi_usaha_post'])->middleware(['logineduser', 'admin']);
Route::get('/daftar-usaha/tidak-konfirmasi/{id_deskripsi_usaha}', [DeskripsiUsahaController::class, 'tidak_konfirmasi_usaha_post'])->middleware(['logineduser', 'admin']);

// ADMIN VIEW
Route::get('/admin/daftar-pendana', [PendanaController::class, 'admin_daftar_pendana'])->middleware(['logineduser', 'admin']);
Route::get('/admin/daftar-pengusaha', [PemilikUsahaController::class, 'admin_daftar_pemilik_usaha'])->middleware(['logineduser', 'admin']);

// PENDANAAN VIEW
Route::get('/admin/pendanaan/', [ProyekPendanaanController::class, 'admin_daftar_pendanaan'])->middleware(['logineduser', 'admin']);
Route::get('/admin/pendanaan/{id_proyek_pendanaan}', [ProyekPendanaanController::class, 'admin_detail_pendanaan'])->middleware(['logineduser', 'admin']);
Route::get('/pendanaan/detail/{id_proyek_pendanaan}', [ProyekPendanaanController::class, 'detail_pendanaan'])->middleware(['logineduser']);
Route::get('/pendanaan/tambah', [ProyekPendanaanController::class, 'tambah_pendanaan'])->middleware(['logineduser', 'pendana']);
Route::get('/pendanaan/{id_pengguna}', [ProyekPendanaanController::class, 'daftar_pendanaan'])->middleware(['logineduser']);

// PENDANAAN ACTION
Route::post('/admin/pendanaan/tambah-file-kontrak/{id_proyek_pendanaan}', [ProyekPendanaanController::class, 'admin_tambah_file_kontrak_post'])->middleware(['logineduser', 'admin']);
Route::post('/pendanaan/tambah-file-kontrak/pengusaha/{id_proyek_pendanaan}', [ProyekPendanaanController::class, 'pengusaha_tambah_file_kontrak_post'])->middleware(['logineduser', 'pengusaha']);
Route::post('/pendanaan/tambah-file-kontrak/pendana/{id_proyek_pendanaan}', [ProyekPendanaanController::class, 'pendana_tambah_file_kontrak_post'])->middleware(['logineduser', 'pendana']);
Route::post('/pendanaan/tambah', [ProyekPendanaanController::class, 'tambah_pendanaan_post'])->middleware(['logineduser', 'pendana']);

// AUTH LOGIN REGISTER VIEW
Route::get('/login', [AuthenticationController::class, 'login'])->middleware('guest')->name('login.view');
Route::get('/register', [AuthenticationController::class, 'register'])->middleware('guest')->name('register.view');
Route::get('/logout', [AuthenticationController::class, 'logout'])->middleware('logineduser')->name('logout');

// AUTH LOGIN REGISTER POST
Route::post('/login', [AuthenticationController::class, 'login_post'])->middleware('guest')->name('login.post');
Route::post('/register', [AuthenticationController::class, 'register_post'])->middleware('guest')->name('register.post');
