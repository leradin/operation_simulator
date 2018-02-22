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
Route::get('catalog',function(){
	return view('catalogs.index');
});

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


