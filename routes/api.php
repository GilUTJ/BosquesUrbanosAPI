<?php

use App\Http\Controllers\ParkController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

//Rutas para gestionar los parques urbanos de la API externa
Route::post('/parks', [ParkController::class, 'store'])->name('parques.store');
Route::put('/parks/{id}', [ParkController::class, 'update'])->name('parques.update');
Route::delete('/parks/{id}', [ParkController::class, 'destroy'])->name('parques.destroy');

