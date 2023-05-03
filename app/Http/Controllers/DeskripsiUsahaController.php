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
    return view('usaha.daftar-usaha-admin');
  }

  public function pendana_daftar_usaha()
  {
    return view('usaha.daftar-usaha-pendana');
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

  public function tambah_usaha()
  {
    $jenis_usaha = JenisUsaha::all();
    return view('usaha.tambah-usaha-pengusaha')->with(array('jenis_usaha' => $jenis_usaha));
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
