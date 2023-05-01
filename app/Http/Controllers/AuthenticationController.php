<?php

namespace App\Http\Controllers;

use App\Models\Admin;
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
    return view('auth.register');
  }

  public function logout()
  {
    if (auth('admin')->check()) {
      auth('admin')->logout();
      return redirect('/');
    } elseif (auth('pendana')->check()) {
      auth('pendana')->logout();
      return redirect('/');
    } elseif (auth('pengusaha')->check()) {
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
      Auth::guard('admin')->attempt($validation);
      return redirect('/');
    } elseif (request()->role == 'pendana') {
      Auth::guard('pendana')->attempt($validation);
      return redirect('/');
    } elseif (request()->role == 'pengusaha') {
      Auth::guard('pengusaha')->attempt($validation);
      return redirect('/');
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
      $users = Pendana::create([
        'nama' => $request->nama,
        'username' => $request->username,
        'email' => $request->email,
        'password' => Hash::make($request->password),
      ]);
      return view('auth.login')->with('registered', 'Register berhasil dilakukan silahkan login!');
    } elseif (request()->role == 'pengusaha') {
      $users = PemilikUsaha::create([
        'nama' => $request->nama,
        'username' => $request->username,
        'email' => $request->email,
        'password' => Hash::make($request->password),
      ]);
      return view('auth.login')->with('registered', 'Register berhasil dilakukan silahkan login!');
    } else {
      return view('auth.register')->with('failed', 'Silahkan pilih jenis akun terlebih dahulu');
    }
  }
}
