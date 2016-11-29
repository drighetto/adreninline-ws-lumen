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
    //$app->get('{email}/{senha}','UsuariosController@login'); // Vamos trabalhar com elementos
    $app->post('', 'UsuariosController@store');
    $app->put('{id}', 'UsuariosController@update');
    $app->delete('{id}', 'UsuariosController@destroy');
});

/* Eventos */
$app->group([
    'prefix'=>'api/eventos',
], function() use ($app){
    $app->get('','EventosController@index'); 
    $app->get('{id}','EventosController@show');
    $app->post('', 'EventosController@store');
    $app->put('{id}', 'EventosController@update');
    $app->delete('{id}', 'EventosController@destroy');
});

$app->group([
    'prefix'=>'api/usuarios/login/{email}/{senha}',
], function() use ($app){
    $app->get('','UsuariosController@login');
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

/* Configurando nosso servidor WSDL */
//$uri = 'http://son-soap.dev:8080'; //Servidor remoto SOAP do Apache
$uri = 'http://localhost:8080'; //Servidor remoto SOAP do Apache
$app->get('son-soap.wsdl', function() use($uri){
    $autoDiscover = new \Zend\Soap\AutoDiscover();
    /* Definir o endereço do SOAP */
    $autoDiscover->setUri("$uri/server");
    $autoDiscover->setServiceName('SONSOAP');
    /* A função 'addFunction()' faz com que todas as funções
    passadas para essa função apareção no WSDL */
    $autoDiscover->addFunction('soma');
    /* Gerando o WSDL */
    $autoDiscover->handle();
});

/* Criando um servidor SOAP */
$app->post('server', function() use($uri){
    $server = new \Zend\Soap\Server("$uri/son-soap.wsdl",[
        /* Desabilitando o Cache */
        'cache_wsdl'=> WSDL_CACHE_NONE
    ]);
    $server->setUri("$uri/server");
    return $server->setReturnResponse(true)->addFunction('soma')->handle();
});

/* Criando o SOAPClient para testar o nosso SOAPServer */

$app->get('soap-teste', function() use($uri){
    //Criando um Cliente-SOAP para consumir o Web SERVICE
    $client = new \Zend\Soap\Client("$uri/son-soap.wsdl",[
        'cache_wsdl'=> WSDL_CACHE_NONE
    ]);
    // Chamando a função do Server SOAP
    print_r($client->soma(2,5));
});

/* Criando Web Service SOAP para Usuários */
$uriUsuario = "$uri/usuario";
$app->get('usuario/son-soap.wsdl', function() use($uriUsuario){
    $autoDiscover = new \Zend\Soap\AutoDiscover();
    $autoDiscover->setUri("$uriUsuario/server");
    $autoDiscover->setServiceName('SONSOAP');
    //$autoDiscover->addFunction('soma');
    $autoDiscover->setClass(\App\Soap\UsuariosSoapController::class);
    $autoDiscover->handle();
});

$app->post('usuario/server', function() use($uriUsuario){
    $server = new \Zend\Soap\Server("$uriUsuario/son-soap.wsdl",[
        'cache_wsdl'=> WSDL_CACHE_NONE
    ]);
    $server->setUri("$uriUsuario/server");
    return $server->setReturnResponse(true)->addFunction('soma')->handle();
});

$app->get('soap-usuario', function() use($uriUsuario){
    $usuario = new \Zend\Soap\Client("$uriUsuario/son-soap.wsdl",[
        'cache_wsdl'=> WSDL_CACHE_NONE
    ]);
    //print_r($usuario->listAll());
    print_r($usuario->create([
        'nome'=> 'Danilo',
        'bairro'=> 'Santana',
        'cidade'=> 'Sao Paulo',
    ]));
});

/**
 * @param int $num1
 * @param int $num2
 * @return int
 */
function soma($num1, $num2){
 return $num1 + $num2;
};