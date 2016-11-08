<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Usuario;

class Frequencia extends Model
{

    protected $fillable = [
        'pagina',
        'id_usuario'
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }

}
