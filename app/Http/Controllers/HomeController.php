<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //confirma que o usuário precisa estar logado no sistema para acessar.
    public function __construct()
    {
        $this->middleware('auth');
    }

    //quando acessado pela rota exibe a view da home do sistema.
    public function index()
    {
        return view('home');
    }
}
