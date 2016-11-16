<?php

namespace App\Http\Controllers;

use App\Usuario;
use App\Frequencia;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use App\Http\ResponseFactory;

class FrequenciasController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function index($usuarioId)
    {
         if(!($usuario = Usuario::find($usuarioId))){
            throw new ModelNotFoundException("Usuario requisitado não existe");
        }
        
        return son_response()->make(Frequencia::where('id_usuario', $usuarioId)->get());
    }

     public function show($id)
    {
        
        if(!($usuario = Usuario::find($id))){
            throw new ModelNotFoundException("Usuario requisitado não existe");
        }
        return $usuario;
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nome' => 'required',
            'telefone' => 'required',
            'bairro' => 'required',
        ]);

        Usuario::create($request->all());
        return son_response()->make($usuario,201);
        
    }

    public function update(Request $request,$id)
    {
        if(!($usuario = Usuario::find($id))){
            throw new ModelNotFoundException("Usuario requisitado não existe");
        }

        $this->validate($request, [
            'nome' => 'required',
            'telefone' => 'required',
            'bairro' => 'required',
        ]);

        $usuario->fill($request->all());
        $usuario->save();
        return son_response()->make($usuario,200);
    }

    public function destroy($id)
    {
        if(!($usuario = Usuario::find($id))){
            throw new ModelNotFoundException("Usuario requisitado não existe");
        }
        $usuario->delete();
        return son_response()->make("",204);
    }

    
}
