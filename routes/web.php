<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\DeskripsiUsahaController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\PemilikUsahaController;
use App\Http\Controllers\PencairanDanaController;
use App\Http\Controllers\PendanaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProgresPendanaanController;
use App\Http\Controllers\ProyekPendanaanController;
use App\Models\Pembayaran;
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
Route::get('/admin/daftar-pembayaran', [PembayaranController::class, 'admin_daftar_pembayaran'])->middleware(['logineduser', 'admin']);
Route::get('/admin/daftar-pencairan', [PencairanDanaController::class, 'admin_daftar_pencairan'])->middleware(['logineduser', 'admin']);
Route::get('/admin/detail-pembayaran/{id_pembayaran}', [PembayaranController::class, 'admin_detail_pembayaran'])->middleware(['logineduser', 'admin']);

// PEMBAYARAN VIEW
Route::get('/pembayaran/detail/{id_pembayaran}', [PembayaranController::class, 'setujui_pembayaran'])->middleware(['logineduser']);

// PEMBAYARAN POST METHOD
Route::post('/pembayaran/tambah-bukti-pembayaran/{id_pembayaran}', [PembayaranController::class, 'setujui_pembayaran'])->middleware(['logineduser', 'pendana']);
Route::get('/admin/setujui-pembayaran/{id_pembayaran}', [PembayaranController::class, 'setujui_pembayaran'])->middleware(['logineduser', 'admin']);
Route::get('/admin/tolak-pembayaran/{id_pembayaran}', [PembayaranController::class, 'tolak_pembayaran'])->middleware(['logineduser', 'admin']);

// PENCAIRAN VIEW
Route::get('/pendanaan/pencairan/{id_proyek_pendanaan}', [PencairanDanaController::class, 'daftar_pencairan'])->middleware(['logineduser']);
Route::get('/pencairan/detail/{id_pencairan}', [PencairanDanaController::class, 'detail_pencairan'])->middleware(['logineduser']);
Route::get('/pencairan/ajukan/{id_proyek_pendanaan}', [PencairanDanaController::class, 'ajukan_pencairan'])->middleware(['logineduser', 'pengusaha']);
Route::get('/pencairan/edit/{id_pencairan}', [PencairanDanaController::class, 'edit_pencairan'])->middleware(['logineduser', 'pengusaha']);

// PENCAIRAN POST METHOD
Route::get('/admin/pencairan/hapus/{id_pencairan}', [PencairanDanaController::class, 'admin_hapus_pencairan'])->middleware(['logineduser', 'admin']);
Route::get('/admin/pencairan/setujui/{id_pencairan}', [PencairanDanaController::class, 'admin_setujui_pencairan'])->middleware(['logineduser', 'admin']);
Route::get('/admin/pencairan/tolak/{id_pencairan}', [PencairanDanaController::class, 'admin_tolak_pencairan'])->middleware(['logineduser', 'admin']);
Route::post('/pencairan/ajukan/{id_proyek_pendanaan}', [PencairanDanaController::class, 'ajukan_pencairan_post'])->middleware(['logineduser', 'pengusaha']);
Route::get('/pencairan/hapus/{id_pencairan}', [PencairanDanaController::class, 'hapus_pencairan'])->middleware(['logineduser', 'pengusaha']);


// PROGRES PENDANAAN VIEW
Route::get('/pendanaan/progres-pendanaan/{id_proyek_pendanaan}', [ProgresPendanaanController::class, 'daftar_progres_pendanaan'])->middleware(['logineduser']);
Route::get('/progres-pendanaan/detail/{id_progres_pendanaan}', [ProgresPendanaanController::class, 'detail_progres_pendanaaan'])->middleware(['logineduser']);
Route::get('/progres-pendanaan/tambah/{id_proyek_pendanaan}', [ProgresPendanaanController::class, 'tambah_progres_pendanaan'])->middleware(['logineduser']);
Route::get('/progres-pendanaan/edit/{id_progres_pendanaan}', [ProgresPendanaanController::class, 'edit_progres_pendanaan'])->middleware(['logineduser']);

