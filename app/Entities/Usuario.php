<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Entities\Frequencia;
use App\Entities\Perfil;

class Usuario extends Model
{
    
    protected $fillable = [
        'nome',
        'sexo',
        'telefone',
        'bairro',
        'cidade',
        'estado',
        'cep',
        'email',
        'senha',
        'pergunta1',
        'pergunta2',
        'pergunta3',
        'pergunta4'
    ];

    public function frequencia() {
        return $this->hasMany(Frequencia::class);
    }

    public function perfil() {
        return $this->hasOne(Perfil::class);
    }

}
