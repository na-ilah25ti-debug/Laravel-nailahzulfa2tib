<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

//Route::get('/', function () {
//   return view('welcome');
//});

Route::get('/', [HomeController::class, 'index']);

Route::post('question/store', [QuestionController::class, 'store'])
    ->name('question.store');

Route::get('dashboard', [DashboardController::class, 'index'])
    ->name('dashboard')
    ->middleware('checkislogin');

Route::prefix('admin')->group(function () {
    Route::resource('pelanggan', PelangganController::class);
});

Route::delete('/admin/pelanggan/{id}', [PelangganController::class, 'destroy'])->name('pelanggan.destroy');

Route::resource('pelanggan', PelangganController::class);

Route::resource('users', UserController::class);

Route::get('/login', [AuthController::class, 'index'])->name('login');

Route::post('/login', [AuthController::class, 'login'])->name('auth.login');

Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('auth.logout');

Route::group(['middleware' => ['checkrole:Super Admin']], function () {
    Route::resource('users', UserController::class);
});

