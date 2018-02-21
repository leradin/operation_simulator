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