<?php

use App\Http\Controllers\admin\KelasController;
use Illuminate\Support\Facades\Route;



Route::controller(KelasController::class)->group(function () {

    Route::get('/kelas', 'index');
    Route::get('/kelas/create', 'create');
    Route::post('/kelas/store', 'store');
    Route::get('listKelas',  'dataTableLogic')->name('list');

    Route::get('/kelas/{kelas}/edit',  'edit');
    Route::put('/kelas/update/{kelas}',  'update');
    Route::delete('/kelas/{kelas}', 'destroy');
});

