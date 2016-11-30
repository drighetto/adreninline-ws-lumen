<?php

namespace App\Http\Controllers;

use App\Mensagem;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use App\Http\ResponseFactory;
//use App\Http\Helpers;

class MensagensController extends Controller
{

    public function __construct()
    {
        //
    }
    
    public function index()
    {
        
        return son_response()->make(Mensagem::all());
    }

     public function show($id)
    {
        if(!($mensagem = Mensagem::find($id))){
            throw new ModelNotFoundException("Mensagem requisitada não existe");
        }
        return $mensagem;
    }

    public function store(Request $request)
    {

        $mensagem = Mensagem::create($request->all());
        return son_response()->make($mensagem,201);
    }

    public function update(Request $request,$id)
    {
        if(!($mensagem = Mensagem::find($id))){
            throw new ModelNotFoundException("Mensagem requisitada não existe");
        }
        
        $mensagem->fill($request->all());
        $mensagem->save();
        return son_response()->make($mensagem,200);
    }

    public function destroy($id)
    {
        if(!($mensagem = Mensagem::find($id))){
            throw new ModelNotFoundException("Mensagem requisitada não existe");
        }
        $mensagem->delete();
        return son_response()->make("",204);
    }

}
