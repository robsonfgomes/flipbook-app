<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\RevistaController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [HomeController::class, 'index']);

//TODO: pesquisar onde estão essas rotas
Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('test');

Route::match(['get', 'post'], '/revistas/inserir', [RevistaController::class, 'create'])->name('revistas.inserir');
