<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SimulasiController;

Route::get('/', function () {
    return view('pages.home');
});

// ================================
// HALAMAN SIMULASI (AWAL)
// ================================
Route::get('/simulasi/deposito', fn () => view('simulasi.deposito'))
    ->name('simulasi.deposito');

Route::get('/simulasi/kredit', fn () => view('simulasi.kredit'))
    ->name('simulasi.kredit');

// ================================
// FORM PERMINTAAN INFORMASI
// ================================
Route::get('/simulasi/{jenis}/permintaan', function ($jenis) {
    if (!in_array($jenis, ['deposito', 'kredit'])) {
        abort(404);
    }

    return view('simulasi.permintaan-simulasi', compact('jenis'));
})->name('simulasi.permintaan');

// ================================
// SUBMIT FORM PERMINTAAN
// ================================
Route::post('/simulasi/permintaan/submit',
    [SimulasiController::class, 'submit']
)->name('simulasi.permintaan.submit');
