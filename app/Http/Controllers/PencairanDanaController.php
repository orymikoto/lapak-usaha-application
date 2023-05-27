<?php

namespace App\Http\Controllers;

use App\Models\PencairanDana;
use Illuminate\Http\Request;

class PencairanDanaController extends Controller
{
    public function admin_daftar_pencairan () {
        $pencairan = PencairanDana::all();
        return view('admin.list-pencairan');
    }
}
