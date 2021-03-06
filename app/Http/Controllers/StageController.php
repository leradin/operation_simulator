<?php

namespace SimulatorOperation\Http\Controllers;

use SimulatorOperation\Stage;
use SimulatorOperation\Cabin;
use SimulatorOperation\Computer;
use SimulatorOperation\Unit;
use SimulatorOperation\UnitType;
use SimulatorOperation\Track;
use SimulatorOperation\MeteorologicalPhenomenon;
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
        $unitsTypes = UnitType::with('units')->get();//get()->pluck('name_with_numeral','id');
        $tracks = Track::select('name','id','sidc')->get();
        $meteorologicalPhenomenons = MeteorologicalPhenomenon::all();
        return view('stage.create',['cabins' => $cabins,
                                    'unitsTypes' => $unitsTypes,
                                    'tracks' => $tracks,
                                    'meteorologicalPhenomenons' => $meteorologicalPhenomenons]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $stage = Stage::create($request->except('_token','cabin_ids'));
        foreach ($request->cabin_ids as $cabinId) {
            $parameters = explode("&", $request->$cabinId);
            $unitId = explode('=',$parameters[9])[1];
            $course = explode('=',$parameters[2])[1];
            $speed = explode('=',$parameters[3])[1];
            $altitude = explode('=',$parameters[4])[1];
            $initPosition = str_replace("%2C", ",",explode('=',$parameters[6])[1]);
            $lightsType = explode('=',$parameters[7])[1];
            $computers = explode('=',$parameters[8])[1];
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


        if(isset($request->track_ids)){
          foreach ($request->track_ids as $trackId) {
              $parameters = explode("&",$request["t".$trackId]);
              //dd($parameters);
              $course = explode('=',$parameters[2])[1];
              $speed = explode('=',$parameters[3])[1];
              $altitude = explode('=',$parameters[4])[1];
              $initPosition = str_replace("%2C", ",",explode('=',$parameters[6])[1]);
              $objectType = explode('=',$parameters[7])[1];
              $trackSource = explode('=',$parameters[1])[1];

              $stage->tracks()->attach($trackId,['object_type' => $objectType,
                                                  'course' => $course, 
                                                  'speed' => $speed, 
                                                  'altitude' => $altitude, 
                                                  'init_position' => $initPosition,
                                                  'source' => $trackSource]);
          }
        }

        if(isset($request->meterological_phenomenon)){
          $parameters = explode("&",$request->meterological_phenomenon);
          $positionInit = str_replace("%2C", ",",explode('=',$parameters[1])[1]);
          $radio = explode('=',$parameters[2])[1];
          $stage->meteorologicalPhenomenons()->attach($request->meteorological_phenomenon_id,['radio' => $radio,
                                                                    'init_position' => $positionInit]);
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
        $data = array();
        $geojson = array('type' => 'FeatureCollection', 'features' => array()) ;
        foreach($stage->cabins as $cabin)
        {
            $computers = $stage->computers()->wherePivot('cabin_id',$cabin->id)->get();/*->whereHas('cabin_id', function ($q) use ($cabin) {
                $q->where('cabin_id', $cabin->id);
            })->get();
            //$computers = getComputersByCabin($stage,$cabin->id);*/
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
                                  'computers' => $computers,
                                  'type' => 0,
            ));
            array_push($geojson['features'], $feature);
        }

        $data['units'] = $geojson;

        $geojsonTrack = array('type' => 'FeatureCollection', 'features' => array()) ;
        foreach ($stage->tracks()->get() as $track) {
            $positionInit = explode(',',$track->pivot->init_position);
            $featureTrack = array( 'type' => 'Feature', 
                              'geometry' => array(
                                            'type' => 'Point',
                                            'coordinates' => array( (float)$positionInit[1], (float)$positionInit[0])),
                                            'properties' => array(
                                                        'name' => $track['name'],
                                                        'show_on_map'=>'true',
                                                        'course' => $track->pivot->course,
                                                        'speed' => $track->pivot->speed,
                                                        'altitude' => $track->pivot->altitude,
                                                        'type' => 1
                                                ));
            array_push($geojsonTrack['features'], $featureTrack);
        }
        $data['tracks'] = $geojsonTrack;

        $geojsonMeteorologicalPhenomenon = array('type' => 'FeatureCollection', 'features' => array()) ;
        foreach ($stage->meteorologicalPhenomenons()->get() as $meteorologicalPhenomenon) {
          $positionInit = explode(',',$meteorologicalPhenomenon->pivot->init_position);
          $featureMeteorologicalPhenomenon = array( 'type' => 'Feature', 
                                  'geometry' => array(
                                    'type' => 'Point',
                                    'coordinates' => array((float)$positionInit[1], (float)$positionInit[0]),
                                  ),
                                  'properties' => array(
                                    'name' => $meteorologicalPhenomenon['name'],
                                    'show_on_map'=>'true',
                                    'radius' => $meteorologicalPhenomenon->pivot->radio*1000,
                                    'type' => 2
                                  ));
          array_push($geojsonMeteorologicalPhenomenon['features'], $featureMeteorologicalPhenomenon);
        }
        $data['meteorologicalPhenomenons'] = $geojsonMeteorologicalPhenomenon;
        return response()->json($data);
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
      try{
        $stage->delete();
        $message['type'] = 'success';
        $message['status'] = Lang::get('messages.remove_stage');
        return redirect($this->menu)->with('message',$message);
      }catch(\Exception $error){
        $message['type'] = 'error';
        $message['status'] = Lang::get('messages.error_delete_stage');
        return redirect($this->menu)->with('message',$message);
      }
    }

    public function getStage($stageId){
        $stage = Stage::find($stageId);
        $data = array();
        foreach ($stage->cabins()->wherePivot('stage_id',$stageId)->get() as $cabin) {
            $computers = array();
            foreach ($stage->computers()->wherePivot('stage_id',$stageId)->wherePivot('cabin_id',$cabin->id)->get() as $computer) {
                array_push($computers,$computer);
            }
            $cabin['computers'] = $computers;
            array_push($data,$cabin);
        }
        return response()->json($data);
    }

    public function getStudents(){
        return callWs('students'); 
    }
}
