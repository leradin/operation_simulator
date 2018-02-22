<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UnitsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $date = Carbon::now();
        $units = array(
            array('station' => 613,
                 'numeral' => 'ANX_1193',
                 'name' => 'ANX_1193_KING_A',
                 'serial_number' => '001',
                 'country' => 'MX',
                 'number_engines' => 1,
                 'unit_type_id' => 1,
                 'sensor_id' => 1,
                 'image' => 'image/image.jpg',
                 'created_at' => $date,
                 'updated_at' => $date
                 ),
            array('station' => 518,
                 'numeral' => 'PI_1415',
                 'name' => 'ARM_MENKALINAN',
                 'serial_number' => '001',
                 'country' => 'MX',
                 'number_engines' => 1,
                 'unit_type_id' => 1,
                 'image' => 'image/image.jpg',
                 'created_at' => $date,
                 'updated_at' => $date
                 ),
            array('station' => 515,
                 'numeral' => 'P_151_1',
                 'name' => 'PI_DURANGO',
                 'serial_number' => '001',
                 'number_engines' => 1,
                 'country' => 'MX',
                 'unit_type_id' => 1,
                 'image' => 'image/image.jpg',
                 'created_at' => $date,
                 'updated_at' => $date
                 ),
            array('station' => 514,
                 'numeral' => 'PI_1413',
                 'name' => 'ARM_ALFIRK',
                 'serial_number' => '001',
                 'number_engines' => 1,
                 'country' => 'MX',
                 'unit_type_id' => 1,
                 'image' => 'image/image.jpg',
                 'created_at' => $date,
                 'updated_at' => $date
                 ),
            array('station' => 513,
                 'numeral' => 'PI_1412',
                 'name' => 'ARM_MINTAKA',
                 'serial_number' => '001',
                 'number_engines' => 1,
                 'country' => 'MX',
                 'unit_type_id' => 1,
                 'image' => 'image/image.jpg',
                 'created_at' => $date,
                 'updated_at' => $date
                 ),
            array('station' => 512,
                 'numeral' => 'PI_1411',
                 'name' => 'ARM_ALNITAK',
                 'serial_number' => '001',
                 'number_engines' => 1,
                 'country' => 'MX',
                 'unit_type_id' => 1,
                 'image' => 'image/image.jpg',
                 'created_at' => $date,
                 'updated_at' => $date
                 ),
            array('station' => 511,
                 'numeral' => 'PI_1410',
                 'name' => 'ARM_ALBIREO',
                 'serial_number' => '001',
                 'number_engines' => 1,
                 'country' => 'MX',
                 'unit_type_id' => 1,
                 'image' => 'image/image.jpg',
                 'created_at' => $date,
                 'updated_at' => $date
                 ),
            array('station' => 510,
                 'numeral' => 'PI_1301',
                 'name' => 'ARM_ACUARIO',
                 'serial_number' => '001',
                 'number_engines' => 1,
                 'country' => 'MX',
                 'unit_type_id' => 1,
                 'image' => 'image/image.jpg',
                 'created_at' => $date,
                 'updated_at' => $date
                 ),
            array('station' => 509,
                 'numeral' => 'PI_1148',
                 'name' => 'ARM_SABIK',
                 'serial_number' => '001',
                 'number_engines' => 1,
                 'country' => 'MX',
                 'unit_type_id' => 1,
                 'image' => 'image/image.jpg',
                 'created_at' => $date,
                 'updated_at' => $date
                 ),
            array('station' => 508,
                 'numeral' => 'PI_1147',
                 'name' => 'ARM_MENKAR',
                 'serial_number' => '001',
                 'number_engines' => 1,
                 'country' => 'MX',
                 'unit_type_id' => 1,
                 'image' => 'image/image.jpg',
                 'created_at' => $date,
                 'updated_at' => $date
                 ),
            array('station' => 507,
                 'numeral' => 'PI_1139',
                 'name' => 'ARM_ENIF',
                 'serial_number' => '001',
                 'number_engines' => 1,
                 'country' => 'MX',
                 'unit_type_id' => 1,
                 'image' => 'image/image.jpg',
                 'created_at' => $date,
                 'updated_at' => $date
                 ),
            array('station' => 506,
                 'numeral' => 'PI_1138',
                 'name' => 'ARM_KOCHAB',
                 'serial_number' => '001',
                 'number_engines' => 1,
                 'country' => 'MX',
                 'unit_type_id' => 1,
                 'image' => 'image/image.jpg',
                 'created_at' => $date,
                 'updated_at' => $date
                 ),
            array('station' => 504,
                 'numeral' => 'PI_1122',
                 'name' => 'ARM_BELLATRIX',
                 'serial_number' => '001',
                 'number_engines' => 1,
                 'country' => 'MX',
                 'unit_type_id' => 1,
                 'image' => 'image/image.jpg',
                 'created_at' => $date,
                 'updated_at' => $date
                 ),
            array('station' => 502,
                 'numeral' => 'PI_1119',
                 'name' => 'ARM_SHAULA',
                 'serial_number' => '001',
                 'number_engines' => 1,
                 'country' => 'MX',
                 'unit_type_id' => 1,
                 'image' => 'image/image.jpg',
                 'created_at' => $date,
                 'updated_at' => $date
                 ),
            array('station' => 501,
                 'numeral' => 'PI_1118',
                 'name' => 'ARM_HADAR',
                 'serial_number' => '001',
                 'number_engines' => 1,
                 'country' => 'MX',
                 'unit_type_id' => 1,
                 'image' => 'image/image.jpg',
                 'created_at' => $date,
                 'updated_at' => $date
                 ),
            array('station' => 402,
                 'numeral' => 'PA_502',
                 'name' => 'ARM_TEOTIHUACAN',
                 'serial_number' => '001',
                 'number_engines' => 1,
                 'country' => 'MX',
                 'unit_type_id' => 1,
                 'image' => 'image/image.jpg',
                 'created_at' => $date,
                 'updated_at' => $date
                 ),
            array('station' => 401,
                 'numeral' => 'PA_501',
                 'name' => 'ARM_TENOCHTITLAN',
                 'serial_number' => '001',
                 'number_engines' => 1,
                 'country' => 'MX',
                 'unit_type_id' => 1,
                 'image' => 'image/image.jpg',
                 'created_at' => $date,
                 'updated_at' => $date
                 ),
            array('station' => 303,
                 'numeral' => 'PO_153',
                 'name' => 'ARM_GUANAJUATO',
                 'serial_number' => '001',
                 'number_engines' => 1,
                 'country' => 'MX',
                 'unit_type_id' => 1,
                 'image' => 'image/image.jpg',
                 'created_at' => $date,
                 'updated_at' => $date
                 ),
            array('station' => 302,
                 'numeral' => 'PO_152',
                 'name' => 'ARM_SONORA',
                 'serial_number' => '001',
                 'number_engines' => 1,
                 'country' => 'MX',
                 'unit_type_id' => 1,
                 'image' => 'image/image.jpg',
                 'created_at' => $date,
                 'updated_at' => $date
                 ),
            array('station' => 301,
                 'numeral' => 'PO_151',
                 'name' => 'ARM_DURANGO',
                 'serial_number' => '001',
                 'number_engines' => 1,
                 'country' => 'MX',
                 'unit_type_id' => 1,
                 'image' => 'image/image.jpg',
                 'created_at' => $date,
                 'updated_at' => $date
                 ),
            array('station' => 503,
                 'numeral' => 'PI_1121',
                 'name' => 'ARM_ANKAA',
                 'serial_number' => '001',
                 'number_engines' => 1,
                 'country' => 'MX',
                 'unit_type_id' => 1,
                 'image' => 'image/image.jpg',
                 'created_at' => $date,
                 'updated_at' => $date
                 ),
            array('station' => 505,
                 'numeral' => 'PI_1130',
                 'name' => 'ARM_NUNKI',
                 'serial_number' => '001',
                 'number_engines' => 1,
                 'country' => 'MX',
                 'unit_type_id' => 1,
                 'image' => 'image/image.jpg',
                 'created_at' => $date,
                 'updated_at' => $date
                 ),
            array('station' => 516,
                 'numeral' => 'P_152_1',
                 'name' => 'PI_SONORA',
                 'serial_number' => '001',
                 'number_engines' => 1,
                 'country' => 'MX',
                 'unit_type_id' => 1,
                 'image' => 'image/image.jpg',
                 'created_at' => $date,
                 'updated_at' => $date
                 )
        );
        
        foreach ($units as $unit) {
        	$unit = \DB::table('units')->insert($unit); 
        }
    }
}
