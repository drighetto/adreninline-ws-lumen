<?php

namespace App\Http\Controllers;

use App\Usuario;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class UsuariosController extends Controller
{

    public function __construct()
    {
        //
    }
    
    public function index()
    {
        //Retorna todos os clientes com JSON
        return Usuario::all();
    }

     public function show($id)
    {
        //Retorna todos os clientes com JSON
        return Usuario::find($id);
    }

    //
}
