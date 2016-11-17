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
         if(!($usuario = Frequencia::find($usuarioId))){
            throw new ModelNotFoundException("Usuario requisitado não existe");
        }
        
        return son_response()->make(Frequencia::where('id_usuario', $usuarioId)->get());
    }

     public function show($id, $usuarioId)
    {
        
        if(!(Usuario::find($usuarioId))){
            throw new ModelNotFoundException("Usuario requisitado não existe");
        }

        if(!(Frequencia::find($id))){
            throw new ModelNotFoundException("Frequencia requisitada não existe");
        }
        $result = Frequencia::where('id_usuario', $usuarioId)->where('id',$id)->get()->first();
        return son_response()->make($result);
    }

    public function store(Request $request, $usuarioId)
    {
        if(!($usuario = Usuario::find($usuarioId))){
            throw new ModelNotFoundException("Usuario requisitado não existe");
        }

        $this->validate($request, [
            'pagina' => 'required'
        ]);

        $frequencias = Frequencia::create($request->all());
        //$frequencias = $usuario->frequencia()->create($request->all());
        return son_response()->make($frequencias,201);
        
    }

    public function update(Request $request,$id, $usuarioId)
    {
        if(!($usuario = Usuario::find($usuarioId))){
            throw new ModelNotFoundException("Usuario requisitado não existe");
        }

        if(!($frequencia = Frequencia::find($id))){
            throw new ModelNotFoundException("Frequencia requisitada não existe");
        }

        $this->validate($request, [
            'pagina' => 'required'
        ]);

        $frequencia = Frequencia::where('id_usuario', $usuarioId)->where('id',$id)->get()->first();
        
        if(!$frequencia){
            throw new ModelNotFoundException("Frequencia requisitada não existe");
        }
        $frequencia->fill($request->all());
        $frequencia->save();
        return son_response()->make($frequencia,200);
    }

    public function destroy($id, $usuarioId)
    {
        if(!($usuario = Usuario::find($usuarioId))){
            throw new ModelNotFoundException("Usuario requisitado não existe");
        }

        if(!($frequencia = Frequencia::find($id))){
            throw new ModelNotFoundException("Frequencia requisitada não existe");
        }

        $frequencia = Frequencia::where('id_usuario', $usuarioId)->where('id',$id)->get()->first();
        
        if(!$frequencia){
            throw new ModelNotFoundException("Frequencia requisitada não existe");
        }
        $frequencia->delete();
        return son_response()->make("",204);
    }

    
}
