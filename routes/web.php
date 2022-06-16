<?php

use App\Http\Controllers\BuscaController;
use App\Http\Controllers\OrdensController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\FiltroController;
use App\Http\Controllers\AbrirOrdemController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

//Rotas Públicas
Route::get('/', function () {
    return view('welcome');
});
Route::get('search', [BuscaController::class, 'pesquisa']);

//Rotas Admin
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('usuario', UsersController::class);
Route::resource('ordem', OrdensController::class);

Route::post('/enviarEmail', [App\Http\Controllers\EmailController::class, 'email']);
Route::get('/email', [App\Http\Controllers\EmailController::class, 'index']);
Route::post('/email', [App\Http\Controllers\EmailController::class, 'index']);

Route::post('/filtro', [App\Http\Controllers\OrdensController::class, 'filtroOrdens'])->name('filtro');
Route::get('/filtro', [App\Http\Controllers\OrdensController::class, 'filtroOrdens'])->name('filtro'); 
//Adicionado essa rota GET para funcionar a ordenação após filtrar