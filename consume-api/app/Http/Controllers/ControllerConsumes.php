<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7;
use GuzzleHttp\Stream\Stream;

class ControllerConsumes extends Controller
{
    function getData() {
        /*cria um novo cliente guzzle, precisa da verificação em falso, se não, o laravel 
        não consegue acessar a url */
        $client = new \GuzzleHttp\Client(['verify' => false]);
        
        /* faz um get na url, acessando os dados */
        $res = $client->request('GET', 'https://run.mocky.io/v3/ce47ee53-6531-4821-a6f6-71a188eaaee0', ['auth' => ['user', 'pass']]);
        $stringData = $res->getBody()->getContents();
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
            <?php foreach($objectData->users as $user) { ?>
            <tr>
                <td><?php echo $user->id ?></td>
                <td><?php echo $user->name ?></td>
                <td><?php echo $user->age ?></td>
                <td><?php echo $user->email ?></td>
            </tr>
            <?php }; ?>
        </tbody>
        </table>

        <?php
        
        //return view("stringData", ["stringData" => json_decode($stringData)]);

        /* pega todas as informações do body da url 
        $data = $res->getBody(); //objeto

        //$res = json_decode($res);

        $stringData = $res->getBody()->getContents();
        //var_dump($stringData);
        $data2 = json_decode($stringData);
   
        return view("data2",["data2" => $data2]); */

        /*

        $var2 = $var[16] . $var[17];
        $id = $var[21];
        $var = str_replace(" ", "", $var);
        $var = str_replace("[", "", $var);
        $ids = ["", ""];
        //echo $data;
        if (mb_strpos($var, 'id":') !== false) {
            //echo mb_strpos($var, 'id":');
            $ids = $var[18];
        }
        else {
            echo ("bla");
        }

        $pessoas = explode("}", $var);

        for ($i = 0; $i < 9; $i++) {
            if (mb_strpos($pessoas[$i], 'id":') !== false) {
                $var3 = mb_strpos($pessoas[$i], 'id":');
                echo (int)$pessoas[$i][$var3+4], "\n";
                //echo $pessoas[$i][$var3];
                $pessoas[$i][$var3] = "a";
            }
        }
        
        //echo $var[12];
        */

    }
}
