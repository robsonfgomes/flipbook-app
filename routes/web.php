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

Route::get('/', [HomeController::class, 'index'])
    ->name('home')
    ->middleware('auth');

//TODO: pesquisar onde estão essas rotas
Auth::routes();

Route::get('/home', [HomeController::class, 'index'])
    ->name('home')
    ->middleware('auth');

Route::match(['get', 'post'], '/revistas/inserir', [RevistaController::class, 'create'])
    ->name('revistas.inserir')
    ->middleware('auth');

Route::get('/revistas/visualizar/{id}', [RevistaController::class, 'viewer'])
    ->where('id', '[0-9]+')
    ->name('revistas.viewer');

Route::get('/revista/remover/{revista}', [RevistaController::class, 'delete'])
    ->name('revista.delete')
    ->middleware('auth');

Route::get('/revistas', [RevistaController::class, 'list'])
    ->name('revistas.list');

Route::fallback(function () {
    return redirect('/home')->with('danger', 'A página solicitada não existe!');
});
