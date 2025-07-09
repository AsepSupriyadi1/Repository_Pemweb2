<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\KampusController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ReportController;
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


Route::get('/home', function () {
    return view('public.landing');
});

Route::get('/', function () {
    return view('public.landing');
});


Route::get('/search', [SearchController::class, 'search'])->name('public.search');

Route::controller(AuthController::class)->group(function () {
    Route::middleware('guest')->group(function () {
        Route::get('/login', 'login')->name('public.login');
        Route::post('/login', 'loginPost')->name('login.post');
    });

    Route::get('/logout', 'logout')->name('logout');
});

Route::middleware(['auth'])->group(function () {
    // User Management - Available to both ADMIN and STAFF
    Route::controller(UserController::class)->group(function () {
        Route::get('/users', 'index')->name('users.index');
        Route::get('/users/create', 'create')->name('users.create');
        Route::post('/users/store', 'store')->name('users.store');
        Route::get('/users/{id}', 'show')->name('users.show');
        Route::get('/users/edit/{id}', 'edit')->name('users.edit');
        Route::post('/users/update/{id}', 'update')->name('users.update');
        Route::get('/users/delete/{id}', 'destroy')->name('users.delete');
    });

    // Kampus Management - Available to both ADMIN and STAFF
    Route::controller(KampusController::class)->group(function () {
        Route::get('/kampus', 'index')->name('kampus.index');
        Route::get('/kampus/create', 'create')->name('kampus.create');
        Route::post('/kampus/store', 'store')->name('kampus.store');
        Route::get('/kampus/edit/{id}', 'edit')->name('kampus.edit');
        Route::post('/kampus/update/{id}', 'update')->name('kampus.update');
        Route::get('/kampus/delete/{id}', 'destroy')->name('kampus.delete');
    });

    // Mahasiswa Management - Only ADMIN can access
    Route::middleware(['role:ADMIN'])->group(function () {
        Route::controller(MahasiswaController::class)->group(function () {
            Route::get('/mahasiswa', 'index')->name('mahasiswa.index');
            Route::get('/mahasiswa/create', 'create')->name('mahasiswa.create');
            Route::post('/mahasiswa/store', 'store')->name('mahasiswa.store');
            Route::get('/mahasiswa/edit/{id}', 'edit')->name('mahasiswa.edit');
            Route::post('/mahasiswa/update/{id}', 'update')->name('mahasiswa.update');
            Route::get('/mahasiswa/delete/{id}', 'destroy')->name('mahasiswa.delete');
        });
    });

    // Dosen Management - Only ADMIN can access
    Route::middleware(['role:ADMIN'])->group(function () {
        Route::controller(DosenController::class)->group(function () {
            Route::get('/dosen', 'index')->name('dosen.index');
            Route::get('/dosen/create', 'create')->name('dosen.create');
            Route::post('/dosen/store', 'store')->name('dosen.store');
            Route::get('/dosen/edit/{id}', 'edit')->name('dosen.edit');
            Route::post('/dosen/update/{id}', 'update')->name('dosen.update');
            Route::get('/dosen/delete/{id}', 'destroy')->name('dosen.delete');
        });
    });

    // Dashboard - Available to both ADMIN and STAFF
    Route::prefix('dashboard')->group(function () {
        Route::get('/', [ReportController::class, 'index'])->name('dashboard');
        Route::post('/generate', [ReportController::class, 'generate'])->name('reports.generate');
        Route::get('/summary', [ReportController::class, 'summary'])->name('reports.summary');
    });
});

