<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Bank;
use App\Models\PemilikUsaha;
use App\Models\Pendana;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
  public function profile()
  {
    $province = \Indonesia::allProvinces()->sortBy('name');
    $city = \Indonesia::allCities();
    $district = \Indonesia::allDistricts();
    $bank = Bank::all();
    if (auth('admin')->check()) {
      return view('profile.index')->with(array('detail_user' => auth('admin')->user(), 'role' => 'ADMIN', 'bank' => $bank));
    } elseif (auth('pendana')->check()) {
      return view('profile.index')->with(array('detail_user' => auth('pendana')->user(), 'role' => 'PENDANA', 'province' => $province, 'city' => $city, 'district' => $district, 'bank' => $bank));
    } elseif (auth('pengusaha')->check()) {
      return view('profile.index')->with(array('detail_user' => auth('pengusaha')->user(), 'role' => 'PENGUSAHA', 'province' => $province, 'city' => $city, 'district' => $district, 'bank' => $bank));
    }
  }

  public function profile_post(Request $request)
  {
    try {
      $validate = $request->validate([
        'username' => 'required',
        'email' => 'required',
      ]);
      
      if (auth('admin')->check()) {
        $admin = Admin::where('id_admin', auth('admin')->user()->id_admin)->update([
          'username' => $request['username'],
          'email' => $request['email'],
          'id_bank' => (int)$request['id_bank'],
          'no_rekening' => $request['no_rekening']
        ]);
        
        session()->flash('updated', 'Data Admin Berhasil Diperbarui');
        return $this->profile();
      } elseif (auth('pendana')->check()) {
        $pendana = Pendana::where('id_pendana', auth('pendana')->user()->id_pendana)->update([
          'username' => $request['username'],
          'email' => $request['email'],
          'nama' => $request['nama'],
          'no_ktp' => $request['no_ktp'],
          'no_hp' => $request['no_hp'],
          'pekerjaan' => $request['pekerjaan'],
          'alamat_rumah' => $request['alamat_rumah'],
          'kecamatan' => $request['kecamatan'],
          'kota' => $request['kota'],
          'provinsi' => $request['provinsi'],
          'no_rekening' => $request['no_rekening'],
          'id_bank' => $request['id_bank']
        ]);

        session()->flash('updated', 'Data Pendana Berhasil Diperbarui');
        return $this->profile();
      } elseif (auth('pengusaha')->check()) {
        $pengusaha = PemilikUsaha::where('id_pemilik_usaha', auth('pengusaha')->user()->id_pemilik_usaha)->update([
          'username' => $request['username'],
          'email' => $request['email'],
          'nama' => $request['nama'],
          'no_ktp' => $request['no_ktp'],
          'no_hp' => $request['no_hp'],
          'pekerjaan_sampingan' => $request['pekerjaan_sampingan'],
          'alamat_rumah' => $request['alamat_rumah'],
          'kecamatan' => $request['kecamatan'],
          'kota' => $request['kota'],
          'provinsi' => $request['provinsi'],
          'no_rekening' => $request['no_rekening'],
          'id_bank' => $request['id_bank']
        ]);

        session()->flash('updated', 'Data Pengusaha Berhasil Diperbarui');
        return $this->profile();
      }
    } catch (\Throwable $th) {
      dd($th);
    }
  }
}
