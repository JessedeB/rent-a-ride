<?php

namespace Database\Seeders;

use Database\Seeders\RentalSeeders\RentalSeeder;
use Database\Seeders\VehicleSeeders\VehicleSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            LocationSeeder::class,
            VehicleSeeder::class,
            RentalSeeder::class
        ]);
    }
}
