<?php

use App\Http\Controllers\admin\KepalaSekolahController;
use Illuminate\Support\Facades\Route;


Route::get('/test', function () {
    return view('');
});

Route::controller(KepalaSekolahController::class)->group(function () {

    Route::get('/kepala-sekolah', 'index');
    Route::get('/kepala-sekolah/create', 'create');
    Route::post('/kepala-sekolah/store', 'store');
    Route::get('/kepala-sekolah/{kps}/edit', 'edit');
    Route::put('/kepala-sekolah/update/{kps}', 'update');
});

