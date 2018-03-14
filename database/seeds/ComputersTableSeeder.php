<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ComputersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$cabins = \SimulatorOperation\Cabin::all();
        $computerTypes = \SimulatorOperation\ComputerType::all();

        foreach ($cabins as $cabin) {
        	$i = 1;
			foreach ($computerTypes as $computerType) {
	        	$date = Carbon::now();
	            \DB::table('computers')->insert(array(
	                'name' => 'PC_'.$computerType->abbreviation,
	                'ip_address' => '192.168.214.'.$i,
	                'mac_address' => 'FF:FC:E3:33:FF:5'.$i,
	                'cabin_id' => $cabin->id,
	                'label_arduino' => 'PC'.$i,
	                'computer_type_id' => $computerType->id,
	                'created_at' => $date,
	                'updated_at' => $date
	            ));
	            $i++;
	        }
	    }
    }
}
