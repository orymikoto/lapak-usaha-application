<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
  public function profile()
  {
    if (auth('admin')->check()) {
      return view('profile.index')->with(array('detail_user' => auth('admin')->user(), 'role' => 'ADMIN'));
    } elseif (auth('pendana')->check()) {
      return view('profile.index')->with(array('detail_user' => auth('pendana')->user(), 'role' => 'PENDANA'));
    } elseif (auth('pengusaha')->check()) {
      return view('profile.index')->with(array('detail_user' => auth('pengusaha')->user(), 'role' => 'PENGUSAHA'));
    }
  }
}
