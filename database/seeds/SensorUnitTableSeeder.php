<?php

use Illuminate\Database\Seeder;

class SensorUnitTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i <= 23; $i++){
        	$unit = SimulatorOperation\Unit::find($i);
        	for($j = 1; $j<=7; $j++){
        		$unit->sensors()->attach($j);
        	}
        }
    }
}
