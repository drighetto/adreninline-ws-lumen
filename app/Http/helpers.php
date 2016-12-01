<?php

namespace App\Http;

//use Laravel\Lumen\Http\ResponseFactory;
//use App\Http\ResponseFactory;

//class Helpers {

    function son_response($content = '', $status = 200, array $headers = [])
    {
        $factory = new \App\Http\ResponseFactory();
        
        $headers = ['Access-Control-Allow-Origin' => '*',
            'Access-Control-Allow-Methods' => 'POST, GET, OPTIONS, PUT, DELETE',
            'Access-Control-Allow-Headers' => 'Content-Type, Authorization, Accept, X-Requested-With, Origin',
            'Access-Control-Allow-Credentials' => 'true'];
            
            
        if (func_num_args() === 0) {
            return $factory;
        }

        return $factory->make($content, $status, $headers);
    }
//}