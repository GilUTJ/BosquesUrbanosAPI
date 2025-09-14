<?php

use App\Http\Controllers\ParkController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

//Rutas para gestionar las vistas de los parques urbanos
Route::get('/parks', [ParkController::class,'index'])->name ('parques.index');
Route::get('/parks/{id}', [ParkController::class, 'show'])->name('parques.show');
Route::get('/parksCreate', [ParkController::class, 'create'])->name('parques.create');
Route::get('/parksEdit/{id}',[ParkController::class,'edit'])->name('parques.edit');

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
