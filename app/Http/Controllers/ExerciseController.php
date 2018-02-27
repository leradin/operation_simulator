<?php

namespace SimulatorOperation\Http\Controllers;

use SimulatorOperation\Exercise;
use SimulatorOperation\Stage;
use Illuminate\Http\Request;

class ExerciseController extends Controller
{
    private $menu = 'exercise';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $exercises = Exercise::All();
        return view('exercise.index',['exercises' => $exercises]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $stages = Stage::All();
        //$client = new \GuzzleHttp\Client(['base_uri' => env('URI_WEBSERVICE')]);
        /*$request = $client->get('users');
        $response = $request->getBody();*/
        //$client->request('POST', 'login', ['auth' => ['enrollment' =>'A-12345678',
        //    'password' => '123456']]);
        /*$res = $client->post(env('URI_WEBSERVICE').'users', [
            'auth' => ['A-12345678', '123456']
            
        ]);*/
        //echo $res->getStatusCode();
        $client = new \GuzzleHttp\Client([
            // Base URI is used with relative requests
            'base_uri' => 'https://jsonplaceholder.typicode.com/',
            // You can set any number of default request options.
            'timeout'  => 2.0,
        ]);
        //$guzzle = new \GuzzleHttp\Client;

        $response = $client->request('GET','posts');
        return json_decode($response->getBody()->getContents());
        //$content = json_decode((string) $response->getBody()->getContents(), true);
        //dd($content);
        /*$guzzle = new \GuzzleHttp\Client;

        $response = $guzzle->get(env('URI_WEBSERVICE').'users', [
            'form_params' => [
                'grant_type' => 'password',
                'client_id' => '5',
                'client_secret' => '8ImsMDfsLinjlv6IzEm9AYMXN8mdl8xkZ18XGGkd',
                'scope' => '*'
            ],
        ]);

        dd(json_decode((string) $response->getBody(), true));*/
        //dd($response->getBody());
        return view('exercise.create',['stages' => $stages]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \SimulatorOperation\Exercise  $exercise
     * @return \Illuminate\Http\Response
     */
    public function show(Exercise $exercise)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \SimulatorOperation\Exercise  $exercise
     * @return \Illuminate\Http\Response
     */
    public function edit(Exercise $exercise)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \SimulatorOperation\Exercise  $exercise
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Exercise $exercise)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \SimulatorOperation\Exercise  $exercise
     * @return \Illuminate\Http\Response
     */
    public function destroy(Exercise $exercise)
    {
        //
    }
}
