<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Entities\Usuario;

class Frequencia extends Model
{

    protected $fillable = [
        'data',
        'pagina',
        'id_usuario'
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }

}
