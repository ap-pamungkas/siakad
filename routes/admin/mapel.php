<?php

use App\Http\Controllers\admin\MapelController;
use Illuminate\Support\Facades\Route;


Route::get('/test', function () {
    return view('');
});

Route::controller(MapelController::class)->group(function () {

    Route::get('/mapel', 'index');
    Route::get('/mapel/create', 'create');
    Route::post('/mapel/store', 'store');
    Route::get('listMapel',  'dataTableLogic')->name('list');
    // Route::get('/guru/detail/{guru}',  'show');
    // Route::get('/guru/{guru}/edit',  'edit');
    // Route::put('/guru/update/{guru}',  'update');
    // Route::delete('/guru/{guru}', 'destroy');
});

