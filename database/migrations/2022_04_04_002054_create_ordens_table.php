<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdensTable extends Migration
{
    
    public function up()
    {
        Schema::create('ordens', function (Blueprint $table) {
            $table->increments('id');           
            $table->string('protocolo', 13);
            $table->string('nome', 100);
            $table->string('email');
            $table->string('telefone', 20);
            $table->string('cpf', 20);
            $table->text('endereco');
            $table->string('equipamento', 50);
            $table->string('modelo', 50);
            $table->string('acessorios', 50);
            $table->text('defeito');
            $table->text('relatorio')->nullable();;
            $table->enum('status_ordem', ['A fazer', 'Em andamento', 'Pronto']);
            $table->timestamps();
        });
    }

   
    public function down()
    {
        Schema::dropIfExists('ordens');
    }
}
