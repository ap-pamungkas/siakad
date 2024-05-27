<?php

use App\Http\Controllers\admin\SemesterController;
use Illuminate\Support\Facades\Route;



Route::controller(SemesterController::class)->group(function () {

    Route::get('/semester', 'index');
    Route::get('/semester/create', 'create');
    Route::post('/semester/store', 'store');
    Route::get('listSemester',  'dataTableLogic')->name('list');

    Route::get('/semester/{smtr}/edit',  'edit');
    Route::put('/semester/update/{smtr}',  'update');
    Route::delete('/semester/{smtr}', 'destroy');
});

