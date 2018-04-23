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
    	$cabins = \SimulatorOperation\Cabin::where('id','<',9)->get();
        $computerTypes = \SimulatorOperation\ComputerType::where('id','<',6)->get();

        foreach ($cabins as $cabin) {
        	$i = 1;
			foreach ($computerTypes as $computerType) {
				
		        	$date = Carbon::now();
		            \DB::table('computers')->insert(array(
		                'name' => 'PC_'.$computerType->abbreviation,
		                'ip_address' => '192.168.214.'.$i,
		                'mac_address' => 'FF:FC:E3:33:FF:59',
		                'cabin_id' => $cabin->id,
		                'label_arduino' => 'PC'.$i,
		                'computer_type_id' => $computerType->id,
		                'created_at' => $date,
		                'updated_at' => $date
		            ));
		            $i = $i+2;
	        }
	    }


	    // CC2
	    $date = Carbon::now();

	    \DB::table('computers')->insert(array(
            'name' => 'PC_AIN_1',
            'ip_address' => '192.168.214.5',
            'mac_address' => 'FF:FC:E3:33:FF:59',
            'cabin_id' => 9,
            'label_arduino' => 'PC1',
            'computer_type_id' => 6,
            'created_at' => $date,
            'updated_at' => $date
        ));

        \DB::table('computers')->insert(array(
            'name' => 'PC_AIN_2',
            'ip_address' => '192.168.214.6',
            'mac_address' => 'FF:FC:E3:33:FF:59',
            'cabin_id' => 9,
            'label_arduino' => 'PC2',
            'computer_type_id' => 6,
            'created_at' => $date,
            'updated_at' => $date
        ));

	    \DB::table('computers')->insert(array(
            'name' => 'PC_COICE',
            'ip_address' => '192.168.214.7',
            'mac_address' => 'FF:FC:E3:33:FF:59',
            'cabin_id' => 9,
            'label_arduino' => 'PC3',
            'computer_type_id' => 1,
            'created_at' => $date,
            'updated_at' => $date
        ));

        \DB::table('computers')->insert(array(
            'name' => 'PC_SICCAM',
            'ip_address' => '192.168.214.8',
            'mac_address' => 'FF:FC:E3:33:FF:59',
            'cabin_id' => 9,
            'label_arduino' => 'PC4',
            'computer_type_id' => 7,
            'created_at' => $date,
            'updated_at' => $date
        ));

        \DB::table('computers')->insert(array(
            'name' => 'PC_SEDAM',
            'ip_address' => '192.168.214.9',
            'mac_address' => 'FF:FC:E3:33:FF:59',
            'cabin_id' => 9,
            'label_arduino' => 'PC5',
            'computer_type_id' => 3,
            'created_at' => $date,
            'updated_at' => $date
        ));

        \DB::table('computers')->insert(array(
            'name' => 'PC_AIN_3',
            'ip_address' => '192.168.214.5',
            'mac_address' => 'FF:FC:E3:33:FF:59',
            'cabin_id' => 9,
            'label_arduino' => 'PC6',
            'computer_type_id' => 6,
            'created_at' => $date,
            'updated_at' => $date
        ));

        \DB::table('computers')->insert(array(
            'name' => 'PC_AIN_4',
            'ip_address' => '192.168.214.5',
            'mac_address' => 'FF:FC:E3:33:FF:59',
            'cabin_id' => 9,
            'label_arduino' => 'PC7',
            'computer_type_id' => 6,
            'created_at' => $date,
            'updated_at' => $date
        ));

        \DB::table('computers')->insert(array(
            'name' => 'PC_AIN_5',
            'ip_address' => '192.168.214.5',
            'mac_address' => 'FF:FC:E3:33:FF:59',
            'cabin_id' => 9,
            'label_arduino' => 'PC8',
            'computer_type_id' => 6,
            'created_at' => $date,
            'updated_at' => $date
        ));


        // ISR
        \DB::table('computers')->insert(array(
            'name' => 'PC_COICE',
            'ip_address' => '192.168.214.7',
            'mac_address' => 'FF:FC:E3:33:FF:59',
            'cabin_id' => 10,
            'label_arduino' => 'PC1',
            'computer_type_id' => 1,
            'created_at' => $date,
            'updated_at' => $date
        ));

        \DB::table('computers')->insert(array(
            'name' => 'PC_CRO',
            'ip_address' => '192.168.214.7',
            'mac_address' => 'FF:FC:E3:33:FF:59',
            'cabin_id' => 10,
            'label_arduino' => 'PC3',
            'computer_type_id' => 8,
            'created_at' => $date,
            'updated_at' => $date
        ));

        \DB::table('computers')->insert(array(
            'name' => 'PC_ESC',
            'ip_address' => '192.168.214.7',
            'mac_address' => 'FF:FC:E3:33:FF:59',
            'cabin_id' => 10,
            'label_arduino' => 'PC5',
            'computer_type_id' => 9,
            'created_at' => $date,
            'updated_at' => $date
        ));

        \DB::table('computers')->insert(array(
            'name' => 'PC_AIM',
            'ip_address' => '192.168.214.7',
            'mac_address' => 'FF:FC:E3:33:FF:59',
            'cabin_id' => 10,
            'label_arduino' => 'PC7',
            'computer_type_id' => 10,
            'created_at' => $date,
            'updated_at' => $date
        ));

        \DB::table('computers')->insert(array(
            'name' => 'PC_SICCAM',
            'ip_address' => '192.168.214.8',
            'mac_address' => 'FF:FC:E3:33:FF:59',
            'cabin_id' => 10,
            'label_arduino' => 'PC9',
            'computer_type_id' => 7,
            'created_at' => $date,
            'updated_at' => $date
        ));

        \DB::table('computers')->insert(array(
            'name' => 'PC_SEDAM',
            'ip_address' => '192.168.214.9',
            'mac_address' => 'FF:FC:E3:33:FF:59',
            'cabin_id' => 10,
            'label_arduino' => 'PC10',
            'computer_type_id' => 3,
            'created_at' => $date,
            'updated_at' => $date
        ));
        
    }
}
