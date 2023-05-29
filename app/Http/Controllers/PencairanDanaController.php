<?php

namespace App\Http\Controllers;

use App\Models\PencairanDana;
use App\Models\ProyekPendanaan;
use Illuminate\Http\Request;

class PencairanDanaController extends Controller
{
  public function admin_daftar_pencairan()
  {
    $pencairan = PencairanDana::all();
    return view('admin.list-pencairan')->with(array('pencairan' => $pencairan));
  }
  // VIEW METHOD
  public function daftar_pencairan($id_proyek_pendanaan)
  {
    $pencairan = PencairanDana::whereIdProyekPendanaan($id_proyek_pendanaan)->with('proyekPendanaan')->get();
    return view('pencairan.daftar-pencairan')->with(array('pencairan' => $pencairan));
  }

  public function ajukan_pencairan($id_proyek_pendanaan)
  {
    $pendanaan = ProyekPendanaan::whereIdProyekPendanaan($id_proyek_pendanaan)->first();
    return view('pencairan.tambah-pencairan')->with(array('pendanaan' => $pendanaan)) ;
  }

  // POST METHOD

  public function admin_setujui_pencairan($id_pencairan)
  {
    try {
      //code...
      $pencairan = PencairanDana::whereIdPencairanDana($id_pencairan)->first();
      $proyek_pendanaan = ProyekPendanaan::whereIdProyekPendanaan($pencairan->id_pencairan_dana)->first();
      // dd($proyek_pendanaan->jumlah_dana - $pencairan->nominal_pencairan);
      if ($proyek_pendanaan->jumlah_dana > $pencairan->nominal_pencairan) {
        # code...
        PencairanDana::whereIdPencairanDana($id_pencairan)->update([
          'status_pencairan' => true
        ]);
        ProyekPendanaan::whereIdProyekPendanaan($pencairan->id_pencairan_dana)->update([
          'jumlah_dana' => $proyek_pendanaan->jumlah_dana - $pencairan->nominal_pencairan
        ]);

        session()->flash('pesan', 'Perubahan berhasil disimpan');
        return redirect('/admin/daftar-pencairan');
      }
      session()->flash('pesan', 'Perubahan gagal dilakukan, jumlah dana tidak mencukupi');
      return redirect('/admin/daftar-pencairan');
    } catch (\Throwable $th) {
      dd( $th);
    }
  }

  public function admin_tolak_pencairan($id_pencairan)
  {
    try {
      //code...
      $pencairan = PencairanDana::whereIdPencairanDana($id_pencairan)->first();
      $proyek_pendanaan = ProyekPendanaan::whereIdProyekPendanaan($pencairan->id_pencairan_dana)->first();
      PencairanDana::whereIdPencairanDana($id_pencairan)->update([
        'status_pencairan' => false
      ]);
      ProyekPendanaan::whereIdProyekPendanaan($pencairan->id_pencairan_dana)->update([
        'jumlah_dana' => $proyek_pendanaan->jumlah_dana + $pencairan->nominal_pencairan
      ]);

      session()->flash('pesan', 'Perubahan berhasil disimpan');
      return redirect('/admin/daftar-pencairan');
    } catch (\Throwable $th) {
      throw $th;
    }
  }

  public function hapus_pencairan($id_pencairan)
  {
    try {
      $pencairan = PencairanDana::whereIdPencairanDana($id_pencairan)->first();
      if ($pencairan->status_pencairan == true) {
        session()->flash('pesan', 'Penghapusan gagal karena pencairan telah disetujui');
        return redirect("/pendanaan/pencairan/" . $pencairan->id_proyek_pendanaan);
      }
      PencairanDana::whereIdProgresPendanaan($id_pencairan)->delete();

      session()->flash('pesan', 'Data berhasil dihapus');
      return redirect("/pendanaan/pencairan/" . $pencairan->id_proyek_pendanaan);
    } catch (\Throwable $th) {
      throw $th;
    }
  }

  public function admin_hapus_pencairan($id_pencairan)
  {
    try {
      $pencairan = PencairanDana::whereIdPencairanDana($id_pencairan)->first();
      PencairanDana::whereIdPencairanDana($id_pencairan)->delete();

      session()->flash('pesan', 'Data berhasil dihapus');
      return redirect("/admin/daftar-pencairan/" . $pencairan->id_proyek_pendanaan);
    } catch (\Throwable $th) {
      throw $th;
    }
  }

  public function ajukan_pencairan_post(Request $request, $id_proyek_pendanaan)
  {
    try {

      $pencairan = PencairanDana::create([
        'tanggal_pencairan_dana' => date('Y-m-d'),
        'nominal_pencairan' => $request->nominal_pencairan,
        'id_proyek_pendanaan' => $id_proyek_pendanaan
      ]);

      session()->flash('pesan', 'Data berhasil disimpan');
      return redirect('/pendanaan/pencairan/' . $id_proyek_pendanaan);
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

      $progres_pendanaan = PencairanDana::whereIdProgresPendanaan($id_progres_pendanaan)->first();

      $update_progres_pendanaan = PencairanDana::whereIdProgresPendanaan($id_progres_pendanaan)->update([
        'keterangan' => $request->keterangan,
        'laporan_keuangan' => !empty($file) ? (string)$path_file_laporan_keuangan : $progres_pendanaan->laporan_keuangan,
      ]);

      session()->flash('pesan', 'Perubahan berhasil disimpan');
      return redirect("/progres-pendanaan/detail/" . $id_progres_pendanaan);
    } catch (\Throwable $th) {
      throw $th;
    }
  }
}
