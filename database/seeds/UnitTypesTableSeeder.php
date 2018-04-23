<?php

use Illuminate\Database\Seeder;

class UnitTypesTableSeeder extends Seeder
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
            'name' => 'AEREO ALA FIJA',
            'abbreviation' => 'AAF',
            'created_at' => $date,
            'updated_at' => $date
            ),
    	    array(
            'name' => 'PATRULLA INTERCEPTORA',
        	'abbreviation' => 'PI',
            'created_at' => $date,
            'updated_at' => $date
            ),
			array(
            'name' => 'PATRULLA OCEANICA',
        	'abbreviation' => 'PO',
            'created_at' => $date,
            'updated_at' => $date
            ),
            array(
            'name' => 'MANDO',
            'abbreviation' => 'MA',
            'created_at' => $date,
            'updated_at' => $date
            ),
			
        );
        
     	foreach($data as $unitType){
            \DB::table('unit_types')->insert($unitType);
	 	}
    }
}
