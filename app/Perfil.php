<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{

    protected $fillable = [
        'perfil',
        'id_usuario'
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }

}
