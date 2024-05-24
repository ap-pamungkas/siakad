<?php

use App\Http\Controllers\admin\SiswaController;
use Illuminate\Support\Facades\Route;



Route::controller(SiswaController::class)->group(function () {

    Route::get('/siswa', 'index');
    Route::get('/create/create', 'create');
    // Route::post('/guru/store', 'store');
    // Route::get('listGuru',  'dataTableLogic')->name('list');
    // Route::get('/guru/detail/{guru}',  'show');
    // Route::get('/guru/{guru}/edit',  'edit');
    // Route::put('/guru/update/{guru}',  'update');
    // Route::delete('/guru/{guru}', 'destroy');
});

