<?php
use SimulatorOperation\Computer;
use SimulatorOperation\Stage;
use Illuminate\Http\Request;

/**
* change plain number to formatted currency
*
* @param $number
* @param $currency
*/
function formatNumber($number, $currency = 'IDR')
{
   if($currency == 'USD') {
        return number_format($number, 2, '.', ',');
   }
   return number_format($number, 0, '.', '.');
}

function getEnumValues($table, $column) {
	$type = DB::select(DB::raw("SHOW COLUMNS FROM $table WHERE Field = '{$column}'"))[0]->Type ;
	preg_match('/^enum\((.*)\)$/', $type, $matches);
	$enum = array();
	foreach( explode(',', $matches[1]) as $value ){
		$v = trim( $value, "'" );
		$enum = array_add($enum, $v, $v);
	}
	return $enum;
}

function getArray($array){
	$arr = [];
	foreach ($array as $key => $value) {
		$arr = explode('?',key($array));
	}
	return $arr;
}
/**
* 
* get only computer relation cabins
*/
function getComputersByCabin(Stage $stage, $cabinId){
    $computers = array();
    foreach($stage->computers as $computer){
	    if(Computer::find($computer->id)->cabin->id == $cabinId){
            array_push($computers,$computer);
        }            
    }
    return $computers;
}

/**
* Save file local
*
*/
function savedFileLocal($file,$fileName,$isFile = false){
	$saved = false;
	try{
	    \Storage::disk('local')->put($fileName, (!$isFile) ? \File::get($file) : $file);
	    $saved = true;
	}catch(\Exception $error){
		dd($error);
	}
	return $saved;
}

/**
* Delete file local
*
*/
function deletedFileLocal($fileName){
	$deleted = false;
	try{
		\Storage::delete($fileName);
	    $deleted = true;
	}catch(\Exception $error){

	}
	return $deleted;
}

/**
* Save file remote throug ssh
*
*/
function savedFileRemoto($connectionName,$fileName,$remotePath){
	$saved = false;
    try{
	    $url = public_path().'/storage/'.$fileName;
        \SSH::into($connectionName)->put($url,$remotePath.explode("/",$fileName)[1]);
        $saved = true;
    }catch(\Exception $error){

    }
    return $saved;
}

/**
* Delete file remote throug ssh
*
*/
function deletedFileRemoto($connectionName,$fileName,$remotePath){
    \SSH::into($connectionName)->run([
            'cd '.$remotePath,
            'rm '.$fileName
        ]);
}

/**
* Download file 
*
*/
function downloadFile($fileName){
	$public_path = public_path();
 	$url = $public_path.'/storage/'.$fileName;
 	return response()->download($url);
}

/**
* Generate datetime
*
*/
function getDateTimeNow(){
	$carbon = new \Carbon\Carbon();
	return $date = $carbon->now();
}

/**
* Generate format Json
*
*/
function getFormatJson($array){
	return json_encode($array,JSON_PRETTY_PRINT);
}

function callWs($endPoint){
	$token = json_decode(session('api_token'),true);
    $headers = [
        'Authorization' => 'Bearer ' . $token['access_token'],        
        'Accept'        => 'application/json',
    ];
    $client = new \GuzzleHttp\Client([
        'base_uri' => env('MAINTENANCE_SIMULATOR_URL').'api/',
        'timeout'  => 2.0,
        'headers' => $headers
    ]);
    $response = $client->request('GET',$endPoint);
    $data = json_decode($response->getBody()->getContents(),true);
    return $data; 
}

/* 
	Identity = 0
	Battel dimension = 1
	Status = 2
*/
function getDataSidc($char,$parameter){
	if($parameter == 0){
	$identity = ['P' => 'pending',
				'U' => 'unknown',
				'A' => 'assumed friend',
				'F' => 'friend',
				'N' => 'neutral',
				'S' => 'suspect',
				'H' => 'hostile',
				'G' => 'exercise pending',
				'W' => 'exercise unknown',
				'M' => 'exercise assumed friend',
				'D' => 'exercise friend',
				'L' => 'exercise neutral',
				'J' => 'joker',
				'K' => 'faker'];
		return $identity[$char];
	}

	if($parameter == 1){
    	$battleDimension = ['P' => 'space',
    					'A' => 'air',
						'G' => 'ground',
						'S' => 'sea surface',
						'U' => 'sea subsurface',
						'F' => 'sof',
						'X' => 'other',
						'Z' => 'unknown'];
		return $battleDimension[$char];
	}

	if($parameter == 2){
		$status = ['A' => 'anticipated/planned',
					'P' => 'present ',
					'C' => 'present/fully capable',
					'D' => 'present/damaged',
					'X' => 'present/destroyed',
					'F' => 'present/full to capacity'];
		return $status[$char];
	}
}