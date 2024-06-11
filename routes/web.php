<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [App\Http\Controllers\TasksController::class, 'index'])->name('tasks.list'); // list
Route::post('/', [App\Http\Controllers\TasksController::class, 'store'])->name('task.create'); // create
Route::patch('/{id}', [App\Http\Controllers\TasksController::class, 'update'])->name('task.update'); // update (mark as complete)
Route::delete('/{id}', [App\Http\Controllers\TasksController::class, 'destroy'])->name('task.delete'); // delete
