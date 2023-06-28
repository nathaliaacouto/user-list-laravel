<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class ControllerConsumes extends Controller
{
    function getData() {
        $client = new \GuzzleHttp\Client(['verify' => false]);
        $res = $client->request('GET', 'https://run.mocky.io/v3/ce47ee53-6531-4821-a6f6-71a188eaaee0', [
            'auth' => ['user', 'pass']
        ]);

        echo $res->getBody();
    }
}
