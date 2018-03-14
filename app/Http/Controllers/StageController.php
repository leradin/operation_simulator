<?php

namespace SimulatorOperation\Http\Controllers;

use SimulatorOperation\Stage;
use SimulatorOperation\Cabin;
use SimulatorOperation\Computer;
use SimulatorOperation\Unit;
use Illuminate\Http\Request;
use Lang;

class StageController extends Controller
{
    private $menu = 'stage';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stages = Stage::All();
        return view('stage.index',compact('stages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cabins = Cabin::get()->pluck('name','id');
        $units = Unit::get()->pluck('name_with_numeral','id');
        return view('stage.create',['cabins' => $cabins,
                                            'units' => $units]);
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
        $stage = Stage::create($request->except('_token','cabin_ids'));
        foreach ($request->cabin_ids as $cabinId) {
            $parameters = explode("&", $request->$cabinId);
            $unitId = explode('=',$parameters[8])[1];
            $course = explode('=',$parameters[1])[1];
            $speed = explode('=',$parameters[2])[1];
            $altitude = explode('=',$parameters[3])[1];
            $initPosition = str_replace("%2C", ",",explode('=',$parameters[5])[1]);
            $lightsType = explode('=',$parameters[6])[1];
            $computers = explode('=',$parameters[7])[1];
            $computers = explode(',', $computers);
            $stage->cabins()->attach($cabinId,['unit_id' => $unitId,
                                                'course' => $course, 
                                                'speed' => $speed, 
                                                'altitude' => $altitude, 
                                                'init_position' => $initPosition,
                                                'lights_type' => $lightsType]);

            foreach ($computers as $computer) {
                $stage->computers()->attach($computer,['cabin_id' => $cabinId]);
            }
        }

        $message['type'] = 'success';
        $message['status'] = Lang::get('messages.success_stage');
        return redirect($this->menu)->with('message',$message);
    }

    /**
     * Display the specified resource.
     *
     * @param  \SimulatorOperation\Stage  $stage
     * @return \Illuminate\Http\Response
     */
    public function show(Stage $stage)
    {
        $geojson = array('type' => 'FeatureCollection', 'features' => array()) ;
        foreach($stage->cabins as $cabin)
        {
            $computers = $stage->computers()->wherePivot('cabin_id',$cabin->id)->get();/*->whereHas('cabin_id', function ($q) use ($cabin) {
                $q->where('cabin_id', $cabin->id);
            })->get();*/
            //$computers = getComputersByCabin($stage,$cabin->id);
            $positionInit = explode(',',$cabin->pivot->init_position);
            $feature = array( 'type' => 'Feature', 
                              'geometry' => array(
                                            'type' => 'Point',
                                            'coordinates' => array( (float)$positionInit[1], (float)$positionInit[0])),
                                            'properties' => array(
                                                        'name' => $cabin['name'],
                                                        'show_on_map'=>'true',
                                                        //'comment' => 'aaaa',
                                                        'unitName' => Unit::find($cabin->pivot->unit_id),
                                                        'course' => $cabin->pivot->course,
                                                        'speed' => $cabin->pivot->speed,
                                                        'lights' => $cabin->pivot->lights_type,
                                                        'computers' => $computers
                                                ));
            array_push($geojson['features'], $feature);
        }

        return response()->json($geojson);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \SimulatorOperation\Stage  $stage
     * @return \Illuminate\Http\Response
     */
    public function edit(Stage $stage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \SimulatorOperation\Stage  $stage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Stage $stage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \SimulatorOperation\Stage  $stage
     * @return \Illuminate\Http\Response
     */
    public function destroy(Stage $stage)
    {
        $stage->delete();
        $message['type'] = 'success';
        $message['status'] = Lang::get('messages.remove_stage');
        return redirect($this->menu)->with('message',$message);
    }
}
