<?php

namespace App\Http\Controllers;

use App\Models\Ordem;
use Illuminate\Http\Request;

class BuscaController extends Controller
{
    //Função responsavel por fazer a busca do protocólo digitado.
    public function pesquisa()
    {
        $search = request('search'); //varialvel recebe o valor digitado na busca.
        $ordens = Ordem::all(); //busca todas as ordens do banco.
        
        if($search){  
            $ordens = Ordem::where([ //verifica se existe a ordem com o valor informado na busca.
                ['protocolo', 'like', $search] //seleciona a ordem que tem o protocolo exatamente igual ao valor informado na busca.
            ])->get();
        }
        //após encontrar a ordem, ele retorna a view com as informações dela.
        return view('ordem/busca/search', ['ordens' => $ordens, 'search' => $search]);
    }

}
