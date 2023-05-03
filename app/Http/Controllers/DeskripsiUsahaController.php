<?php

namespace App\Http\Controllers;

use App\Models\DeskripsiUsaha;
use Illuminate\Http\Request;

class DeskripsiUsahaController extends Controller
{
    // GET REQUEST
    public function admin_daftar_usaha(){
        return view('usaha.daftar-usaha-admin');
    }

    public function pendana_daftar_usaha(){
        return view('usaha.daftar-usaha-pendana');
    }

    public function pengusaha_daftar_usaha($id_pemilik_usaha){
        $daftar_usaha_user = DeskripsiUsaha::where('id_pemilik_usaha', $id_pemilik_usaha)
        ->join('jenis_usaha', 'jenis_usaha.id_jenis_usaha', '=', 'deskripsi_usaha.id_jenis_usaha')
        ->join('status_pengajuan', 'status_pengajuan.id_status_pengajuan', '=', 'deskripsi_usaha.id_status_pengajuan')
        ->get();
        $daftar_usaha = DeskripsiUsaha::all();
        return view('usaha.daftar-usaha-pengusaha')->with(array(
            'daftar_usaha_user' => $daftar_usaha_user,
            'daftar_usaha' => $daftar_usaha,
        ));
    }
    

    // POST REQUEST
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
