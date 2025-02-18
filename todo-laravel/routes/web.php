<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;

Route::get('/todos/favorite', [TodoController::class, 'favorite'])->name('favorite');
Route::get('/todos/completed', [TodoController::class, 'completed'])->name('completed');
Route::resource('todos', TodoController::class);