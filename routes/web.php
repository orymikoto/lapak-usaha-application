<?php

use App\Http\Controllers\AuthenticationController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
  return view('welcome');
});

// AUTH LOGIN REGISTER VIEW
Route::get('/login', [AuthenticationController::class, 'login'])->middleware('guest')->name('login.view');
Route::get('/register', [AuthenticationController::class, 'register'])->middleware('guest')->name('register.view');

// AUTH LOGIN REGISTER POST
Route::post('/login', [AuthenticationController::class, 'login_post'])->middleware('guest')->name('login.post');
Route::post('/register', [AuthenticationController::class, 'register_post'])->middleware('guest')->name('register.post');
