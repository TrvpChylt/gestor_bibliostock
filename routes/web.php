<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\LibroController;

Route::get('/libros', [LibroController::class, 'index'])->name('libros.index');
Route::delete('/libros/{libro}', [LibroController::class, 'destroy'])->name('libros.destroy');