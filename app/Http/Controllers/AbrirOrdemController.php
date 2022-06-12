<?php

namespace App\Http\Controllers;

use App\Models\Ordem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;

class AbrirOrdemController extends Controller
{
    public function index(){
        return view('ordem.novaOrdem');
    }

    public function store(Request $request)
    {
        $dados = new Ordem;
        $dados->nome = $request->nome;
        $dados->email = $request->email;
        $dados->telefone = $request->telefone;
        $dados->cpf = $request->cpf;
        $dados->endereco = $request->endereco;
        $dados->equipamento = $request->equipamento;
        $dados->modelo = $request->modelo;
        $dados->acessorios = $request->acessorios;
        $dados->defeito = $request->defeito;
        $dados->protocolo = $request->protocolo = uniqid();
        $dados->status_ordem = 'A Fazer';
        $dados->save();

        
        $dest_nome = $request->nome;
        $dest_email = $request->email;
        $protocolo = $request->protocolo;
        $dados = array('nome'=>$request['nome'], 'protocolo'=>$protocolo);
        Mail::send('emails.envioProtocolo', $dados,
            function($mensagem) use ($dest_nome, $dest_email, $request){
                $mensagem->to($dest_email, $dest_nome)
                        ->subject('Código de acesso ao Oseon!');
            }
        );

        

        $request->session()->flash('mensagem_sucesso', 'Ordem criada com sucesso!');
        return Redirect::to('ordem');
    }
    
}
