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

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        // $http = new \GuzzleHttp\Client;
        // $token='{"token":"7ff7dba86f73191b78f6a843c3f5b35eF1405B9689BF4073FDE8C3A4D2BCDB9484D9A07E"}';
        // $response = $http->post('https://hst-api.wialon.com/wialon/ajax.html?svc=token/login&params='.$token,[
            
        //     // 'query'=>[
        //     //     'email'=>'steve@app.com',
        //     //     'password'=>'12345678'
        //     // ]
        // ]);
        // $results=json_decode((string)$response->getBody(),true);
        // return dd($results);
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
            $curl = curl_init();

            curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://hst-api.wialon.com/wialon/ajax.html?svc=token%2Flogin&params={%22token%22%3A%227ff7dba86f73191b78f6a843c3f5b35eF1405B9689BF4073FDE8C3A4D2BCDB9484D9A07E%22}',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            ));

            $response = curl_exec($curl);

            // curl_close($curl);
            // echo $response;



        $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        curl_close($curl);
        
        if ($httpCode === 200 ) {
             $request->authenticate();
             $request->session()->regenerate();
             return redirect()->intended(route('dashboard', absolute: false));
        }
        else {
            return false;
        }

        //$request->authenticate();

        //$request->session()->regenerate();

        //return redirect()->intended(route('dashboard', absolute: false));
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
