<?php

namespace App\Http\Controllers;

use App\Evento;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use App\Http\ResponseFactory;
//use App\Http\Helpers;

class EventosController extends Controller
{

    public function __construct()
    {
        //
    }
    
    public function index()
    {
        
        return son_response()->make(Evento::all());
    }

     public function show($id)
    {
        //Retorna todos os clientes com JSON
        //return Usuario::find($id);
        if(!($evento = Evento::find($id))){
            throw new ModelNotFoundException("Evento requisitado não existe");
        }
        return $evento;
    }

    public function store(Request $request)
    {

        $evento = Evento::create($request->all());
        //$usuario = Usuario::create($request->all());
        return son_response()->make($evento,201);
        //return response()->json("[]",201);
    }

    public function update(Request $request,$id)
    {
        if(!($evento = Evento::find($id))){
            throw new ModelNotFoundException("Evento requisitado não existe");
        }
        /*
        $this->validate($request, [
            'nome' => 'required',
            'telefone' => 'required',
            'bairro' => 'required',
        ]);
        */

        $evento->fill($request->all());
        $evento->save();
        return son_response()->make($evento,200);
        //return response()->json(usuario,200);
    }

    public function destroy($id)
    {
        if(!($evento = Evento::find($id))){
            throw new ModelNotFoundException("Evento requisitado não existe");
        }
        $evento->delete();
        return son_response()->make("",204);
        //return response()->json("",204); //DELETE
    }

    //
}
