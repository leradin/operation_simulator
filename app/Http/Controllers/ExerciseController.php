<?php

namespace SimulatorOperation\Http\Controllers;

use SimulatorOperation\Exercise;
use SimulatorOperation\Stage;
use SimulatorOperation\Unit;
use SimulatorOperation\MeteorologicalPhenomenon;
use SimulatorOperation\User;
use SimulatorOperation\Track;
use SimulatorOperation\Cabin;
use Illuminate\Http\Request;
use Lang;
use Validator;

class ExerciseController extends Controller
{
    private $menu = 'exercise';
    
    const TYPES_UNIT = array('superficie' => 1,
                            'aereo' => 2,
                            'terrestre_vehiculo' => 3,
                            'terrestre_pie' => 4);
    const PROPERTIES = [
                                  array(
                                    'type' => 'telegrafo',
                                    'model' => 'modelo A',
                                    'maxSpeed' => 20,
                                    'health' => 1,
                                    'position' => 'left'),
                                  array(
                                    'type' => 'telegrafo',
                                    'model' => 'modelo A',
                                    'maxSpeed' => 20,
                                    'health' => 1,
                                    'position' => 'right')
                          ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $exercises = Exercise::All();
        $executeExercise = Exercise::where('is_played',true)->first();
        return view('exercise.index',['exercises' => $exercises,
                                      'executeExercise' => $executeExercise]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $stages = Stage::All();
        $users = callWs('users');
        $meteorologicalPhenomenons = MeteorologicalPhenomenon::all();
        $track = new TrackController();
        $tracks = $track->getTracks(false);
        return view('exercise.create',['stages' => $stages,
                                        'users' => $users,
                                        'meteorologicalPhenomenons' => $meteorologicalPhenomenons,
                                        'tracks' => $tracks]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $validator = Validator::make(
        $request->all(), 
        ['stage_id' => 'required'],
        ['stage_id.required' => Lang::get('messages.required_stage')]
      );

      if ($validator->fails()) {
        return redirect('exercise/create')
              ->withErrors($validator)
              ->withInput();
      }

      $exercise = Exercise::create([
          'name'              => $request->name,
          'description'       => $request->description,
          'stage_id'          => $request->stage_id,
          'scheduled_date_time' => $request->scheduled_date_time,
          'supremed_date_time'=> $request->supremed_date_time,
          'user_id'         => $request->user_id,
          'is_played' => false
      ]);

        
        //$computers = $stage->computers()->wherePivot('cabin_id',$cabin->id)->get();
        //$computers = getComputersByCabin($stage,$cabin->id);
        $exercise->stages()->attach($request->stage_id);

        //Exercise
        $exerciseJson = array(
                'id' => $exercise->id,
                'name' => $exercise->name,
                'datetime_root' => $exercise->supremed_date_time,
                'director_first_id' => $exercise->user_id
        );
        

        // Search Stage
        $stage = Stage::find($request->stage_id);

        // Save relationship students computers in database
        $this->saveRelationShipStudentsComputersInExercise($request->student,$exercise);

        /* Begin create file JSON ON */
        
        // Stage 
        $stageJson = array();

        // Tracks
        $tracksJson = array();

        $this->saveTracksInExercise($stage->tracks()->get(),$tracksJson);
        $this->saveRelationShipStageCabinsInExercise($stage,$stageJson);
        /* End create file JSON ON */


        /* Begin create file JSON OFF */
        
        // Stage 
        $stageJsonOff = array();

        // Tracks
        $tracksJsonOff = array();

        $this->saveTracksInExercise($stage->tracks()->get(),$tracksJsonOff);
        $this->saveRelationShipStageCabinsInExercise($stage,$stageJsonOff,false);
        /* End create file JSON OFF */


        $configurationFileJson = array();
        $configurationFileJson['exercise'] =  (object) $exerciseJson;
        $configurationFileJson['tracks'] =  $tracksJson;
        $configurationFileJson['stage'] =  (object) $stageJson;

        // file for off
        $configurationFileJsonOff = array();
        $configurationFileJsonOff['exercise'] =  (object) $exerciseJson;
        $configurationFileJsonOff['tracks'] =  $tracksJsonOff;
        $configurationFileJsonOff['stage'] =  (object) $stageJsonOff;

        // Update data exercise
        $configurationFile =  getFormatJson($configurationFileJson);
        $exercise->configuration_file = $configurationFile;
        $pathConfigurationFile = 'configurationFile/'.$exercise->id.'_'.$exercise->name.'_'.getDateTimeNow().'.json';
        $exercise->path_configuration_file = $pathConfigurationFile;
        $exercise->save();


        $configurationFileOff = getFormatJson($configurationFileJsonOff);
        $pathConfigurationFileOff = explode(".", $pathConfigurationFile)[0]."Off.json";

        // Save file json for On
        savedFileLocal($configurationFile,$pathConfigurationFile,true);

        // Save file json for Off
        savedFileLocal($configurationFileOff,$pathConfigurationFileOff,true);

        $message['type'] = 'success';
        $message['status'] = Lang::get('messages.success_exercise');
        return redirect($this->menu)->with('message',$message);
    }

    /**
     * Display the specified resource.
     *
     * @param  \SimulatorOperation\Exercise  $exercise
     * @return \Illuminate\Http\Response
     */
    public function show(Exercise $exercise)
    {  
      //dd($exercise
      //$exercise = Exercise::with('stages.units')->find($exercise->id);
      $stage = $exercise->stages()->first();
      $cabins = \DB::table('cabin_stage_unit as A')
            ->where('A.stage_id',$stage->id)
            ->join('cabins as C', 'A.cabin_id', '=', 'C.id')
            ->join('units as U', 'A.unit_id', '=', 'U.id')
            ->select('C.id','C.name as cabin', 'U.name as unit',
                    'A.course','A.speed','A.altitude',
                    'A.init_position','A.lights_type')
            ->get();

      $computers = \DB::table('exercises as E')
            ->where('E.id',$exercise->id)
            ->join('users as U', 'E.id', '=', 'U.exercise_id')
            ->join('computers as C', 'U.computer_id', '=', 'C.id')
            ->select('C.id','C.name as computer','U.user_id')
            ->get();
      foreach ($cabins as $key => &$cabin) {
        $cabin_ = Cabin::with('computers')->find($cabin->id);
        foreach ($computers as  $key2 => &$computer) {
          foreach ($cabin_->computers()->get() as $computer_) {
            if($computer->id == $computer_->id){
              $cabins[$key]->computers []= (object) array('user' => callWs('user/'.$computer->user_id),
                          'computer' => $computer_);
            }
          }          
        }        
      }
      //dd($cabins);
      return view('exercise.show',['exercise' => $exercise,
                                   'cabins' => $cabins]);
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
        Exercise::where('is_played', 1)->update(['is_played' => 0]);
        ($exercise->is_played) ? $exercise->number_of_times_played++ : '';
        $exercise->fill($request->all());
        $exercise->save();
        $message['type'] = 'success';
        $message['status'] = Lang::get('messages.execute_exercise');
        return redirect($this->menu)->with('message',$message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \SimulatorOperation\Exercise  $exercise
     * @return \Illuminate\Http\Response
     */
    public function destroy(Exercise $exercise)
    {
        $exercise->stages()->detach();
        deletedFileLocal($exercise->path_configuration_file);
        $exercise->delete();
        $message['type'] = 'success';
        $message['status'] = Lang::get('messages.remove_exercise');
        return redirect($this->menu)->with('message',$message);
    }

    /**
     * Get properties of Unit.
     *
     * @param  \SimulatorOperation\Unit  $unit
     * @return Array 
     */
    private function getPropertiesUnit(Unit $unit,$speed){
        //Declare array's
        $properties = array();
        $timon = array();
        $motors = array();

        // Get number engines of unit
        $numberEngines = $unit->number_engines;

        // Verify number engines
        if($numberEngines == 1){
            $motors['type'] = $this->getTypeControlUnit($unit->numeral)[1];
            $motors['position'] = 'center';
            $motors['health'] = 1;
            $motors['maxSpeed'] = $this->getTypeControlUnit($unit->numeral,$speed)[2];
            $motors['power'] = 0;//$this->getTypeControlUnit($unit->numeral)[2] 
            $timon['type'] = $this->getTypeControlUnit($unit->numeral)[0];
            $timon['value'] = (object) array('rotation' => 0);

        }else{
            for($i = 0; $i<$numberEngines; $i++){
                $motor ['type'] = $this->getTypeControlUnit($unit->numeral)[1];
                $motor ['position'] = ($i) ? 'left' : 'right';
                $motor ['health'] = 1;
                $motor ['maxSpeed'] = $this->getTypeControlUnit($unit->numeral,$speed)[2];
                $motor ['power'] =  0;//$this->getTypeControlUnit($unit->numeral)[2];*/
                /*$motors[$i]['type'] = $this->getTypeControlUnit($unit->numeral)[1];
                $motors[$i]['position'] = ($i) ? 'left' : 'right';
                $motors[$i]['health'] = 1;
                $motors[$i]['maxSpeed'] = $this->getTypeControlUnit($unit->numeral,$speed)[2];
                $motors[$i]['power'] =  0;//$this->getTypeControlUnit($unit->numeral)[2];*/
                array_push($motors,$motor);
            }
            $timon['type'] = $this->getTypeControlUnit($unit->numeral)[0];
            $timon['value'] = (object) array('rotation' => 0);
        }

        $properties['motors'] = $motors;
        $properties['timon'] = $timon;
        
        return $properties; 
    }

    /**
     * Get type control unit (GUI).
     *
     * @param  $numeral
     * @return Array[2] 
     */
    private function getTypeControlUnit($numeral,$speedKmH = 0){
        if(strpos($numeral,'ANX') !== false || strpos($numeral,'AMP') !== false || strpos($numeral,'AMPH') !== false){
            return array('volante','telegrafo',$this->convertKmHToKnot($speedKmH,ExerciseController::TYPES_UNIT['aereo']));
        }
        if(strpos($numeral,'PO') !== false || strpos($numeral,'SEDAM') !== false || strpos($numeral,'PC') !== false || strpos($numeral,'PI') !== false  || strpos($numeral,'P') !== false){
            return array('aguja','telegrafo',$this->convertKmHToKnot($speedKmH,ExerciseController::TYPES_UNIT['superficie']));
        }
        if(strpos($numeral,'BASE_IM') !== false || strpos($numeral,'VEHICUL') !== false || strpos($numeral,'MOVIL') !== false){
            return array('control','control',$this->convertKmHToKnot($speedKmH,ExerciseController::TYPES_UNIT['terrestre_vehiculo']));
        }
    }

    /**
    * save relationship students - computers with exercise
    *
    * @param $studentsComputers
    * 
    */
    private function saveRelationShipStudentsComputersInExercise($studentsComputers,Exercise $exercise){
      foreach ($studentsComputers as $string) {
        $studentId = explode("_",$string)[0];
        $computerId = explode("_",$string)[1];

        // create users-computers relation 
        $user = new User([
          'user_id' => $studentId,
          'computer_id' => $computerId,
          'exercise_id' => $exercise->id
        ]);

        $exercise->users()->save($user);
      }
    }

    /**
    * save tracks with exercise
    *
    * @param $tracks
    *
    */
    private function saveTracksInExercise($tracks,&$tracksJson){
      foreach ($tracks as $track) {
        $initPosition = explode(',',$track->pivot->init_position);
        $temp = array('id' => $track->id,
          'name' => $track->name,
          'nav_status' => 1, // constant for next version
          'mmsi' => random_int (1000 , 1000000),
          'position' => array('lat' => $initPosition[0],
                              'lon' => $initPosition[1]
                            ),
          'course' => $track->pivot->course,
          'speed' => $track->pivot->speed,
          'altitude' => $track->pivot->altitude,
          'SIDC' => $track->sidc,
          'object_type' => $track->pivot->object_type,
          'kinect_model'=> 'standar',
          'battle_dimension' => getDataSidc($track->battle_dimension,1),
          'identity' => getDataSidc($track->identity,0),
          'properties' => array('motors' => ExerciseController::PROPERTIES,'timon' => array('type' => 'aguja'))
        );
        array_push($tracksJson, $temp);
      }
    }

    /**
    * save stage with cabins with exercise
    *
    *
    */
    private function saveRelationShipStageCabinsInExercise(Stage $stage,&$stageJson,$forOn = true){
      foreach ($stage->cabins as $cabin) {
            // Get lat and lon position 
            $initPosition = explode(',',$cabin->pivot->init_position);
            
            // Add properties for each cabin
            $dataCabin['init_position']['lat'] =  $initPosition[0];
            $dataCabin['init_position']['lon'] =  $initPosition[1];

            // Create and add properties for each cabin
            $dataCabin['course'] = $cabin->pivot->course;
            $dataCabin['speed'] = $cabin->pivot->speed;
            $dataCabin['altitude'] = $cabin->pivot->altitude;
            $dataCabin['lights_type'] = $cabin->pivot->lights_type;
            $dataCabin['unit_id'] = $cabin->pivot->unit_id;
            $dataCabin['cabin_id'] = $cabin->id;


            // Add object data cabin to stage
            $stageJson['cabins'][$cabin->id] = $dataCabin;

            // Find unit
            $unit = Unit::with('unitType.mathematicalModel')->find($cabin->pivot->unit_id);

            // Add object data unit
            $unitJson = array('id' => $unit->id,
                                'name' => $unit->name,
                                'numeral' => $unit->numeral,
                                'kinect_model' => $unit->unitType->mathematicalModel->name,
                                'type' => $this->getType($unit->unitType->mathematicalModel->name),
                                'properties' =>  $this->getPropertiesUnit($unit,$cabin->pivot->speed));

            // Add object unit to cabin
            $stageJson['cabins'][$cabin->id]['unit'] = $unitJson;

            // Add object info cabin
            $stageJson['cabins'][$cabin->id]['cabin'] = (object) array('id' => $cabin->id,
                                                                       'name' => $cabin->name);

            // Add object sensors to cabin
            foreach ($unit->sensors as $sensor) {
                // Add object sensor
                $stageJson['cabins'][$cabin->id]['sensors'][$sensor->name] = (object) array('model' => $sensor->model,
                                                                        'brand' => $sensor->brand);
            }
            $this->saveDomoticInExercise($stage,$cabin,$stageJson,$forOn);
        }

    }

    /**
    * save domotic  with exercise
    *
    *
    */
    private function saveDomoticInExercise(Stage $stage,Cabin $cabin,&$stageJson,$forOn = true){
      $stageJson['cabins'][$cabin->id]['domotic'] =  array('ubicacion' => $cabin->name,
                                                                 'direccion_ip_camara' => $cabin->ip_address_camera,
                                                                 'puerto_camara' => $cabin->port_camera,
                                                                 'dispositivos' =>  array());
            
      // Add Lights Type to enable
      array_push($stageJson['cabins'][$cabin->id]['domotic']['dispositivos'], array('nombre' => ($cabin->pivot->lights_type == 0) ? ' LUZ BLANCA': ($cabin->pivot->lights_type == 1) ? 'LUZ COMBATE':'',
              'accion' => ($forOn) ? 'DIGITAL' : 'MANUAL'));

      // Get computers  
      $computers = $stage->computers()->wherePivot('cabin_id',$cabin->id)->get();
      foreach ($computers as $computer) {
          
          array_push($stageJson['cabins'][$cabin->id]['domotic']['dispositivos'],array('nombre' => $computer->label_arduino,
              'accion' => ($forOn) ? 'ENCENDER' : 'APAGAR'));
         
          foreach ($computer->devices as $device) {
              if(strpos($device->deviceType->abbreviation,'TV') !== false){
                  $array['nombre'] = $device->label;
                  $array['accion'] = ($forOn) ? 'ENCENDER' : 'APAGAR';
                  array_push($stageJson['cabins'][$cabin->id]['domotic']['dispositivos'], $array);
              }
              
          }
      }
    }



     /**
     * Convert km/h to knots.
     *
     * @param  $speedKmH
     * @return $speedKnot
     */
    private function convertKmHToKnot($speedKmH,$unitType){
        $speedKnot = null;
        switch ($unitType) {
            case ExerciseController::TYPES_UNIT['superficie']:
                $speedKnot = (($speedKmH) * 25) / (46.30);
                $speedKnot =  round($speedKnot/5); 
                break;

            case ExerciseController::TYPES_UNIT['aereo']:
                $speedKnot = (($speedKmH) * 2211) / (4096);
                $speedKnot =  round($speedKnot/211); 
                break;

            case ExerciseController::TYPES_UNIT['terrestre_vehiculo']:
                $speedKnot = (($speedKmH) * 161) / (300);
                break;

            case ExerciseController::TYPES_UNIT['terrestre_pie']:
                $speedKnot = (($speedKmH) * 27) / (50);
                break;
        }
        return $speedKnot;
    }

    private function getType($type){
      if(strpos("PI",$type)){
        return 1;
      } else if(strpos("PO",$type)){
        return 2;
      } else if(strpos("AF",$type)){
        return 3;
      } else if(strpos("IM",$type)){
        return 9;
      }
    }


}
