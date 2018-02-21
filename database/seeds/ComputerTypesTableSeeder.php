<?php

use Illuminate\Database\Seeder;

class ComputerTypesTableSeeder extends Seeder
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
            'name' => 'SISTEMA DE ENLACE DE DATOS DE LA ARMADA DE MEXICO',
            'abbreviation' => 'SEDAM',
            'created_at' => $date,
            'updated_at' => $date
            ),
			array(
            'name' => 'COMUNICACION INTERNO CESISCCAM',
            'abbreviation' => 'COICE',
            'created_at' => $date,
            'updated_at' => $date
            ),
			array(
            'name' => 'SISTEMA DE RECONOCIMIENTO INTELEGENTE',
            'abbreviation' => 'ISR',
            'created_at' => $date,
            'updated_at' => $date
            ),
            array(
            'name' => 'MANIOBRAS',
            'abbreviation' => 'MAN',
            'created_at' => $date,
            'updated_at' => $date
            )
        );
        
     	foreach($data as $computerType){
            \DB::table('computer_types')->insert($computerType);
	 	}
    }
}
