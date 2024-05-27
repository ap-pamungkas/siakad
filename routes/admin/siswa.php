<?php

use App\Http\Controllers\admin\SiswaController;
use Illuminate\Support\Facades\Route;



Route::controller(SiswaController::class)->group(function () {

    Route::get('/siswa', 'index');
    Route::get('/siswa/create', 'create');
    Route::post('/siswa/store', 'store');
    Route::get('listSiswa',  'dataTableLogic')->name('list');
    Route::get('/siswa/detail/{siswa}',  'show');
    Route::get('/siswa/{siswa}/edit',  'edit');
    Route::put('/siswa/update/{siswa}',  'update');
    Route::delete('/siswa/{guru}', 'destroy');
});

