<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\ProyekPendanaan;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
  public function admin_daftar_pembayaran()
  {
    // $daftar_pembayaran = Pembayaran::with('proyekPendanaan');
    $proyek_pendanaan = ProyekPendanaan::with('deskripsiUsaha', 'Pembayaran', 'Pendana')->get();
    return view('admin.list-pembayaran')->with(array('proyek_pendanaan' => $proyek_pendanaan, ));
  }

  public function pendana_daftar_pembayaran($id_pendana)
  {
    $daftar_pembayaran = Pembayaran::whereIdProyekPendanaan($id_pendana);
    return view('admin.list-pembayaran')->with(array('daftar_pembayaran' => $daftar_pembayaran));
  }

  public function admin_detail_pembayaran($id_pembayaran)
  {
    $pembayaran = Pembayaran::whereIdPembayaran($id_pembayaran);
    return view('admin.list-pembayaran')->with(array('pembayaran' => $pembayaran));
  }

  public function detail_pembayaran($id_pembayaran)
  {
    $pembayaran = Pembayaran::whereIdPembayaran($id_pembayaran);
    return view('admin.list-pembayaran')->with(array('pembayaran' => $pembayaran));
  }

  // UPDATE METHOD
  public function setujui_pembayaran($id_pembayaran)
  {
    try {
      $pembayaran = Pembayaran::whereIdPembayaran($id_pembayaran)->update([
        'status_pembayaran' => true
      ]);
      session()->flash('pesan', 'Perubahan berhasil disimpan');
      return redirect('/admin/detail-pembayaran/' . $id_pembayaran);
    } catch (\Throwable $th) {
      throw $th;
    }
  }
}
