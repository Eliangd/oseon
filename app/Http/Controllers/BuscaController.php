<?php

namespace App\Http\Controllers;

use App\Models\Ordem;
use Illuminate\Http\Request;

class BuscaController extends Controller
{
    //Função responsavel por fazer a busca do protocólo digitado.
    public function pesquisa()
    {
        $search = request('search');
        $ordens = Ordem::all();
        //pesquisa no banco todas as ordens e filtra a que foi digitada.
        if($search){
            $ordens = Ordem::where([
                ['protocolo', 'like', $search]
            ])->get();
        }
        //após encontrar a ordem, ele retorna a view com as informações dela.
        return view('ordem/busca/search', ['ordens' => $ordens, 'search' => $search]);
    }

}
