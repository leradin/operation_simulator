<?php
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
* Save file local
*
*/
function savedFileLocal($file,$fileName){
	$saved = false;
	try{
	    \Storage::disk('local')->put($fileName, \File::get($file));
	    $saved = true;
	}catch(\Exception $error){

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