<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class DevicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $computers = \SimulatorOperation\Computer::all();
        $deviceTypes = \SimulatorOperation\DeviceType::all();
    	
        foreach ($computers as $computer) {
    		$i = 1;
			foreach ($deviceTypes as $deviceType) {

	        	$date = Carbon::now();
	            \DB::table('devices')->insert(array(
	                'name' => $computer->name."_".$computer->id."_".$deviceType->abbreviation,
	                'description' => $deviceType->abbreviation,
	                'ip_address' => '192.168.214.'.$i,
	                'computer_id' => $computer->id,
	                'label' => ($deviceType->abbreviation == 'TV' ? ("TV".$i) : 'LABEL'),
	                'switch_port' => 15,
	                'device_type_id' => $deviceType->id,
	                'created_at' => $date,
	                'updated_at' => $date
	            ));
	           $i++;
	        }
	        
        	
	    }
    }
}
