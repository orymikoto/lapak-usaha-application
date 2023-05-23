<?php

namespace App\Http\Controllers;

use App\Models\DeskripsiUsaha;
use App\Models\JenisUsaha;
use App\Models\Pembayaran;
use App\Models\ProyekPendanaan;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\This;

class ProyekPendanaanController extends Controller
{
  // UPLOAD FUNCTION
  private function upload_file_kontrak_admin($file)
  {
    $filename = uniqid('file_kontrak_admin_');
    $filetype = $file->extension();
    $destinationPath = 'upload/file_kontrak_admin';
    $file->storeAs('upload/file_kontrak_admin/', $filename . '.' . $filetype, 'public');

    return '/storage/upload/file_kontrak_admin/' . $filename . '.' . $filetype;
  }

  private function upload_file_kontrak_pendana($file)
  {
    $filename = uniqid('file_kontrak_pendana_');
    $filetype = $file->extension();
    $destinationPath = 'upload/file_kontrak_pendana';
    $file->storeAs('upload/file_kontrak_pendana/', $filename . '.' . $filetype, 'public');

    return '/storage/upload/file_kontrak_pendana/' . $filename . '.' . $filetype;
  }

  private function upload_file_kontrak_pengusaha($file)
  {
    $filename = uniqid('file_kontrak_pengusaha_');
    $filetype = $file->extension();
    $file->storeAs('upload/file_kontrak_pengusaha/', $filename . '.' . $filetype, 'public');

    return '/storage/upload/file_kontrak_pengusaha/' . $filename . '.' . $filetype;
  }

  private function upload_file_bukti_pembayaran($file)
  {
    $filename = uniqid('bukti_pembayaran_');
    $filetype = $file->extension();
    $file->storeAs('upload/bukti_pembayaran/', $filename . '.' . $filetype, 'public');

    return '/storage/upload/bukti_pembayaran/' . $filename . '.' . $filetype;
  }

  private function upload_file_bukti_bagi_hasil($file)
  {
    $filename = uniqid('bukti_bagi_hasil_');
    $filetype = $file->extension();
    $file->storeAs('upload/bukti_bagi_hasil/', $filename . '.' . $filetype, 'public');

    return '/storage/upload/bukti_bagi_hasil/' . $filename . '.' . $filetype;
  }

  // ADMIN METHOD
  public function admin_daftar_pendanaan()
  {
    $daftarPendanaan = ProyekPendanaan::with('deskripsiUsaha', 'Pendana', 'pemilikUsaha', 'statusPendanaan')->get();
    return view('admin.admin-daftar-pendanaan')->with(array(
      'daftarPendanaan' => $daftarPendanaan
    ));
  }

  public function admin_detail_pendanaan($id_proyek_pendanaan)
  {
    $proyek_pendanaan = ProyekPendanaan::whereIdProyekPendanaan($id_proyek_pendanaan)->first();
    return view();
  }

