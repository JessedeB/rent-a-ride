<?php

namespace Database\Seeders\VehicleSeeders;

use Database\Seeders\VehicleSeeders\ChevySeeder;
use Illuminate\Database\Seeder;

class VehicleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
           RentalClassSeeder::class,
           ChevySeeder::class
        ]);
    }
}
