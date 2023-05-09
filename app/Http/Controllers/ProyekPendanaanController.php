<?php

namespace App\Http\Controllers;

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
      $pendanaan_pendana = ProyekPendanaan::whereIdPendana($id_pengguna)->with('deskripsiUsaha', 'Pendana', 'pemilikUsaha', 'statusPendanaan')->get();
      // dd($pendanaan_pendana);
      // dd($pendanaan_pendana->proyekPendanaan->join('deskripsi_usaha', 'deskripsi_usaha.id_deskripsi_usaha', '=', 'proyek_pendanaan.id_deskripsi_usaha'));
      return view('proyek_pendanaan.daftar-pendanaan')->with(array(
        'daftarPendanaan' => $pendanaan_pendana
      ));
    } elseif (auth('pengusaha')->check()) {
      $pendanaan_pengusaha = ProyekPendanaan::whereIdPemilikUsaha($id_pengguna)->with('deskripsiUsaha', 'Pendana', 'pemilikUsaha', 'statusPendanaan');
      return view('proyek_pendanaan.daftar-pendanaan')->with(array('daftarPendanaan' => $pendanaan_pengusaha));
    } else {
      return view('proyek_pendanaan.daftar-pendanaan');
    }
  }

  public function detail_pendanaan($id_proyek_pendanaan)
  {
    $proyek_pendanaan = ProyekPendanaan::whereIdProyekPendanaan($id_proyek_pendanaan);
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
