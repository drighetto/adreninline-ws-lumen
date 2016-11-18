<?php

namespace App\Soap;

use App\Usuario;
//use Illuminate\Database\Eloquent\ModelNotFoundException;
//use Illuminate\Http\Request;
use App\Http\ResponseFactory;
//use App\Http\Helpers;
use Illuminate\Contracts\Support\Arrayable;
use Zend\Config\Config;
use Zend\Config\Writer\Xml;
use App\Types\UsuarioType;

class UsuariosSoapController
{

    public function __construct()
    {
        //
    }
    /**
    * @return string
    */
    public function listAll()
    {
        //Retorna todos os clientes com JSON
        //return Usuario::all();
        //return son_response()->make(Usuario::all());
        //return Usuario::all();
        //return son_response()->make(Usuario::all());
        return $this->getXML(Usuario::all());
    }
/*
    public function show($id)
    {
        
        if(!($usuario = Usuario::find($id))){
            throw new ModelNotFoundException("Usuario requisitado não existe");
        }
        return $usuario;
    }
*/
    /**
    * @param \App\Types\UsuarioType $type
    * @return string
    */
    public function create(UsuarioType $type)
    {
        $data = [
            'nome'=> $type->nome,
            'bairro'=> $type->bairro,
            'cidade'=> $type->cidade,
        ];
        $usuario = Usuario::create($data);
        return $this->getXML($usuario);
    }

/*
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
        //return response()->json(usuario,200);
    }
*/
/*
    public function destroy($id)
    {
        if(!($usuario = Usuario::find($id))){
            throw new ModelNotFoundException("Usuario requisitado não existe");
        }
        $usuario->delete();
        return son_response()->make("",204);
        //return response()->json("",204); //DELETE
    }
*/
    //

    protected function getXML($data)
    {
        /* Serializando o XML*/
        if($data instanceof Arrayable){
            $data = $data->toArray();
        }
        /* 'TRUE' significa que permite modificações */
        $config = new Config(['result' => $data],true);
        $xmlWriter = new Xml();
        //Devolve o XML serializado
        return $xmlWriter->toString($config);
    }
}
