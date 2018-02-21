<?php

use Illuminate\Database\Seeder;

class DeviceTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $date = Carbon\Carbon::now();
		$data = array(
    	    array(
            'name' => 'Camará',
            'abbreviation' => 'CAM',
            'created_at' => $date,
            'updated_at' => $date
            ),
			array(
            'name' => 'Telefono',
            'abbreviation' => 'TEL',
            'created_at' => $date,
            'updated_at' => $date
            ),
			array(
            'name' => 'Televisión',
            'abbreviation' => 'TV',
            'created_at' => $date,
            'updated_at' => $date
            )
        );
        
     	foreach($data as $deviceType){
            \DB::table('device_types')->insert($deviceType);
	 	}
    }
}
