<?php

namespace App\Http\Controllers;

use App\Models\Pendana;
use Illuminate\Http\Request;

class PendanaController extends Controller
{

  public function admin_daftar_pendana()
  {
    $list_user = Pendana::join('bank', 'bank.id_bank', '=', 'pendana.id_bank')
      ->join('indonesia_cities', 'indonesia_cities.code', '=', 'pendana.kota')
      ->join('indonesia_districts', 'indonesia_districts.code', '=', 'pendana.kecamatan')
      ->select('*', 'indonesia_cities.name as nama_kota')
      ->get();
    return view('admin.list-pendana')->with(array('list_user' => $list_user));
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
  public function show(Pendana $pendana)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Pendana $pendana)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, Pendana $pendana)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Pendana $pendana)
  {
    //
  }
}
