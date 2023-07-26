<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Menu;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\MenuMakanan;
use App\Http\Controllers\SessionController;
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

// Bikin tampilan UI
Route::get('/cektemplate', function () {
    return view('layouts.template');
});
Route::get('/cektambahmenu', function () {
    return view('layouts.tambahmenu');
});
Route::get('/cektampilmenu', function () {
    return view('layouts.tampilmenu');
});
Route::get('/login', function () {
    return view('layouts.login');
});
Route::get('/register', function () {
    return view('layouts.register');
});

Route::get('/daftarmenu', function () {
    return view('users.daftarmenu');
});
// Route::get('/detail', function () {
//     return view('layouts.detail');
// });
// Route::get('/qwerty', function () {
//     return 'qwerty';
// });

// bikin route dengan kontroller
//get('nama route',[Model::class,'fungsi']);
// Route::get('tampilmenu',[Menu::class,'index']);
// Route::get('tambahmenu',[Menu::class,'create']);

// bikin route detail data pake fungsi show
// Route::get('tampilmenu/{id}',[Menu::class,'show']);
 
Route::get('/sesi',[SessionController::class,'index'])->middleware('dahlogin');
Route::post('/sesi/login',[SessionController::class,'login'])->middleware('dahlogin');
Route::get('/sesi/logout',[SessionController::class,'logout']);
Route::get('/sesi/register',[SessionController::class,'register'])->middleware('dahlogin');
Route::post('/sesi/create',[SessionController::class,'create'])->middleware('dahlogin');

// 
Route::resource('menu',MenuController::class)->middleware('logindulu');


// Route::post('/sesi/login',[AuthController::class,'login']);

