<?php

namespace App\Http\Controllers;

use App\Models\DeskripsiUsaha;
use App\Models\JenisUsaha;
use Illuminate\Http\Request;

class DeskripsiUsahaController extends Controller
{
  // GET REQUEST
  public function admin_daftar_usaha()
  {
    $daftar_usaha = DeskripsiUsaha::join('jenis_usaha', 'jenis_usaha.id_jenis_usaha', '=', 'deskripsi_usaha.id_jenis_usaha')
      ->join('status_pengajuan', 'status_pengajuan.id_status_pengajuan', '=', 'deskripsi_usaha.id_status_pengajuan')
      ->join('pemilik_usaha', 'pemilik_usaha.id_pemilik_usaha', '=', 'deskripsi_usaha.id_pemilik_usaha')->orderBy('id_deskripsi_usaha')
      ->get();
    return view('usaha.daftar-usaha-admin')->with(array(
      'daftar_usaha' => $daftar_usaha
    ));
  }

  public function pendana_daftar_usaha()
  {
    $daftar_usaha_terkonfirmasi = DeskripsiUsaha::where('id_status_pengajuan', '2')
      ->join('jenis_usaha', 'jenis_usaha.id_jenis_usaha', '=', 'deskripsi_usaha.id_jenis_usaha')
      ->get();
    return view('usaha.daftar-usaha-pendana')->with(array(
      'daftar_usaha_terkonfirmasi' => $daftar_usaha_terkonfirmasi
    ));
  }

  public function pengusaha_daftar_usaha($id_pemilik_usaha)
  {
    $daftar_usaha_user = DeskripsiUsaha::where('id_pemilik_usaha', $id_pemilik_usaha)
      ->join('jenis_usaha', 'jenis_usaha.id_jenis_usaha', '=', 'deskripsi_usaha.id_jenis_usaha')
      ->join('status_pengajuan', 'status_pengajuan.id_status_pengajuan', '=', 'deskripsi_usaha.id_status_pengajuan')
      ->get();
    return view('usaha.daftar-usaha-pengusaha')->with(array(
      'daftar_usaha_user' => $daftar_usaha_user
    ));
  }

  public function lihat_detail_usaha($id_deskripsi_usaha)
  {
    $deskripsi_usaha = DeskripsiUsaha::whereIdDeskripsiUsaha($id_deskripsi_usaha)
      ->join('jenis_usaha', 'jenis_usaha.id_jenis_usaha', '=', 'deskripsi_usaha.id_jenis_usaha')
      ->join('status_pengajuan', 'status_pengajuan.id_status_pengajuan', '=', 'deskripsi_usaha.id_status_pengajuan')
      ->join('pemilik_usaha', 'pemilik_usaha.id_pemilik_usaha', '=', 'deskripsi_usaha.id_pemilik_usaha')
      ->first();

    return view('usaha.detail-usaha')->with(array(
      'deskripsi_usaha' => $deskripsi_usaha
    ));
  }

  public function edit_detail_usaha($id_deskripsi_usaha)
  {
    $jenis_usaha = JenisUsaha::all();
    $deskripsi_usaha = DeskripsiUsaha::whereIdDeskripsiUsaha($id_deskripsi_usaha)
      ->join('jenis_usaha', 'jenis_usaha.id_jenis_usaha', '=', 'deskripsi_usaha.id_jenis_usaha')
      ->join('status_pengajuan', 'status_pengajuan.id_status_pengajuan', '=', 'deskripsi_usaha.id_status_pengajuan')
      ->join('pemilik_usaha', 'pemilik_usaha.id_pemilik_usaha', '=', 'deskripsi_usaha.id_pemilik_usaha')
      ->first();

    return view('usaha.edit-usaha-pengusaha')->with(array(
      'deskripsi_usaha' => $deskripsi_usaha,
      'jenis_usaha' => $jenis_usaha
    ));
  }

  public function tambah_usaha()
  {
    $jenis_usaha = JenisUsaha::all();
    return view('usaha.tambah-usaha-pengusaha')->with(array('jenis_usaha' => $jenis_usaha));
  }

  public function konfirmasi_usaha_post($id_deskripsi_usaha)
  {
    try {
      $usaha = DeskripsiUsaha::whereIdDeskripsiUsaha($id_deskripsi_usaha)->update([
      'id_status_pengajuan' => 2,
      ]);

      session()->flash('konfirmasi', 'Deskripsi Usaha has been confirmed and will be showed to Pendana');
      return redirect('/admin/daftar-usaha');
    } catch (\Throwable $th) {
      dd($th);
    }
  }

