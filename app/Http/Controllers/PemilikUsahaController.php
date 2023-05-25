<?php

namespace App\Http\Controllers;

use App\Models\PemilikUsaha;
use Illuminate\Http\Request;

class PemilikUsahaController extends Controller
{
  public function admin_daftar_pemilik_usaha()
  {
    $list_user = PemilikUsaha::join('bank', 'bank.id_bank', '=', 'pemilik_usaha.id_bank')
      ->join('indonesia_cities', 'indonesia_cities.code', '=', 'pemilik_usaha.kota')
      ->join('indonesia_districts', 'indonesia_districts.code', '=', 'pemilik_usaha.kecamatan')
      ->select('*', 'indonesia_cities.name as nama_kota')
      ->get();
    return view('admin.list-pengusaha')->with(array('list_user' => $list_user));
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
  public function show(PemilikUsaha $pemilikUsaha)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(PemilikUsaha $pemilikUsaha)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, PemilikUsaha $pemilikUsaha)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(PemilikUsaha $pemilikUsaha)
  {
    //
  }
}
