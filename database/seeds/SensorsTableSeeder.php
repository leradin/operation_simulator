<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class SensorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $date = Carbon::now();
        $sensors = array(array('name' => "GPS",
                             'sensor_type' => 'cinematico',
                             'sensor_scope' => 'superficie',
                             'brand' => 'SAAB',
                             'model' => 'R4 NAVIGATION SYSTEM',
                             'created_at' => $date,
                             'updated_at' => $date
                             ),
                        array('name' => "GYRO",
                             'sensor_type' => 'cinematico',
                             'sensor_scope' => 'superficie',
                             'brand' => 'SAAB',
                             'model' => 'R5 NAVIGATION SYSTEM',
                             'created_at' => $date,
                             'updated_at' => $date
                             ),
                        array('name' => "CORREDERA",
                             'sensor_type' => 'cinematico',
                             'sensor_scope' => 'superficie',
                             'brand' => 'SAAB',
                             'model' => 'R6 NAVIGATION SYSTEM',
                             'created_at' => $date,
                             'updated_at' => $date
                             ),
                        array('name' => "AIS",
                             'sensor_type' => 'cinematico',
                             'sensor_scope' => 'superficie',
                             'brand' => 'SAAB',
                             'model' => 'R7 NAVIGATION SYSTEM',
                             'created_at' => $date,
                             'updated_at' => $date
                             ),
                        array('name' => "RADAR",
                             'sensor_type' => 'cinematico',
                             'sensor_scope' => 'superficie',
                             'brand' => 'SAAB',
                             'model' => 'R8 NAVIGATION SYSTEM',
                             'created_at' => $date,
                             'updated_at' => $date
                             ),
                        array('name' => "ECOSONDA",
                             'sensor_type' => 'cinematico',
                             'sensor_scope' => 'superficie',
                             'brand' => 'SAAB',
                             'model' => 'R9 NAVIGATION SYSTEM',
                             'created_at' => $date,
                             'updated_at' => $date
                             ),
                         array('name' => "ANEMOMETRO",
                             'sensor_type' => 'cinematico',
                             'sensor_scope' => 'superficie',
                             'brand' => 'SAAB',
                             'model' => 'R10 NAVIGATION SYSTEM',
                             'created_at' => $date,
                             'updated_at' => $date
                             )
        );

        foreach ($sensors as $sensor) {
        	$sensor = \DB::table('sensors')->insert($sensor);
        }
    }
}
