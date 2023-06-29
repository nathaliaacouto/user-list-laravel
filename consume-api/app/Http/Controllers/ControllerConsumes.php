<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Models\ConsumesAPI;
use Illuminate\Support\Facades\DB;


class ControllerConsumes extends Controller
{
    public function getData() {
        /*cria um novo cliente guzzle, precisa da verificação em falso, se não, o laravel 
        não consegue acessar a url */
        $client = new \GuzzleHttp\Client(['verify' => false]);
        
        // faz um get na url, acessando os dados 
        $res = $client->request('GET', 'https://run.mocky.io/v3/ce47ee53-6531-4821-a6f6-71a188eaaee0', ['auth' => ['user', 'pass']]);

        // pega os dados do body e transforma em uma string 
        $stringData = $res->getBody()->getContents();

        // transforma a string em um objeto json 
        $objectData = json_decode($stringData);

        // apaga os dados da tabela consumes_a_p_i_s
        DB::table('consumes_a_p_i_s')->truncate();

        // $objectData->users acessa o atributo users, onde estão os dados dos usuários
        foreach ($objectData->users as $u) {
            $consumesAPI = new ConsumesAPI(); // nova instância da classe ConsumesAPI
            $consumesAPI->id = $u->id; // acessa o id do usuário e coloca no atributo id da instância
            $consumesAPI->name = $u->name; 
            $consumesAPI->age = $u->age; 
            $consumesAPI->email = $u->email; 
            $consumesAPI->save(); // salva a atual instância na tabela
        }

        // leva para a view "userList" em que está o código html, já com a paginação
        return view("userList", ["data" => DB::table('consumes_a_p_i_s')->paginate(10)]);
    }
}
