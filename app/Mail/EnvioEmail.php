<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EnvioEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $id;
    public $protocolo;
    public $nome;
    public $mensagem;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($id, $protocolo, $nome, $mensagem)
    {
        //recebe os dados da funcão e encaminha para a view para depois enviar o e-mail.
        $this->id = $id;       
        $this->protocolo = $protocolo;
        $this->nome = $nome;
        $this->mensagem = $mensagem;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.contato'); //retorna os dados para a view email.contato.
    }
}
