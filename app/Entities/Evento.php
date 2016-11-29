<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Frequencia;
use App\Perfil;

class Evento extends Model
{
    
    protected $fillable = [
        'resumo',
        'descricao',
        'link',
        'data'
    ];

}
