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
        //return Usuario::all();
        //return son_response()->make(Usuario::all());
        return Usuario::all();
    }

     public function show($id)
    {
        //Retorna todos os clientes com JSON
        //return Usuario::find($id);
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
        //$usuario = Usuario::create($request->all());
        //return son_response()->make($usuario,201);
        return response()->json("[]",201);
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
        //return son_response()->make($usuario,200);
        return response()->json(usuario,200);
    }

    public function destroy($id)
    {
        if(!($usuario = Usuario::find($id))){
            throw new ModelNotFoundException("Usuario requisitado não existe");
        }
        $usuario->delete();
        //return son_response()->make("",204);
        return response()->json("",204); //DELETE
    }

    //
}
