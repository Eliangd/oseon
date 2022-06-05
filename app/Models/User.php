<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Kyslik\ColumnSortable\Sortable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, Sortable;

    
    protected $fillable = [
        'name',
        'email',
        'password',
    ]; //define que esses atributos podem ser armazenados em massa no banco.

    
    protected $hidden = [
        'password',
        'remember_token',
    ]; //limita apenas esses atributos que estão incluidos no array.

    
    protected $casts = [
        'email_verified_at' => 'datetime',
    ]; //converte 'email_verified_at' para 'datetime', nesse caso salva a data de verificação do e-mail.

    public $sortable = ['id', 'protocolo', 'name', 'email']; 
    // define a ordenação para esses campos.
}
