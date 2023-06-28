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

        ?>

        <table>
        <thead>
            <th>id</th>
            <th>name</th>
            <th>age</th>
            <th>email</th>
        </thead>
        <tbody>
            <?php 
            /* o objeto tem um atributo users, que é um array com 
            outros objetos, que são os usuários */ 
            foreach($objectData->users as $user) { 
            ?>
            <tr>
                <td><?php echo $user->id ?></td> <!-- acessando o dado id do usuário -->
                <td><?php echo $user->name ?></td>
                <td><?php echo $user->age ?></td>
                <td><?php echo $user->email ?></td>
            </tr>
            <?php }; ?>
        </tbody>
        </table>

        <?php
        
        //return view("stringData", ["stringData" => json_decode($stringData)]);
    }
}
