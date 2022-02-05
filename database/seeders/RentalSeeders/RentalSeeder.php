<?php

namespace Database\Seeders\RentalSeeders;

use Illuminate\Database\Seeder;

class RentalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //TODO: Seed rentals here
        $this->call([
           FeeTypeSeeder::class,
           RentalFeeSeeder::class,
           PaymentSeeder::class
        ]);
    }
}
