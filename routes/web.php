<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\KampusController;
use App\Http\Controllers\MahasiswaController;
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
        Route::get('/register', 'register')->name('public.register');
        Route::post('/register', 'registerPost')->name('register.post');
        Route::get('/login', 'login')->name('public.login');
        Route::post('/login', 'loginPost')->name('login.post');
    });

    Route::get('/logout', 'logout')->name('logout');
});

Route::middleware(['auth'])->group(function () {
    Route::controller(MahasiswaController::class)->group(function () {
        Route::get('/mahasiswa', 'index')->name('mahasiswa.index');
        Route::get('/mahasiswa/create', 'create')->name('mahasiswa.create');
        Route::post('/mahasiswa/store', 'store')->name('mahasiswa.store');
        Route::get('/mahasiswa/edit/{id}', 'edit')->name('mahasiswa.edit');
        Route::post('/mahasiswa/update/{id}', 'update')->name('mahasiswa.update');
        Route::get('/mahasiswa/delete/{id}', 'destroy')->name('mahasiswa.delete');
    });

    Route::controller(KampusController::class)->group(function () {
        Route::get('/kampus', 'index')->name('kampus.index');
        Route::get('/kampus/create', 'create')->name('kampus.create');
        Route::post('/kampus/store', 'store')->name('kampus.store');
        Route::get('/kampus/edit/{id}', 'edit')->name('kampus.edit');
        Route::post('/kampus/update/{id}', 'update')->name('kampus.update');
        Route::get('/kampus/delete/{id}', 'destroy')->name('kampus.delete');
    });

    Route::controller(DosenController::class)->group(function () {
        Route::get('/dosen', 'index')->name('dosen.index');
        Route::get('/dosen/create', 'create')->name('dosen.create');
        Route::post('/dosen/store', 'store')->name('dosen.store');
        Route::get('/dosen/edit/{id}', 'edit')->name('dosen.edit');
        Route::post('/dosen/update/{id}', 'update')->name('dosen.update');
        Route::get('/dosen/delete/{id}', 'destroy')->name('dosen.delete');
    });

    // Report Routes
    Route::prefix('dashboard')->group(function () {
        Route::get('/', [ReportController::class, 'index'])->name('dashboard');
        Route::post('/generate', [ReportController::class, 'generate'])->name('reports.generate');
        Route::get('/summary', [ReportController::class, 'summary'])->name('reports.summary');
    });

    // Test route for dashboard (works without database)
    Route::get('/dashboard/test', function () {
        return view('private.reports.index', [
            'kampuses' => collect([
                (object)['id' => 1, 'nama_kampus' => 'Universitas Indonesia', 'kota' => 'Depok'],
                (object)['id' => 2, 'nama_kampus' => 'Institut Teknologi Bandung', 'kota' => 'Bandung'],
                (object)['id' => 3, 'nama_kampus' => 'Universitas Gadjah Mada', 'kota' => 'Yogyakarta']
            ]),
            'angkatans' => collect(['2024', '2023', '2022', '2021', '2020'])
        ]);
    })->name('dashboard.test');
});

