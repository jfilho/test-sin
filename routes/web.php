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

Auth::routes();

Route::group(['middleware' => ['auth']], function () {
    Route::resource('/alunos', App\Http\Controllers\AlunoController::class);
    Route::resource('/turmas', App\Http\Controllers\TurmaController::class);
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});