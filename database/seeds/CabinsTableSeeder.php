<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class CabinsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ipArduinos = array("172.16.197.51:81",
                            "172.16.197.52:82",
                            "172.16.197.53:83",
                            "172.16.197.54:84",
                            "172.16.197.55:85",
                            "172.16.197.56:86",
                            "172.16.197.57:88",
                            "172.16.197.58:89");

        $ipCameras = array("172.16.196.101",
                            "172.16.196.102",
                            "172.16.196.103",
                            "172.16.196.104",
                            "172.16.196.105",
                            "172.16.196.106",
                            "172.16.196.107",
                            "172.16.196.108");
        for($i=1; $i < 9; $i++)
        {
            $date = Carbon::now();
            \DB::table('cabins')->insert(array(
                'id' => $i,
                'name' => 'CABINA'.$i,
                'ip_address_arduino' => $ipArduinos[$i-1],
                'mac_address_arduino' => 'FF:FC:E3:33:FF:5'.$i,
                'ip_address_camera' => $ipCameras[$i-1],
                'port_camera' => 16+$i,
                'created_at' => $date,
                'updated_at' => $date
            ));
        }

        \DB::table('cabins')->insert(array(
                'id' => 9,
                'name' => 'CC2',
                'ip_address_arduino' => '172.16.197.59:90',
                'mac_address_arduino' => 'FF:FC:E3:33:FF:50',
                'ip_address_camera' => '172.16.196.110',
                'port_camera' => 25,
                'created_at' => $date,
                'updated_at' => $date
            ));

        \DB::table('cabins')->insert(array(
                'id' => 10,
                'name' => 'ISR',
                'ip_address_arduino' => '172.16.197.50:80',
                'mac_address_arduino' => 'FF:FC:E3:33:FF:50',
                'ip_address_camera' => '172.16.196.109',
                'port_camera' => 16,
                'created_at' => $date,
                'updated_at' => $date
            ));
    }
}