// PROGRES PENDANAAN POST
Route::post('/progres-pendanaan/tambah/{id_proyek_pendanaan}', [ProgresPendanaanController::class, 'tambah_progres_pendanaan_post'])->middleware(['logineduser', 'pengusaha']);
Route::post('/progres-pendanaan/edit/{id_progres_pendanaan}', [ProgresPendanaanController::class, 'edit_progres_pendanaan_post'])->middleware(['logineduser', 'pengusaha']);
Route::get('/progres-pendanaan/hapus/{id_progres_pendanaan}', [ProgresPendanaanController::class, 'hapus_progres_pendanaan'])->middleware(['logineduser', 'pengusaha']);

// PENDANAAN VIEW
Route::get('/admin/pendanaan/', [ProyekPendanaanController::class, 'admin_daftar_pendanaan'])->middleware(['logineduser', 'admin']);
Route::get('/admin/pendanaan/detail/{id_proyek_pendanaan}', [ProyekPendanaanController::class, 'admin_detail_pendanaan'])->middleware(['logineduser', 'admin']);
Route::get('/pendanaan/detail/{id_proyek_pendanaan}', [ProyekPendanaanController::class, 'detail_pendanaan'])->middleware(['logineduser']);
Route::get('/pendanaan/tambah/{id_deskripsi_usaha}', [ProyekPendanaanController::class, 'tambah_pendanaan'])->middleware(['logineduser', 'pendana']);
Route::get('/pendanaan/{id_pengguna}', [ProyekPendanaanController::class, 'daftar_pendanaan'])->middleware(['logineduser']);

// RIWAYAT VIEW
Route::get('/admin/riwayat-pendanaan', [ProyekPendanaanController::class, 'admin_riwayat_pendanaan'])->middleware(['logineduser']);
Route::get('/riwayat-pendanaan/{id_pengguna}', [ProyekPendanaanController::class, 'riwayat_pendanaan'])->middleware(['logineduser']);
Route::get('/riwayat-pendanaan/detail/{id_pengguna}', [ProyekPendanaanController::class, 'detail_riwayat_pendanaan'])->middleware(['logineduser']);

// PENDANAAN ACTION
Route::post('/pendanaan/tambah-file-kontrak/admin/{id_proyek_pendanaan}', [ProyekPendanaanController::class, 'admin_tambah_file_kontrak_post'])->middleware(['logineduser', 'admin']);
Route::post('/pendanaan/ubah-status/{id_proyek_pendanaan}', [ProyekPendanaanController::class, 'admin_ubah_status'])->middleware(['logineduser', 'admin']);
Route::post('/pendanaan/tambah-file-kontrak/pengusaha/{id_proyek_pendanaan}', [ProyekPendanaanController::class, 'pengusaha_tambah_file_kontrak_post'])->middleware(['logineduser', 'pengusaha']);
Route::post('/pendanaan/tambah-file-kontrak/pendana/{id_proyek_pendanaan}', [ProyekPendanaanController::class, 'pendana_tambah_file_kontrak_post'])->middleware(['logineduser', 'pendana']);
Route::post('/pendanaan/tambah-bukti-pembayaran/{id_proyek_pendanaan}', [ProyekPendanaanController::class, 'tambah_bukti_pembayaran'])->middleware(['logineduser', 'pendana']);
Route::post('/pendanaan/tambah-bukti-bagi-hasil/{id_proyek_pendanaan}', [ProyekPendanaanController::class, 'tambah_bukti_bagi_hasil'])->middleware(['logineduser', 'pengusaha']);
Route::post('/pendanaan/tambah/{id_deskripsi_usaha}', [ProyekPendanaanController::class, 'tambah_pendanaan_post'])->middleware(['logineduser', 'pendana']);

// AUTH LOGIN REGISTER VIEW
Route::get('/login', [AuthenticationController::class, 'login'])->middleware('guest')->name('login.view');
Route::get('/register', [AuthenticationController::class, 'register'])->middleware('guest')->name('register.view');
Route::get('/logout', [AuthenticationController::class, 'logout'])->middleware('logineduser')->name('logout');

// AUTH LOGIN REGISTER POST
Route::post('/login', [AuthenticationController::class, 'login_post'])->middleware('guest')->name('login.post');
Route::post('/register', [AuthenticationController::class, 'register_post'])->middleware('guest')->name('register.post');
