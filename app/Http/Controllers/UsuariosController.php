<?php

namespace App\Http\Controllers;

use App\Usuario;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use App\Http\ResponseFactory;
//use App\Http\Helpers;

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
        //$usuario =  Usuario::all()->get();
        return son_response()->make(Usuario::all());
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

    /* Login */
    public function login($email, $senha)
    {
        //Retorna todos os clientes com JSON
        //return Usuario::find($id);
        if(!($usuario = Usuario::where('email', $email)->get())){
            throw new ModelNotFoundException("Usuario requisitado não existe");
        }
        //$result = Usuario::where('email', $email)->get()->first();
        $result = Usuario::where('email', $email)->where('senha',$senha)->get()->first();
        if(!$result){
            throw new ModelNotFoundException("Usuario requisitado não existe");
        }
        return son_response()->make($result);
        //return $usuario;
    }

    public function store(Request $request)
    {
        /*
        $this->validate($request, [
            'nome' => 'required',
            'sexo' => 'required',
            'telefone' => 'required',
            'bairro' => 'required',
            'cidade' => 'required',
            'estado' => 'required',
            'cep' => 'required',
            'email' => 'required',
            'senha' => 'required',
            'pergunta1' => 'required',
            'pergunta2' => 'required',
            'pergunta3' => 'required',
            'pergunta4'=> 'required'
        ]);
        */

        $usuario = Usuario::create($request->all());
        //$usuario = Usuario::create($request->all());
        //return response()->json($usuario,201);
        return son_response()->make($usuario,201);
    }

    public function update(Request $request,$id)
    {
        if(!($usuario = Usuario::find($id))){
            throw new ModelNotFoundException("Usuario requisitado não existe");
        }
        /*
        $this->validate($request, [
            'nome' => 'required',
            'telefone' => 'required',
            'bairro' => 'required',
        ]);
        */

        $usuario->fill($request->all());
        $usuario->save();
        return son_response()->make($usuario,200);
        //return response()->json(usuario,200);
    }

    public function destroy($id)
    {
        if(!($usuario = Usuario::find($id))){
            throw new ModelNotFoundException("Usuario requisitado não existe");
        }
        $usuario->delete();
        return son_response()->make("",204);
        //return response()->json("",204); //DELETE
    }

    //
}
