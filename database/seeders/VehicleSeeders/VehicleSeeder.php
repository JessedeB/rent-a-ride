<?php

namespace Database\Seeders\VehicleSeeders;

use App\Models\Vehicles\Vehicle;
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
        Vehicle::factory()->count(50)->create();
    }
}
