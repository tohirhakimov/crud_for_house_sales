<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FlatController;
use App\Http\Controllers\FloorController;
use App\Http\Controllers\PorcheController;
use App\Http\Controllers\HouseController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\SoldFlatController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('houses', HouseController::class);
Route::resource('porches', PorcheController::class);
Route::resource('floors', FloorController::class);
Route::resource('flats', FlatController::class);
Route::resource('clients', ClientController::class);
Route::resource('sold_flats', SoldFlatController::class);