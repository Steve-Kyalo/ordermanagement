<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use Auth;

class UnitsController extends Controller
{
    public function show_units(Request $request){
        $client = new Client();
        $access_token = Auth::user()->eid;
        //return $access_token;
        $params='{"spec":{"itemsType":"avl_unit","propName":"sys_name","propValueMask":"*","sortType":"sys_name"},"force":1,"flags":13644935,"from":0,"to":4294967295}&svc=core/search_items&sid='.$access_token;
        //return $params;
        $apiUrl = "https://hst-api.wialon.com/wialon/ajax.html?params=$params";

        
        try {
            // Make a GET request to the API
            $response = $client->get($apiUrl);

            // Get the response body as an array
            $data = json_decode($response->getBody(), true);
            //return  $data;
            // Handle the retrieved data as needed (e.g., pass it to a view)
            return view('client.units', ['data' => $data]);
        } catch (\Exception $e) {
            // Handle any errors that occur during the API request
            return view('api_error', ['error' => $e->getMessage()]);
        }
    }
}