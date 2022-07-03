<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Ordem extends Model
{
    use Sortable, HasFactory;
    protected $table = "ordens"; //eloquent assume que o Model 'Ordem' irá armazenar os registros na tabela 'ordens'.
    protected $fillable = ['id', 'ords_codigo', 'protocolo', 'nome', 'email', 'telefone', 'cpf', 'endereco', 'equipamento', 'modelo', 'acessorios', 'defeito', 'relatorio', 'status_ordem', 'data_abertura'];
    //define que esses atributos podem ser armazenados em massa no banco.

    public $sortable = ['ords_codigo', 'protocolo', 'nome', 'status_ordem'];
    // define a ordenação para esses campos.

}
