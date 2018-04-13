<?php

namespace SimulatorOperation\Http\Controllers;

use SimulatorOperation\MeteorologicalPhenomenon;
use Illuminate\Http\Request;
use Lang;

class MeteorologicalPhenomenonController extends Controller
{
    private $menu = 'catalog/meteorological_phenomenon';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $meteorologicalPhenomenons = MeteorologicalPhenomenon::All();
        return view('catalogs.meteorologicalPhenomenon.index',compact('meteorologicalPhenomenons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = getEnumValues('meteorological_phenomenons','type');
        $windDirections = $this->formatedArray((getEnumValues('meteorological_phenomenons','wind_direction')));
        $seaStates = $this->formatedArray((getEnumValues('meteorological_phenomenons','sea_state')));
        $cloudTypes = $this->formatedArray((getEnumValues('meteorological_phenomenons','cloud_type')));
        $windVelocities = $this->formatedArray((getEnumValues('meteorological_phenomenons','wind_velocity')));
        return view('catalogs.meteorologicalPhenomenon.create',['types' => $types,
                                                                'windDirections' => $windDirections,
                                                                'seaStates' => $seaStates,
                                                                'cloudTypes' => $cloudTypes,
                                                                'windVelocities' => $windVelocities]);
    }                       

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        MeteorologicalPhenomenon::create($request->except('_token'));
        $message['type'] = 'success';
        $message['status'] = Lang::get('messages.success_meteorological_phenomenon');
        return redirect($this->menu)->with('message',$message);
    }

    /**
     * Display the specified resource.
     *
     * @param  \SimulatorOperation\MeteorologicalPhenomenon  $meteorologicalPhenomenon
     * @return \Illuminate\Http\Response
     */
    public function show(MeteorologicalPhenomenon $meteorologicalPhenomenon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \SimulatorOperation\MeteorologicalPhenomenon  $meteorologicalPhenomenon
     * @return \Illuminate\Http\Response
     */
    public function edit(MeteorologicalPhenomenon $meteorologicalPhenomenon)
    {
        $types = getEnumValues('meteorological_phenomenons','type');
        $windDirections = $this->formatedArray((getEnumValues('meteorological_phenomenons','wind_direction')));
        $seaStates = $this->formatedArray((getEnumValues('meteorological_phenomenons','sea_state')));
        $cloudTypes = $this->formatedArray((getEnumValues('meteorological_phenomenons','cloud_type')));
        $windVelocities = $this->formatedArray((getEnumValues('meteorological_phenomenons','wind_velocity')));
        return view('catalogs.meteorologicalPhenomenon.edit',['meteorologicalPhenomenon' => $meteorologicalPhenomenon,'types' => $types,'windDirections' => $windDirections,'seaStates' => $seaStates,'cloudTypes' => $cloudTypes,'windVelocities' => $windVelocities]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \SimulatorOperation\MeteorologicalPhenomenon  $meteorologicalPhenomenon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MeteorologicalPhenomenon $meteorologicalPhenomenon)
    {
        $meteorologicalPhenomenon->fill($request->except(['_token']));
        $meteorologicalPhenomenon->save();
        $message['type'] = 'success';
        $message['status'] = Lang::get('messages.success_meteorological_phenomenon');
        return redirect($this->menu)->with('message',$message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \SimulatorOperation\MeteorologicalPhenomenon  $meteorologicalPhenomenon
     * @return \Illuminate\Http\Response
     */
    public function destroy(MeteorologicalPhenomenon $meteorologicalPhenomenon)
    {
        $meteorologicalPhenomenon->delete();
        $message['type'] = 'success';
        $message['status'] = Lang::get('messages.remove_meteorological_phenomenon');
        return redirect($this->menu)->with('message',$message);
    }

    private function formatedArray($array){
        foreach ($array as $key => $value) {
            $parameters = explode("?", $key);
            $forKey = str_replace(' ', '',implode("", $parameters));
            $forValue = str_replace('_', ' ',implode(" ", $parameters));
            unset($array[$key]);
            $array[preg_replace("[\s+]","", $key)] = $forValue;
        }
        return $array;
    }
}
