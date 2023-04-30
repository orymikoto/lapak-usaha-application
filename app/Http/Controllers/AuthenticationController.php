<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthenticationController extends Controller
{
  // VIEW CONTROLLER
  public function login()
  {
    return view('auth.login');
  }

  public function register()
  {
    return view('auth.register');
  }


  // POST CONTROLLER
  public function loginAdmin(Request $request)
  {
    try {
      // $validate = validate($request, [
      //   'email' => 'required|email',
      //   'password' => 'required'
      // ]);
      auth()->guard('admin')->attempt();
    } catch (\Throwable $th) {
      //throw $th;
    }
  }


  public function loginPendana(Request $request)
  {
    try {
      //code...
    } catch (\Throwable $th) {
      //throw $th;
    }
  }


  public function loginPemilikUsaha(Request $request)
  {
    try {
      //code...
    } catch (\Throwable $th) {
      //throw $th;
    }
  }
}
