<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        //$request->authenticate();
        //$request->session()->regenerate();
        //return redirect()->intended(route('dashboard', absolute: false));
        //\Log::info($request->input());
        if(!$request->access_token)
        {
            //return 'hello';
            return redirect('https://hosting.wialon.com/login.html?redirect_uri='.route('auth.index'));
           // return view('auth.login');
        }
        ///Get Data
        $token = $request->access_token;
        //return 'hello2';
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
                "password" => Hash::make($token)
            ]);
        }
        else
        {
            $user = new User();
            $user->name = $username;
            $user->access_token = $token;
            $user->password = Hash::make($token);
            $user->save();
        }

        if (Auth::guard('web')->attempt(['name' => $username, 'password' => $token], 1)) 
        {
            $request->session()->regenerate();            
            return redirect()->intended(route('dashboard', absolute: false));
        }
        else
        {
            return redirect('https://hosting.wialon.com/login.html?redirect_uri='.route('auth.index'));
            //return view('auth.login');
        }
    
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        //return redirect('/');
        return redirect('https://hosting.wialon.com/login.html?css_url=http://localhost:8000/wialon_auth_css/login.css&redirect_uri='.route('auth.index'));
    }
}
