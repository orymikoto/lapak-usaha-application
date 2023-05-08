<?php

namespace App\Http\Controllers;

use App\Models\PemilikUsaha;
use App\Models\Pendana;
use App\Models\ProyekPendanaan;
use Illuminate\Http\Request;

class ProyekPendanaanController extends Controller
{
  // ADMIN METHOD
  public function admin_daftar_pendanaan()
  {
    return view();
  }

  public function admin_detail_pendanaan($id_proyek_pendanaan)
  {
    $proyek_pendanaan = ProyekPendanaan::whereIdProyekPendanaan($id_proyek_pendanaan)->first();
    return view();
  }

  public function admin_tambah_file_kontrak_post(Request $request, $id_proyek_pendanaan)
  {
    return redirect();
  }

  // VIEW METHOD
  public function daftar_pendanaan($id_pengguna)
  {
    if (auth('pendana')->check()) {
      $pendanaan_pendana = Pendana::where('id_pendana', $id_pengguna)->proyekPendanaan;
      return view();
    } elseif (auth('pengusaha')->check()) {
      $pendanaan_pengusaha = PemilikUsaha::where('id_pemilik_usaha', $id_pengguna)->proyekPendanaan;
      return view();
    } else {
      return view();
    }
  }

  public function detail_pendanaan($id_proyek_pendanaan)
  {
    $proyek_pendanaan = ProyekPendanaan::whereIdProyekPendanaan($id_proyek_pendanaan)->first();
    return view();
  }

  public function tambah_pendanaan($id_proyek_pendanaan)
  {
    return view();
  }

  // ACTION METHOD
  public function pengusaha_tambah_file_kontrak_post($id_proyek_pendanaan)
  {
    return redirect();
  }

  public function pendana_tambah_file_kontrak_post($id_proyek_pendanaan)
  {
    return redirect();
  }

  public function tambah_pendanaan_post(Request $request)
  {
    return redirect();
  }

  public function index()
  {
  }
}
