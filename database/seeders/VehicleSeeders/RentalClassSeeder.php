<?php

namespace Database\Seeders\VehicleSeeders;

use App\Models\RentalClass;
use Illuminate\Database\Seeder;

class RentalClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $classes = [
            [
                'name' => 'Compact',
                'description' => 'Nissan Versa or similar',
                'daily_rate' => 20,
            ],
            [
                'name' => 'Standard',
                'description' => 'Volkswagon Jetta or similar',
                'daily_rate' => 30,
            ], [
                'name' => 'Sports Car',
                'description' => 'Dodge Challenger or similar',
                'daily_rate' => 40,
            ], [
                'name' => 'Full Size Pickup',
                'description' => 'Ford F150 or similar',
                'daily_rate' => 50,
            ], [
                'name' => 'Luxury',
                'description' => 'Maserati Ghibli, Mercedes AMG E53 or similar',
                'daily_rate' => 75,
            ],
        ];
        foreach ($classes as $class){
            $class['weekly_rate'] = (float) ($class['daily_rate'] * 5);
            $class['monthly_rate'] = ($class['weekly_rate'] * 3.5);
            RentalClass::create($class);
        }
    }
}
