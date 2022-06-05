<?php

namespace App\Http\Controllers;

use App\Models\Ordem;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Redirect;

class OrdensController extends Controller
{
    //confirma que o usuário precisa estar logado no sistema para acessar.
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $ordens = Ordem::all(); //busca todas as ordens no banco.
        $ordens = Ordem::sortable()->paginate(10); //confiração do paginate para exibir apenas 10 itens por página, e o sortable ira fazer a ordenação.
        Paginator::useBootstrap(); //utilização do paginator.


        return view('ordem.ordens', compact('ordens')); //retorna a tela com as ordens do sistema.
    }

    public function filtroOrdens(Request $request)
    {        
        $filtroProtocolo = request('protocolo');
        $filtroCodigo = request('codigo');
        $filtroNome = request('nome');
        $ordens = Ordem::all();
        $ordens = Ordem::paginate(10);
        Paginator::useBootstrap();
        //$ordens->search($filtro);

        if($filtroProtocolo){
            $ordens = Ordem::where([
                ['protocolo', 'like', $filtroProtocolo]
            ])->paginate(10);
        }

        if($filtroCodigo){
            $ordens = Ordem::where([
                ['ords_codigo', 'like', $filtroCodigo]
            ])->paginate(10);
        }

        if($filtroNome){
            $ordens = Ordem::where([
                ['nome', 'like', "%$filtroNome%"]
            ])->paginate(10);
        }

        return view('ordem.ordens', compact('ordens'));
    }
    
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        //
    }

    //função reponsável por exibir as informações da ordem selecionada.
    public function show(Ordem $ordem)
    {
        $ordem = Ordem::find($ordem)->first(); //busca no banco as informações dessa ordem selecionada.
        return view('ordem.formulario', compact('ordem')); //exibe as informações da ordem na view 'ordem.formulário'. 
    }


    public function edit(Ordem $ordem)
    {
        //
    }

    //função responsável por atualizar as informações da ordem.
    public function update(Request $request, Ordem $ordem)
    {
        $ordem = Ordem::find($ordem)->first(); //busca no banco as informações dessa ordem selecionada.
        $ordem->fill($request->all());  
        $ordem->save(); //salva as informações alteradas.
        $request->session()->flash('mensagem_sucesso', 'Ordem atualizada com sucesso!'); //exibe uma mensagem sucesso ao atualizar a ordem.
        return Redirect::to('ordem'); //retorna para a view 'ordem'.
    }

    //função responsável por excluir a ordem selecionada.
    public function destroy(Request $request, Ordem $ordem)
    {
        $ordem = Ordem::find($ordem->id); //busca no banco a ordem pelo seu ID.
        $ordem->delete(); //exclui a ordem do banco.
        $request->session()->flash('mensagem_sucesso', 'Ordem removida com sucesso!'); //exibe uma mensagem de sucesso ao excluir a ordem.
        return Redirect::to('ordem'); //retora para a view 'ordem'.
    }
}
