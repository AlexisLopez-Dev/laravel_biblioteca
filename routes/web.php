<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LibroController;

Route::get('/', [LibroController::class, 'index'])->name('libros.index');

Route::get('/create', [LibroController::class, 'create'])->name('libros.create');
Route::post('/store', [LibroController::class, 'store'])->name('libros.store');

Route::delete('/destroy/{id}', [LibroController::class, 'destroy'])->name('libros.destroy');

Route::get('/edit/{id}', [LibroController::class, 'edit'])->name('libros.edit');
Route::put('/update/{id}', [LibroController::class, 'update'])->name('libros.update');
