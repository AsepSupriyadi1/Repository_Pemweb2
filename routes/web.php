<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\KampusController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\DetailController;
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

// Public Detail Pages
Route::controller(DetailController::class)->group(function () {
    Route::get('/kampus/{id}', 'kampus')->name('public.kampus.detail');
    Route::get('/mahasiswa/{id}', 'mahasiswa')->name('public.mahasiswa.detail');
    Route::get('/dosen/{id}', 'dosen')->name('public.dosen.detail');
});

Route::controller(AuthController::class)->group(function () {
    Route::middleware('guest')->group(function () {
        Route::get('/login', 'login')->name('public.login');
        Route::post('/login', 'loginPost')->name('login.post');
    });

    Route::get('/logout', 'logout')->name('logout');
});

Route::middleware(['auth'])->group(function () {
    // User Management - Only ADMIN can access
    Route::middleware(['role:ADMIN'])->group(function () {
        Route::controller(UserController::class)->group(function () {
            Route::get('/users', 'index')->name('users.index');
            Route::get('/users/create', 'create')->name('users.create');
            Route::post('/users/store', 'store')->name('users.store');
            Route::get('/users/{id}', 'show')->name('users.show');
            Route::get('/users/edit/{id}', 'edit')->name('users.edit');
            Route::post('/users/update/{id}', 'update')->name('users.update');
            Route::get('/users/delete/{id}', 'destroy')->name('users.delete');
        });
    });

    // Kampus Management - Available to both ADMIN and STAFF
    Route::controller(KampusController::class)->group(function () {
        Route::get('/campuses', 'index')->name('kampus.index');
        Route::get('/campuses/create', 'create')->name('kampus.create');
        Route::post('/campuses/store', 'store')->name('kampus.store');
        Route::get('/campuses/edit/{id}', 'edit')->name('kampus.edit');
        Route::post('/campuses/update/{id}', 'update')->name('kampus.update');
        Route::get('/campuses/delete/{id}', 'destroy')->name('kampus.delete');
    });

    // Mahasiswa Management - Available to both ADMIN and STAFF
    Route::controller(MahasiswaController::class)->group(function () {
        Route::get('/students', 'index')->name('mahasiswa.index');
        Route::get('/students/create', 'create')->name('mahasiswa.create');
        Route::post('/students/store', 'store')->name('mahasiswa.store');
        Route::get('/students/edit/{id}', 'edit')->name('mahasiswa.edit');
        Route::post('/students/update/{id}', 'update')->name('mahasiswa.update');
        Route::get('/students/delete/{id}', 'destroy')->name('mahasiswa.delete');
    });

    // Dosen Management - Only ADMIN can access
    Route::middleware(['role:ADMIN'])->group(function () {
        Route::controller(DosenController::class)->group(function () {
            Route::get('/lecturers', 'index')->name('dosen.index');
            Route::get('/lecturers/create', 'create')->name('dosen.create');
            Route::post('/lecturers/store', 'store')->name('dosen.store');
            Route::get('/lecturers/edit/{id}', 'edit')->name('dosen.edit');
            Route::post('/lecturers/update/{id}', 'update')->name('dosen.update');
            Route::get('/lecturers/delete/{id}', 'destroy')->name('dosen.delete');
        });
    });

    // Dashboard - Available to both ADMIN and STAFF
    Route::prefix('dashboard')->group(function () {
        Route::get('/', [ReportController::class, 'index'])->name('dashboard');
        Route::post('/generate', [ReportController::class, 'generate'])->name('reports.generate');
        Route::get('/summary', [ReportController::class, 'summary'])->name('reports.summary');
    });
});

