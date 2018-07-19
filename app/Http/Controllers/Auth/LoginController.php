<?php

namespace SimulatorOperation\Http\Controllers\Auth;

use SimulatorOperation\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $headers = [
            'Content-Type'        => 'application/json',
        ];
        $client = new \GuzzleHttp\Client([
            'base_uri' => env('MAINTENANCE_SIMULATOR_URL'),
            'timeout'  => 10.0,
            'headers' => $headers
        ]);

        $response = $client->request('POST','oauth/token',
        [
            'form_params' => [
                'client_id' => $request->client_id, 
                'client_secret' => $request->client_secret, 
                'username' => $request->enrollment,
                'password' => $request->password,
                'grant_type' => 'password'
            ]
        ]);
       
        $object = json_decode($response->getBody()->getContents());
        //dd($object->access_token);
        session(['api_token' => $object->access_token]);
        return redirect('/');
    }

    public function logout(Request $request){         
        session()->forget('api_token');
        session()->invalidate();
        session()->flush();
        return redirect()->route('login');//redirect('/redirect');
    }
}
