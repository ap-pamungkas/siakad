<?php

use App\Http\Controllers\Admin\NilaiController;
use Illuminate\Support\Facades\Route;



Route::controller(NilaiController::class)->group(function () {

    Route::get('/nilai', 'index');
    Route::get('/kelas-detail/{kelas}', 'showKelas');
    Route::get('/nilai/create', 'create');
    Route::post('/nilai/store', 'store');
    Route::get('/listKelas',  'dataTableLogic')->name('list');
    Route::get('/listAnggotaKelas',  'dataTableSiswa')->name('list');

    Route::get('/nilai/{nilai}/edit',  'edit');
    Route::put('/nilai/update/{kelas}',  'update');
    Route::delete('/nilai/{nilai}', 'destroy');
});

