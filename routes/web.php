<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

use Zend\Soap\Client;
use Zend\Soap\Server;

$app->get('/', function () use ($app) {
    return $app->version();
});

//Endpoint

/* Criando uma API */

$app->group([
    /* Nesse grupo de rotas vamos criar alguns recursos do nosso WEB-SERVICE */
    /*Recurso: '/usuarios' */
    'prefix'=>'api/usuarios',
    //'namespace'=>'App\Http\Controllers'
], function() use ($app){
    //Metodo GET do HTTP e vamos passar o Controller que vai executar essa acao
    $app->get('','UsuariosController@index'); //Coleção de informações
    $app->get('{id}','UsuariosController@show'); // Vamos trabalhar com elementos
    $app->post('', 'UsuariosController@store');
    $app->put('{id}', 'UsuariosController@update');
    $app->delete('{id}', 'UsuariosController@destroy');
});

/* Para testar a nossa API vamos usar o POSTMAN */

$app->group([
    /* Nesse grupo de rotas vamos criar alguns recursos do nosso WEB-SERVICE */
    /*Recurso: '/usuarios' */
    'prefix'=>'api/usuarios/{usuario}/frequencias',
    //'namespace'=>'App\Http\Controllers'
], function() use ($app){
    //Metodo GET do HTTP e vamos passar o Controller que vai executar essa acao
    $app->get('','FrequenciasController@index'); //Coleção de informações
    $app->get('{id}','FrequenciasController@show'); // Vamos trabalhar com elementos
    $app->post('', 'FrequenciasController@store');
    $app->put('{id}', 'FrequenciasController@update');
    $app->delete('{id}', 'FrequenciasController@destroy');
});

/* Trabalhando com SOAP - http://portal.tcu.gov.br/webservices-tcu/ */

$app->get('tcu', function(){
    //Criando um Cliente-SOAP para consumir o Web SERVICE
    $client = new \Zend\Soap\Client('http://contas.tcu.gov.br/debito/CalculoDebito?wsdl');
    echo "Informações do Servidor:";
    print_r($client->getOptions());
    echo "Funções:";
    print_r($client->getFunctions());
    echo "Tipos:";
    print_r($client->getTypes());
    echo "Resultados:";
    print_r($client->obterSaldoAtualizado([
        'parcelas'=>[
            'parcela'=>[
                'data'=>'1995-01-01',
                'tipo'=>'D',
                'valor'=> 3500
            ]
        ],
        'aplicaJuros'=>true,
        'dataAtualizacao'=>'2016-08-08'
    ]));
});

