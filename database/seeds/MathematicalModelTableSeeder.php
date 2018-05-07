<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;


class MathematicalModelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $date = Carbon::now();
        $mathematicalModels = array(
        	array('name' => 'AereoAlaFija',
            'path' => 'mathematicalModel/AereoAlaFijaModel.js',
            'unit_type_id' => 1,
            'created_at' => $date,
            'updated_at' => $date
            ),
    	    array(
            'name' => 'PI',
        	'path' => 'mathematicalModel/PIModel.js',
        	'unit_type_id' => 2,
            'created_at' => $date,
            'updated_at' => $date
            ),
			array(
            'name' => 'PO',
        	'path' => 'mathematicalModel/POModel.js',
        	'unit_type_id' => 3,
            'created_at' => $date,
            'updated_at' => $date
            ),
            array(
            'name' => 'MANDO',
            'path' => 'mathematicalModel/MandoModel.js',
            'unit_type_id' => 4,
            'created_at' => $date,
            'updated_at' => $date
            ),
            array(
            'name' => 'INFANTERIA DE MARINA',
            'path' => 'mathematicalModel/IMModel.js',
            'unit_type_id' => 5,
            'created_at' => $date,
            'updated_at' => $date
            )
        );

        foreach ($mathematicalModels as $mathematicalModel) {
    		\DB::table('mathematical_models')->insert($mathematicalModel);
        }
    }
}
