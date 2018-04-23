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
            'name' => 'COMUNICACION INTERNO CESISCCAM',
            'abbreviation' => 'COICE',
            'created_at' => $date,
            'updated_at' => $date
            ),
            array(
            'name' => 'MANIOBRAS',
            'abbreviation' => 'MAN',
            'created_at' => $date,
            'updated_at' => $date
            ),
            array(
            'name' => 'SISTEMA DE ENLACE DE DATOS DE LA ARMADA DE MEXICO',
            'abbreviation' => 'SEDAM',
            'created_at' => $date,
            'updated_at' => $date
            ),
            array(
            'name' => 'RADAR',
            'abbreviation' => 'RAD',
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
            'name' => 'APOYO INTERNET',
            'abbreviation' => 'AIN',
            'created_at' => $date,
            'updated_at' => $date
            ),
            array(
            'name' => 'SISTEMA DE COMUNICACION DE LA ARMADA DE MEXICO ',
            'abbreviation' => 'SICCAM',
            'created_at' => $date,
            'updated_at' => $date
            ),
            array(
            'name' => 'CRONOLOGIA',
            'abbreviation' => 'CRO',
            'created_at' => $date,
            'updated_at' => $date
            ),
            array(
            'name' => 'ESCENOGRAFIA',
            'abbreviation' => 'ESC',
            'created_at' => $date,
            'updated_at' => $date
            ),
            array(
            'name' => 'ANALISIS DE IMAGEN',
            'abbreviation' => 'AIM',
            'created_at' => $date,
            'updated_at' => $date
            )
        );
        
     	foreach($data as $computerType){
            \DB::table('computer_types')->insert($computerType);
	 	}
    }
}
