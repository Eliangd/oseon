<?php

namespace App\Http\Controllers;

use App\Models\Ordem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;

class EmailController extends Controller
{
    public function index()
    {       
        return view('emails.emailEnviado'); //quando acessado a rota /email ele retorna a view emailEnviado.
    }
    
    //Função responsável por enviar e-mail.
    public function email(Request $request, Ordem $ordem){
        $dest_nome = 'Administrador Oseon';       //nome de quem irá receber a mensagem.
        $dest_email = 'admin@oseonsystem.online'; //destinatario -> e-mail que irá receber a mensagem enviada pelo sistema.
        $dados = array('id'=>$request['id'], 'nome'=>$request['nome'], 'mensagem'=>$request['mensagem']); //busca as informações dessa ordem que serão envidas no e-mail. Nesse caso o ID, NOME e a MENSAGEM digitado.
        Mail::send('emails.contato', $dados, //'emails.contato' é a view que tem a mensagem que sera enviada por e-mail pré configurada.
            function($mensagem) use ($dest_nome, $dest_email, $request){
                $mensagem->to($dest_email, $dest_nome) 
                        ->subject('E-mail de Contato Oseon!') //assundo do e-mail. 
                        ->bcc(['admin@oseonsystem.online']); //conta responsável por enviar o e-mail. 
            }
        );
        
        
        //$request->session()->flash('mensagem_sucesso', 'E-mail enviado com sucesso!'); //mensagem de sucesso do envio do e-mail.
        
        return Redirect::to('email'); //redireciona para a view email.
    }
}
