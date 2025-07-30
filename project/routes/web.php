<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DoctorController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::view('/nosotros', 'nosotros')->name('nosotros');

/*
// Login
Route::get('/login', [LoginController::class,'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class,'login']);

// Logout
Route::post('/logout', [LogoutController::class,'logout'])->name('logout');

// Perfil
Route::get('/profile', [ProfileController::class,'index'])->name('profile');

*/
//Login
Route::view('/login', 'auth.login')->name('login');

//Admin
Route::prefix('admin')
     ->name('admin.')
     // ->middleware('auth')    // comentado hasta implementar Auth
     ->group(function(){
    Route::resource('doctors', DoctorController::class)->except(['show']);
    Route::resource('appointments', AppointmentController::class)->except('show');
});




