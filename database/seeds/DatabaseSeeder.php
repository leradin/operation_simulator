<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CabinsTableSeeder::class);
        $this->call(ComputerTypesTableSeeder::class);
        $this->call(ComputersTableSeeder::class);
        $this->call(DeviceTypesTableSeeder::class);
        $this->call(DevicesTableSeeder::class);
        $this->call(UnitTypesTableSeeder::class);
        $this->call(MathematicalModelTableSeeder::class);
        $this->call(SensorsTableSeeder::class);
        $this->call(UnitsTableSeeder::class);
        $this->call(SensorUnitTableSeeder::class);
        //$this->call(TracksTableSeeder::class);
    }
}
