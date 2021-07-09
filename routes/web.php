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

Route::get('houses/{house_id}/porches/{porche_id}', [PorcheController::class,'show'])->name('house.porche.show');
Route::get('houses/{house_id}/porches/{porche_id}/floors/{floor_id}', [FloorController::class,'show'])->name('house.porche.floor.show');
Route::get('houses/{house_id}/porches/{porche_id}/floors/{floor_id}/flats/{flat_id}', [FlatController::class,'show'])->name('house.porche.floor.flat.show');
Route::get('flats/{flat_id}/sell', [FlatController::class,'sell'])->name('flats.sell');