  public function admin_tambah_file_kontrak_post(Request $request, $id_proyek_pendanaan)
  {
    try {
      $file_kontrak = $request->file('file_kontrak');
      $path_file_kontrak = $this->upload_file_kontrak_admin($file_kontrak);
      $proyek_pendanaan = ProyekPendanaan::whereIdProyekPendanaan($id_proyek_pendanaan)->update([
        'file_kontrak_admin' => $path_file_kontrak
      ]);

      session()->flash('success', 'File kontrak admin berhasil ditambahkan');
      return redirect("/pendanaan/detail/" . $id_proyek_pendanaan);
    } catch (\Throwable $th) {
      dd($th);
    }
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
      $pendanaan_pengusaha = ProyekPendanaan::whereIdPemilikUsaha($id_pengguna)->with('deskripsiUsaha', 'Pendana', 'pemilikUsaha', 'statusPendanaan')->get();
      return view('proyek_pendanaan.daftar-pendanaan')->with(array('daftarPendanaan' => $pendanaan_pengusaha));
    } else {
      return view('proyek_pendanaan.daftar-pendanaan');
    }
  }

  public function detail_pendanaan($id_proyek_pendanaan)
  {
    $proyek_pendanaan = ProyekPendanaan::whereIdProyekPendanaan($id_proyek_pendanaan)->with('deskripsiUsaha', 'Pendana', 'pemilikUsaha', 'statusPendanaan', 'progresPendanaan', 'Pembayaran')->first();
    $jenis_usaha = JenisUsaha::whereIdJenisUsaha($proyek_pendanaan->deskripsiUsaha->id_jenis_usaha)->first();
    return view('proyek_pendanaan.detail-pendanaan')->with(array('detailPendanaan' => $proyek_pendanaan, 'jenisUsaha' => $jenis_usaha));
  }

  public function tambah_pendanaan($id_deskripsi_usaha)
  {
    $deskripsiUsaha = DeskripsiUsaha::whereIdDeskripsiUsaha($id_deskripsi_usaha)->with('pemilikUsaha', 'jenisUsaha')->first();
    // dd($deskripsiUsaha->pemilikUsaha);
    return view('proyek_pendanaan.tambah-pendanaan')->with(array(
      'deskripsi_usaha' => $deskripsiUsaha
    ));
  }

  // ACTION METHOD
  public function pengusaha_tambah_file_kontrak_post(Request $request, $id_proyek_pendanaan)
  {
    try {
      $file_kontrak = $request->file('file_kontrak');
      $path_file_kontrak = $this->upload_file_kontrak_pengusaha($file_kontrak);
      $proyek_pendanaan = ProyekPendanaan::whereIdProyekPendanaan($id_proyek_pendanaan)->update([
        'file_kontrak_pengusaha' => $path_file_kontrak
      ]);

      session()->flash('success', 'File kontrak pengusaha berhasil ditambahkan');
      return redirect("/pendanaan/detail/" . $id_proyek_pendanaan);
    } catch (\Throwable $th) {
      dd($th);
    }
  }

  public function pendana_tambah_file_kontrak_post(Request $request, $id_proyek_pendanaan)
  {
    try {
      $file_kontrak = $request->file('file_kontrak');
      $path_file_kontrak = $this->upload_file_kontrak_pendana($file_kontrak);
      $proyek_pendanaan = ProyekPendanaan::whereIdProyekPendanaan($id_proyek_pendanaan)->update([
        'file_kontrak_pendana' => $path_file_kontrak
      ]);

      session()->flash('success', 'File kontrak pendana berhasil ditambahkan');
      return redirect("/pendanaan/detail/" . $id_proyek_pendanaan);
    } catch (\Throwable $th) {
      dd($th);
    }
  }

  public function tambah_pendanaan_post(Request $request, $id_deskripsi_usaha)
  {
    try {
      $deskripsi_usaha = DeskripsiUsaha::whereIdDeskripsiUsaha($id_deskripsi_usaha)->with('pemilikUsaha')->first();
      $new_proyek = ProyekPendanaan::create([
        'jumlah_dana' => (int) $request['jumlah_dana'],
        'id_deskripsi_usaha' => (int) $id_deskripsi_usaha,
        'id_pemilik_usaha' => (int) $deskripsi_usaha->pemilikUsaha->id_pemilik_usaha,
        'id_pendana' => (int) auth('pendana')->user()->id_pendana,
        'id_status_pendanaan' => 1,
      ]);
      Pembayaran::create([
        'id_proyek_pendanaan' => $new_proyek->id_proyek_pendanaan
      ]);

      session()->flash('success', 'Pendanaan berhasil ditambahkan');
      return redirect("/pendanaan/tambah/{$id_deskripsi_usaha}");
    } catch (\Throwable $th) {
      throw $th;
    }
  }

  public function tambah_bukti_pembayaran($id_proyek_pendanaan, Request $request)
  {
    try {
      $file_kontrak = $request->file('file_bukti_pembayaran');
      $path_file_kontrak = $this->upload_file_bukti_pembayaran($file_kontrak);
      $proyek_pendanaan = Pembayaran::whereIdProyekPendanaan($id_proyek_pendanaan)->update([
        'bukti_pembayaran' => $path_file_kontrak
      ]);

      session()->flash('success', 'Bukti Pembayaran Berhasil ditambahkan');
      return redirect("/pendanaan/detail/" . $id_proyek_pendanaan);
    } catch (\Throwable $th) {
      throw $th;
    }
  }

  public function tambah_bukti_bagi_hasil($id_proyek_pendanaan, Request $request)
  {
    try {
      $file_kontrak = $request->file('file_bukti_bagi_hasil');
      $path_file_kontrak = $this->upload_file_bukti_bagi_hasil($file_kontrak);
      $proyek_pendanaan = ProyekPendanaan::whereIdProyekPendanaan($id_proyek_pendanaan)->update([
        'bukti_bagi_hasil' => $path_file_kontrak
      ]);

      session()->flash('success', 'Bukti Pembayaran Berhasil ditambahkan');
      return redirect("/pendanaan/detail/" . $id_proyek_pendanaan);
    } catch (\Throwable $th) {
      throw $th;
    }
  }

  public function index()
  {
  }
}
