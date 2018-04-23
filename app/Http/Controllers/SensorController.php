<?php

namespace SimulatorOperation\Http\Controllers;

use SimulatorOperation\Sensor;
use Illuminate\Http\Request;
use Lang;

class SensorController extends Controller
{
    private $menu = 'catalog/sensor';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sensors = Sensor::All();
        return view('catalogs.sensor.index',compact('sensors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sensorTypes = getEnumValues('sensors','sensor_type');
        $sensorScopes = getEnumValues('sensors','sensor_scope');
        return view('catalogs.sensor.create',['sensorTypes' => $sensorTypes,'sensorScopes' => $sensorScopes]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Sensor::create($request->except('_token'));
        $message['type'] = 'success';
        $message['status'] = Lang::get('messages.success_sensor');
        return redirect($this->menu)->with('message',$message);
    }

    /**
     * Display the specified resource.
     *
     * @param  \SimulatorOperation\Sensor  $sensor
     * @return \Illuminate\Http\Response
     */
    public function show(Sensor $sensor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \SimulatorOperation\Sensor  $sensor
     * @return \Illuminate\Http\Response
     */
    public function edit(Sensor $sensor)
    {
        $sensorTypes = getEnumValues('sensors','sensor_type');
        $sensorScopes = getEnumValues('sensors','sensor_scope');
        return view('catalogs.sensor.edit',['sensor' => $sensor,'sensorTypes' => $sensorTypes,'sensorScopes' => $sensorScopes]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \SimulatorOperation\Sensor  $sensor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sensor $sensor)
    {
        $sensor->fill($request->except(['_token']));
        $sensor->save();
        $message['type'] = 'success';
        $message['status'] = Lang::get('messages.success_sensor');
        return redirect($this->menu)->with('message',$message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \SimulatorOperation\Sensor  $sensor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sensor $sensor)
    {
        if(count($sensor->units)){
            $message['type'] = 'error';
            $message['status'] = Lang::get('messages.not_remove_sensor');
            return redirect($this->menu)->with('message',$message);
        }

        $sensor->delete();
        $message['type'] = 'success';
        $message['status'] = Lang::get('messages.remove_sensor');
        return redirect($this->menu)->with('message',$message);
    }
}
