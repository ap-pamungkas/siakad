<?php

use App\Http\Controllers\admin\GuruController;
use Illuminate\Support\Facades\Route;


Route::get('/test', function () {
    return view('');
});

Route::controller(GuruController::class)->group(function () {

    Route::get('/guru', 'index');
    Route::get('/guru/create', 'create');
    Route::post('/guru/store', 'store');
    Route::get('listGuru',  'dataTableLogic')->name('list');
    Route::get('/guru/detail/{guru}',  'show');
    Route::get('/guru/{guru}/edit',  'edit');
    Route::put('/guru/update/{guru}',  'update');
    Route::delete('/guru/{guru}', 'destroy');
});

