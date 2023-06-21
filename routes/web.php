<?php

use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Manage\Auth\RegisterController;
use App\Http\Controllers\Dashboard\DashboardController;
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

// Route::get('/', function () {
//     return view('frontend.welcome');
// });

Route::get('/',[FrontendController::class,"frontendmenu"])->name("frontend.frontendmenu");
// Route Dashboard Siswa
Route::delete("/dashboard/destroy", [DashboardController::class,"destroy"])->name("dashboard.delete");
Route::resource("/dashboard", DashboardController::class)->parameters(["dashboard" => "dashboard"]);
// Route Registrasi Siswa
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register/daftar', [RegisterController::class, 'store'])->name('register.create');

