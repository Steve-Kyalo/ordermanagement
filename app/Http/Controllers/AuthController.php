<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    function index(Request $request)
    {
        //\Log::info($request->input());
        if(!$request->access_token)
        {
            return redirect('https://hosting.wialon.com/login.html?css_url=http://localhost:8000/wialon_auth_css/login.css&redirect_uri='.route('auth.index'));
        }
        //return 'hello2';

        ///Get Data
        $token = $request->access_token;
        // Curl more userDetails
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://hst-api.wialon.com/wialon/ajax.html?svc=token/login&params=%7B%22token%22:%22'.$token.'%22,%22fl%22:1%7D',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        ));

        $response = json_decode(curl_exec($curl));

        curl_close($curl);
        $username = $response->au;

        // print_r($rep);
        //Save/ Update user session/ data
        if(User::where("name", $username)->exists())
        {
            User::where("name", $username)->update([
                "access_token" => $token,
                "eid" => $response->eid,
                "password" => Hash::make($token)
            ]);
        }
        else
        {
            $user = new User();
            $user->name = $username;
            $user->access_token = $token;
            $user->eid = $response->eid;
            $user->password = Hash::make($token);
            $user->save();
        }

        if (Auth::guard('web')->attempt(['name' => $username, 'password' => $token], 1)) 
        {
            $request->session()->regenerate();            
            return redirect()->intended(route('dashboard'));
        }
        else
        {
            return redirect('https://hosting.wialon.com/login.html?redirect_uri='.route('auth.index'));
        }
    }

    function home()
    {
        return view('home');
    }
}
