<?php
 use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Authentication routes
Auth::routes();

// Controller Home
Route::get('/', 'HomeController@index');

// Catalogs
Route::group(['prefix'=>'catalog', 'as'=>'catalog.'],function(){
	// Controller Cabin
	Route::resource('cabin', 'CabinController');

	// Controller Computer Type
	Route::resource('computer_type', 'ComputerTypeController');

	// Controller Computer
	Route::resource('computer', 'ComputerController');

	// Controller Device Type
	Route::resource('device_type', 'DeviceTypeController');

	// Controller Device
	Route::resource('device', 'DeviceController');

	// Controller UnitType 
	Route::resource('unit_type','UnitTypeController');

	// Controller Unit
	Route::resource('unit', 'UnitController');

	// Controller Mathematical Model 
	Route::resource('mathematical_model','MathematicalModelController');

	// Controller Sensor 
	Route::resource('sensor','SensorController');

	// Controller Track 
	Route::resource('track','TrackController');

	// Controller Meteorological Phenomenons
	Route::resource('meteorological_phenomenon','MeteorologicalPhenomenonController');

});

// Controller Stage
Route::resource('stage','StageController');

// Controller Exercise
Route::resource('exercise','ExerciseController');

/* Redirect for authentication */
Route::get('redirect', function () {
    $query = http_build_query([
        'client_id' => env('MAINTENANCE_SIMULATOR_CLIENT_ID'),
        'redirect_uri' => env('APP_URL').'callback',
        'response_type' => 'code',
        'scope' => '',
    ]);

    return redirect(env('MAINTENANCE_SIMULATOR_URL').'oauth/authorize?'.$query);
})->name('get_token');

/* Approving The Request */
Route::get('/callback', function (Request $request) {
    $http = new GuzzleHttp\Client;

    $response = $http->post(env('MAINTENANCE_SIMULATOR_URL').'oauth/token', [
        'form_params' => [
            'grant_type' => 'authorization_code',
            'client_id' => env('MAINTENANCE_SIMULATOR_CLIENT_ID'),
            'client_secret' => env('MAINTENANCE_SIMULATOR_CLIENT_SECRET'),
            'redirect_uri' => env('APP_URL').'callback',
            'code' => $request->code,
        ],
    ]);
    // Specifying a default value...
    //session('_token',$response->getBody());
    session(['api_token' => $response->getBody()->getContents()]);
    return json_decode((string) $response->getBody(), true);
});

//Web services
Route::get('executionExercise',function(){
	return response()->json(SimulatorOperation\Exercise::where('is_played', 1)->first()->path_configuration_file);
});



//Route::get('aaa',function(){
	
	//$public_path = public_path();
	//$url = $public_path.'/storage/mathematicalModel/POModel.js';
	/*if (\Storage::exists('mathematicalModel/POModel.js'))
     {
       return response()->download($url);
     }
     //si no se encuentra lanzamos un error 404.
     abort(404);*/
	//$commands[] = 'ls -l';
	//echo base_path().'/app'.\Storage::url('unitImage/jaja.jpeg');
	//\SSH::into('production')->put($url,env('KINECT_PATH_MODELS'));
    //\SSH::into('production')->put($url, env('KINECT_PATH_MODELS').'/index.js');
	// run a command - only works on SSH connections
	//\SSH::into('production')->run($url, function( $line ) {
	  // display output of command, by line
	//  echo $line;
	//} );
	//$contents = \Storage::get('unitImage/jaja.jpeg');
	//$file = \Storage::url('unitImage/jaja.jpeg');
	//echo $contents->getClientOriginalName();
	//\SSH::put($file->getRealPath(), '/var/www/html/uploads/' . $file->getFilename());
	//echo \Storage::url('unitImage/jaja.jpeg');
//});

//Route::get('ama',function(){
	//return \SimulatorOperation\Sensor::getPossibleEnumValues('type_sensor');
	//echo $price = formatNumber(1890199, 'IDR');
	//dd(getEnumValues('sensors','type_sensor'));
//});

/*
Route::prefix('catalog')->group(function () {
    Route::get('catalog', function () {
    	return view('catalogs.index');
    });
});

/*Route::get('/',[
	'uses' => 'HomeController@index',
	'as' => 'home']);

// Controller Exercise
/*Route::resource('exercise','ExerciseController');
Route::get('setExerciseByPlayed/{idExercise}',function($idExercise){
	$exercises = \Cesedam\Exercise::All();
	foreach ($exercises as $exercise) {
		$exercise->is_played = "0";
		$exercise->save();
	}
	$exercise = \Cesedam\Exercise::find($idExercise);
	$exercise->is_played = "1";
	$exercise->save();
	// Redirect to main exercise
	return redirect('/exercise')->with('message','Ejercicio almacenado correctamente');
});
// Controller Stage
Route::resource('stage', 'StageController');
// Controller Cabin
Route::resource('cabin', 'CabinController');
// Controller Computer
Route::resource('computer', 'ComputerController');
// Controller Device
Route::resource('device', 'DeviceController');
// Controller User
Route::resource('user', 'UserController');
	Route::get('getAllUsers',function(){
		$users = \Cesedam\User::All();
		$objects = [];
		foreach($users as $user){
			$object = array(
    			"id" => $user->id,
    			"text" =>  $user->name." ".$user->lastname." ".$user->thirdname); 
			array_push($objects,$object);
		}
		echo json_encode($objects);
	});
// Controller Unit
Route::resource('unit', 'UnitController');
// ControllerSensor
Route::resource('sensor','SensorController');
// Controller Model 
Route::resource('modelo','ModeloController');
// Controller UnitType 
Route::resource('tipo_unidad','TipoUnidadController');
// Controller Track
Route::resource('track','TrackController');
// Controller SupportMobile
Route::resource('support_mobile','SupportMobileController');
// Controller WeatherEffect
Route::resource('weather_effect','WeatherEffectController');

// Ajax
Route::get('stageDetail','AjaxController@stageDetail');
Route::get('cabinDetail','AjaxController@cabinDetail');
Route::get('getAllTracks',function(){
	if (Request::ajax())
	{
	    $tracks = DB::table('track_catalog')->select('id','name','identity','battle_dimension','sidc')->get();
	    return Response::json($tracks);
	} 
});

//Web services
Route::get('getFileJson/{path}',function($path){
	return Response::json(Storage::disk('local')->get('/files_configuration_exercise/'.$path),200);
});

Route::get('validateLogin/{email}',function($email){
	$validate;
	try {
	  $user = Cesedam\User::where('email', $email)->first();
	  if(!$user){
	  	return response()->json(['response' => '']);
	  }else{
	  	return response()->json(['response' => $user]);
	  }
	} catch(\Exception $e) {
	  return response()->json(['response' => '']);
	}
})->middleware('cors');


