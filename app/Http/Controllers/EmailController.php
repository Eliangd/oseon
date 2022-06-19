<?php

namespace App\Http\Controllers;

use App\Models\Ordem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use App\Mail\EnvioEmail;

class EmailController extends Controller
{
    public function index()
    {       
        return view('emails.emailEnviado'); //quando acessado a rota /email ele retorna a view emailEnviado.
    }
    
    //Função responsável por enviar e-mail.
    public function email(Request $request, Ordem $ordem){
 
        //Variáveis recebem e armazenam os dados vindos do formulário.
        $id = $request['id'];
        $protocolo = $request['protocolo'];
        $nome = $request['nome'];         
        $mensagem = $request['mensagem'];
        //Função de envio de e-mail, já pré configurado o e-mail de destino e passando os dados do conteúdo da mensagem parar -> APP\Mail\EnvioEmail.
        Mail::to('admin@oseonsystem.online')->send(new EnvioEmail($id, $protocolo, $nome, $mensagem));


        //$request->session()->flash('mensagem_sucesso', 'E-mail enviado com sucesso!'); //mensagem de sucesso do envio do e-mail.
        
        return Redirect::to('email'); //redireciona para a view email.
    }
}
