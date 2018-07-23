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
Route::get('/', 'HomeController@index')->name('home')->middleware('oauth');

// Catalogs
Route::group(['prefix'=>'catalog', 'as'=>'catalog.','middleware' => 'oauth'],function(){
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
// Get all mathematical models
Route::get('kinect_models',function(){
	return SimulatorOperation\MathematicalModel::select('name')->get();
});

// Save Image Symbology
Route::get('saveImageSymbology','TrackController@saveImageSymbology')->name('saveImageSymbology');
Route::get('getTracks','TrackController@getTracks');

Route::middleware(['oauth'])->group(function () {
	// Controller Stage
	Route::resource('stage','StageController');
		Route::get('getStage/{stage_id}','StageController@getStage');
		Route::get('getStudents','StageController@getStudents');

	// Controller Exercise
	Route::resource('exercise','ExerciseController');
});
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
    return redirect()->route('home');//json_decode((string) $response->getBody(), true);
});


//Web services
Route::get('executionExercise/',function(){
	try{
	return response()->file(public_path().'/storage/'.SimulatorOperation\Exercise::where('is_played', 1)->first()->path_configuration_file);
	}catch(\Exception $error){
		return response()->json(0);
	}
});

Route::get('executionExerciseOff/',function(){
	try{
		$fileName = explode(".",SimulatorOperation\Exercise::where('is_played', 1)->first()->path_configuration_file)[0]."Off.json";
	return response()->file(public_path().'/storage/'.$fileName);
	}catch(\Exception $error){
		return response()->json(0);
	}
});




Route::get('download_file/{exercise}',function(\SimulatorOperation\Exercise $exercise){
	try{
        return downloadFile($exercise->path_configuration_file);
    }catch(\Exception $error){
        return redirect('/exercise')->with('message',$error->getMessage())->with('error',1);
    }
})->name('download');

Route::get('getImage/{sidc}',function($sidc){
	$url = public_path().'/storage/symbology2525c/'.$sidc.'.png';
       return response()->file($url);
});

// Report
/*Route::get('report','ReportController@index');
Route::get('mapComments/{idExercise}','ReportController@showMapComments');
Route::get('videoComments/{idExercise}','ReportController@showVideoComments');
Route::get('audioVideo/{idExercise}','ReportController@showAudioVideo');
Route::get('download_file_ftp/{path}','ReportController@download')->name('downloadFTP');*/
