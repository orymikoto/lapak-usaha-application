<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Bank;
use App\Models\PemilikUsaha;
use App\Models\Pendana;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthenticationController extends Controller
{
  // GET REQUEST
  public function login()
  {
    return view('auth.login');
  }

  public function register()
  {
    $city = \Indonesia::allCities();
    $district = \Indonesia::allDistricts();
    $bank = Bank::all();
    return view('auth.register')->with(array(
      'city' => $city, 'district' => $district, 'bank' => $bank
    ));
  }

  public function logout()
  {
    if (auth('admin')->check()) {
      session()->flash('logout', 'Pengguna telah keluar, silahkan login kembali untuk mengakses fitur lengkap aplikasi Vestry');
      auth('admin')->logout();
      return redirect('/');
    } elseif (auth('pendana')->check()) {
      session()->flash('logout', 'Pengguna telah keluar, silahkan login kembali untuk mengakses fitur lengkap aplikasi Vestry');
      auth('pendana')->logout();
      return redirect('/');
    } elseif (auth('pengusaha')->check()) {
      session()->flash('logout', 'Pengguna telah keluar, silahkan login kembali untuk mengakses fitur lengkap aplikasi Vestry');
      auth('pengusaha')->logout();
      return redirect('/');
    }
  }


  // POST REQUEST
  public function login_post(Request $request)
  {
    $validation = $request->validate([
      'email' => 'required',
      'password' => 'required'
    ]);

    if (request()->role == 'admin') {
      if (Auth::guard('admin')->attempt($validation)) {
        return redirect('/');
      }
      session()->flash('pesan', 'Username atau password salah');
      return redirect('/login');
    } elseif (request()->role == 'pendana') {
      if (Auth::guard('pendana')->attempt($validation)) {
        return redirect('/');
      }
      session()->flash('pesan', 'Username atau password salah');
      return redirect('/login');
    } elseif (request()->role == 'pengusaha') {
      if (Auth::guard('pengusaha')->attempt($validation)) {
        return redirect('/');
      }
      session()->flash('pesan', 'Username atau password salah');
      return redirect('/login');
    } else {
      return view('auth.login')->with('failed', 'Silahkan pilih jenis akun terlebih dahulu');
    }
  }

  public function register_post(Request $request)
  {
    $validation = $request->validate([
      'nama' => 'required',
      'email' => 'required',
      'username' => 'required',
      'password' => 'required'
    ]);

    if (request()->role == 'admin') {
      $users = Admin::create([
        'username' => $request->username,
        'email' => $request->email,
        'password' => Hash::make($request->password),
      ]);
      // Auth::guard('admin')->attempt($validation);
      return view('auth.login')->with('registered', 'Register berhasil dilakukan silahkan login!');
    } elseif (request()->role == 'pendana') {
      $check = Pendana::whereEmail($request->email)->first();
      if (!empty($check)) {
        session()->flash('gagal', 'Email telah digunakan, silakan masukkan email lain atau login dengan akun yang sudah ada');
        return view('auth.register');
      }

      $users = Pendana::create([
        'nama' => $request->nama,
        'username' => $request->username,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'no_ktp' => $request['no_ktp'],
        'no_hp' => $request['no_hp'],
        'alamat_rumah' => $request['alamat_rumah'],
        'kecamatan' => $request['kecamatan'],
        'kota' => $request['kota'],
        'no_rekening' => $request['no_rekening'],
        'id_bank' => $request['id_bank']
      ]);
      return view('auth.login')->with('registered', 'Register berhasil dilakukan silahkan login!');
    } elseif (request()->role == 'pengusaha') {
      $check = PemilikUsaha::whereEmail($request->email)->first();
      if (!empty($check)) {
        session()->flash('gagal', 'Email telah digunakan, silakan masukkan email lain atau login dengan akun yang sudah ada');
        return view('auth.register');
      }

      $users = PemilikUsaha::create([
        'nama' => $request->nama,
        'username' => $request->username,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'no_ktp' => $request['no_ktp'],
        'no_hp' => $request['no_hp'],
        'alamat_rumah' => $request['alamat_rumah'],
        'kecamatan' => $request['kecamatan'],
        'kota' => $request['kota'],
        'no_rekening' => $request['no_rekening'],
        'id_bank' => $request['id_bank']
      ]);
      return view('auth.login')->with('registered', 'Register berhasil dilakukan silahkan login!');
    } else {
      return view('auth.register')->with('failed', 'Silahkan pilih jenis akun terlebih dahulu');
    }
  }
}
