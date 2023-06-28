<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class ControllerConsumes extends Controller
{
    function getData() {
        /*cria um novo cliente guzzle, precisa da verificação em falso, se não, o laravel 
        não consegue acessar a url */
        $client = new \GuzzleHttp\Client(['verify' => false]);
        
        /* faz um get na url, acessando os dados */
        $res = $client->request('GET', 'https://run.mocky.io/v3/ce47ee53-6531-4821-a6f6-71a188eaaee0', ['auth' => ['user', 'pass']]);

        /* pega os dados do body e transforma em uma string */
        $stringData = $res->getBody()->getContents();

        /* transforma a string em um objeto json */
        $objectData = json_decode($stringData);
        
        /* leva para a view "userList" em que está o código html */
        return view("userList", ["data" => $objectData]);
    }
}
