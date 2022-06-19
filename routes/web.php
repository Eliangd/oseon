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

//Rota tela inicial do site.
Route::get('/', function () {
    return view('welcome');
});
//Rota busca/informações da ordem.
Route::get('search', [BuscaController::class, 'pesquisa']);


//Rotas Admin

//Usuário precisa estar logado no sistema para acessar as rotas.
Auth::routes(); 
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home'); //Rota tela home/Seleção dos módulos do site.
Route::resource('usuario', UsersController::class); //Rotas Usuário.
Route::resource('ordem', OrdensController::class); //Rotas Ordem.

//Rotas reponsáveis pelo envio de e-mail.
Route::get('/enviarEmail', [EmailController::class, 'email']);
Route::post('/enviarEmail', [App\Http\Controllers\EmailController::class, 'email']);
Route::get('/email', [App\Http\Controllers\EmailController::class, 'index']);  //retorna a tela de e-mail enviado com sucesso.

//Rotas responsáveis pelo filtro de ordens.
Route::post('/filtro', [App\Http\Controllers\OrdensController::class, 'filtroOrdens'])->name('filtro');
Route::get('/filtro', [App\Http\Controllers\OrdensController::class, 'filtroOrdens'])->name('filtro'); 
//Adicionado essa rota GET para funcionar a ordenação após filtrar
