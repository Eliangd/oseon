<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ordem extends Model
{
    use HasFactory;
    protected $table = "ordens"; //eloquent assume que o Model 'Ordem' irá armazenar os registros na tabela 'ordens'.
    protected $fillable = ['id', 'ords_codigo', 'protocolo', 'nome', 'email', 'telefone', 'cpf', 'endereco', 'equipamento', 'modelo', 'acessorios', 'defeito', 'relatorio', 'status_ordem'];
    //define que esses atributos podem ser armazenados em massa no banco.

    
    /*
    public function search(Array $data)
    {
        return $this->where(function ($query) use ($data){
            if (isset($data['id']))
                $query->where('id', $data['id']);

            if (isset($data['protocolo']))
                $query->where('protocolo', $data['protocolo']);
        })
        
        ->$query->paginate();

        
    }
    */
    
}
