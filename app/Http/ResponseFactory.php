<?php

namespace App\Http;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Laravel\Lumen\Http\ResponseFactory as Response;
use Zend\Config\Config;
use Zend\Config\Writer\Xml;

class ResponseFactory extends Response
{
    public function make($content = '', $status = 200, array $headers = [])
    {
        /** @var Request $request */
        $request = app('request');
        /* Verificando se o cliente passou no 'Header' algum 'Accept' */
        $acceptHeader = $request->header('accept');
        if($acceptHeader == '*/*'){
            /* Caso não tenhamos nenhum header */
            //return parent::make($this->getXML($content),$status, $headers);
            return $result = $this->json($content, $status, $headers);
        }
        $result = "";
        switch ($acceptHeader){
            /* Verificando o 'accept' do header */
            case 'application/json':
                $result = $this->json($content, $status, $headers);
                break;
            case 'application/xml':
                $result = parent::make($this->getXML($content),$status, $headers);
                break;
        }
        if($result == ""){
            return $result = $this->json($content, $status, $headers);
        }
        return $result;
    }

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