<?php

use Illuminate\Database\Seeder;

class TracksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $identitys = ['U',
                      'F',
                      'N',
                      'H'
                	];
    	$affilliations = [	'A',
                    		'G',
                    		'S',
                    		'U'
                		];
		$status = ['A',
				   'P'];

        $date = Carbon\Carbon::now();
        $count = 1;
  		foreach ($identitys as $identity) {
			foreach ($affilliations as $affilliation) {
				foreach ($status as $statu) {
					\DB::table('tracks')->insert(array(
			        	'name' => 'Blanco_'.$count,
			            'identity' => $identity,
			            'battle_dimension' => $affilliation,
			            'status' => $statu,
			            'sidc'=> 'FSUA------------',
			            'created_at' => $date,
			            'updated_at' => $date
         			));
         			$count++;
				}
         		
			}
  		}
    }
}
