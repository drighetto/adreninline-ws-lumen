<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mensagem extends Model
{
    
    protected $fillable = [
        'resumo',
        'descricao'
    ];

}
