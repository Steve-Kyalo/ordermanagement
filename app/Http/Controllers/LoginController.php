<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;

class LoginController extends Controller
{
    public function loginApi(Request $request){
        $client = new Client();
        $request = new Request('GET', 'https://hst-api.wialon.com/wialon/ajax.html?svc=token/login&params={"token":"7ff7dba86f73191b78f6a843c3f5b35eF1405B9689BF4073FDE8C3A4D2BCDB9484D9A07E"}');
        $res = $client->sendAsync($request)->wait();
        echo $res->getBody();
    }
}
