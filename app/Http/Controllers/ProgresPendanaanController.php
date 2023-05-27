<?php

namespace App\Http\Controllers;

use App\Models\ProgresPendanaan;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ProgresPendanaanController extends Controller
{
  // VIEW METHOD
  public function daftar_progres_pendanaan($id_proyek_pendanaan)
  {
    $progres_pendanaan = ProgresPendanaan::whereIdProyekPendanaan($id_proyek_pendanaan)->with('proyekPendanaan')->get();
    return view('progres_pendanaan.daftar-progres-pendanaan')->with(array('progres_pendanaan' => $progres_pendanaan));
  }

  public function detail_progres_pendanaan($id_progres_pendanaan)
  {
    $progres_pendanaan = ProgresPendanaan::whereIdProgresPendanaan($id_progres_pendanaan)->with('proyekPendanaan')->get();
    return view('progres_pendanaan.daftar-progres-pendanaan')->with(array('progres_pendanaan' => $progres_pendanaan));
  }

  public function tambah_progres_pendanaan($id_proyek_pendanaan)
  {
    return view('progres_pendanaan.tambah-progres-pendanaan');
  }

  public function edit_progres_pendanaan($id_progres_pendanaan)
  {
    $progres_pendanaan = ProgresPendanaan::whereIdProgresPendanaan($id_progres_pendanaan)->with('proyekPendanaan')->first();
    return view('progres_pendanaan.edit-progres-pendanaan')->with(array('progres_pendanaan' => $progres_pendanaan));
  }

  // UPLOAD FILE LAPORAN KEUANGAN
  public function upload_file($file)
  {
    $filename = uniqid('laporan_keuangan_');
    $filetype = $file->extension();
    $file->storeAs('upload/laporan_keuangan/', $filename . '.' . $filetype, 'public');

    return '/storage/upload/laporan_keuangan/' . $filename . '.' . $filetype;
  }

  // POST METHOD
  public function tambah_progres_pendanaan_post(Request $request, $id_proyek_pendanaan)
  {
    try {
      $file_laporan_keuangan = $request->file('laporan_keuangan');
      // dd(date('Y-m-d'));
      $path_file_laporan_keuangan = $this->upload_file($file_laporan_keuangan);

      $progres_pendanaan = ProgresPendanaan::create([
        'tanggal_laporan_progres_pendanaan' => date('Y-m-d'),
        'keterangan' => $request->keterangan,
        'laporan_keuangan' => $path_file_laporan_keuangan,
        'id_proyek_pendanaan' => $id_proyek_pendanaan
      ]);

      session()->flash('pesan', 'Data berhasil disimpan');
      return redirect('/pendanaan/progres-pendanaan/' . $id_proyek_pendanaan);
    } catch (\Throwable $th) {
      throw $th;
    }
  }
  public function edit_progres_pendanaan_post(Request $request, $id_progres_pendanaan)
  {
    try {
      $file = $request->file('laporan_keuangan');
      if (!empty($file)) {
        $path_file_laporan_keuangan = $this->upload_file($file);
      }

      $progres_pendanaan = ProgresPendanaan::whereIdProgresPendanaan($id_progres_pendanaan)->first();

      $update_progres_pendanaan = ProgresPendanaan::whereIdProgresPendanaan($id_progres_pendanaan)->update([
        'keterangan' => $request->keterangan,
        'laporan_keuangan' => !empty($file) ? (string)$path_file_laporan_keuangan : $progres_pendanaan->laporan_keuangan,
      ]);

      session()->flash('pesan', 'Perubahan berhasil disimpan');
      return redirect("/progres-pendanaan/detail/" . $id_progres_pendanaan);
    } catch (\Throwable $th) {
      throw $th;
    }
  }
  public function hapus_progres_pendanaan($id_progres_pendanaan)
  {
    try {
      $progres_pendanaan = ProgresPendanaan::whereIdProgresPendanaan($id_progres_pendanaan)->first();
      ProgresPendanaan::whereIdProgresPendanaan($id_progres_pendanaan)->delete();

      session()->flash('pesan', 'Data berhasil dihapus');
      return redirect("/pendanaan/progres-pendanaan/" . $progres_pendanaan->id_proyek_pendanaan);
    } catch (\Throwable $th) {
      throw $th;
    }
  }
}
