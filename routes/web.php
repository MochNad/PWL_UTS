<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Models\Login;
use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

<<<<<<< HEAD
Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/food', function () {
    return view('food');
});

Route::get('/drink', function () {
    return view('drink');
});

Route::get('/login', [LoginController::class, 'index']);

Route::get('/register', [RegisterController::class, 'index']);


=======
Route::get('/login', [LoginController::class, 'showLoginForm']);

Route::get('/register', [RegisterController::class, 'showRegisterForm']);

Auth::routes();
Route::middleware(['auth'])->group(function(){
    Route::get('/home', function () {
        echo 'anda sudah login';
    });

    Route::get('/logout', [LoginController::class, 'logout']);
});

>>>>>>> 59c33ad42bc78051d9934071081ac14ef313558e