  public function tidak_konfirmasi_usaha_post($id_deskripsi_usaha)
  {
    try {
      $usaha = DeskripsiUsaha::whereIdDeskripsiUsaha($id_deskripsi_usaha)->update([
        'id_status_pengajuan' => 1,
        ]);
  
        session()->flash('konfirmasi', 'Deskripsi Usaha has been not confirmed and will no longer shown to Pendana');
        return redirect('/admin/daftar-usaha');
    } catch (\Throwable $th) {
      dd($th);
    }
  }

  public function hapus_usaha_post($id_deskripsi_usaha)
  {
    try {
      $usaha = DeskripsiUsaha::whereIdDeskripsiUsaha($id_deskripsi_usaha)->first();
      $deleted = DeskripsiUsaha::whereIdDeskripsiUsaha($id_deskripsi_usaha)->delete();

      session()->flash('deleted', 'Deskripsi Usaha has been not confirmed and will no longer shown to Pendana');
      return redirect("/daftar-usaha/{$usaha->id_pemilik_usaha}");
    } catch (\Throwable $th) {
      dd($th);
    }
  }


  // POST REQUEST

  public function tambah_usaha_post($id_pemilik_usaha, Request $request)
  {
    $foto_usaha = $request->file('foto_usaha');
    $proposal = $request->file('proposal');

    // dd($request);

    $path_foto_usaha = $this->upload_foto($foto_usaha);
    $path_proposal = $this->upload_proposal($proposal);

    $deskripsi_usaha = DeskripsiUsaha::create([
      'id_pemilik_usaha' => $id_pemilik_usaha,
      'nama_usaha' => $request['nama_usaha'],
      'deskripsi' => $request['deskripsi'],
      'tahun_berdiri' => (int)$request['tahun_berdiri'],
      'periode_produksi' => (int)$request['periode_produksi'],
      'target_dana' => (int)$request['target_dana'],
      'id_jenis_usaha' => (int)$request['jenis_usaha'],
      'id_status_pengajuan' => 1,
      'foto_usaha' => $path_foto_usaha,
      'proposal' => $path_proposal
    ])->id_deskripsi_usaha;

    session()->flash('create_new', 'Usaha baru berhasil ditambahkan');

    return redirect('/daftar-usaha/' . $id_pemilik_usaha);
  }

  private function upload_foto($file)
  {
    $filename = uniqid('foto_usaha_');
    $filetype = $file->extension();
    $file->storeAs('upload/foto_usaha/', $filename . '.' . $filetype, 'public');

    return '/upload/foto_usaha/' . $filename . '.' . $filetype;
  }

  private function upload_proposal($file)
  {
    $filename = uniqid('proposal_');
    $filetype = $file->extension();
    $destinationPath = 'upload/proposal';
    $file->storeAs('upload/proposal/', $filename . '.' . $filetype, 'public');

    return '/upload/proposal/' . $filename . '.' . $filetype;
  }

  public function edit_usaha_post($id_deskripsi_usaha, Request $request)
  {
    try {

      $foto_usaha = $request->file('foto_usaha');
      $proposal = $request->file('proposal');
      if(!empty($foto_usaha)){
        $path_foto_usaha = $this->upload_foto($foto_usaha);
      }
      if(!empty($proposal)){
        $path_proposal = $this->upload_proposal($proposal);
      }

      $deskripsi_usaha = DeskripsiUsaha::whereIdDeskripsiUsaha($id_deskripsi_usaha)->first();

      $update_deskripsi_usaha = DeskripsiUsaha::whereIdDeskripsiUsaha($id_deskripsi_usaha)->update([
        'nama_usaha' => $request['nama_usaha'],
        'deskripsi' => $request['deskripsi'],
        'tahun_berdiri' => (int)$request['tahun_berdiri'],
        'periode_produksi' => (int)$request['periode_produksi'],
        'target_dana' => (int)$request['target_dana'],
        'id_jenis_usaha' => (int)$request['jenis_usaha'],
        'id_status_pengajuan' => 1,
        'foto_usaha' => !empty($foto_usaha) ? $path_foto_usaha : $deskripsi_usaha->foto_usaha ,
        'proposal' => !empty($proposal) ? $path_proposal : $deskripsi_usaha->proposal,
      ]);

      session()->flash('updated', 'Deskripsi Usaha successfully updated');
      return redirect("/daftar-usaha/edit/{$id_deskripsi_usaha}");
    } catch (\Throwable $th) {
      dd($th);
    }
  }

  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    //
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    //
  }

  /**
   * Display the specified resource.
   */
  public function show(DeskripsiUsaha $usaha)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(DeskripsiUsaha $usaha)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, DeskripsiUsaha $usaha)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(DeskripsiUsaha $usaha)
  {
    //
  }
}
