<?php

namespace Database\Factories;

use App\Models\Vehicles\Vehicle;
use App\Models\Vehicles\YearModel;
use App\Models\Location;
use Illuminate\Database\Eloquent\Factories\Factory;


class VehicleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        $yearModel = (YearModel::with('exteriorColors','interiorColors','drivetrainOptions')->get())->random();
        $interiorColor = $yearModel->interiorColors->random();
        $exteriorColor = $yearModel->exteriorColors->random();
        $drivetrainOption = $yearModel->drivetrainOptions->random();
        $location = (Location::all())->random();

        //Generate a random vin and make sure it is not in the database since it is a unique key
        do{
            $vin = $this->faker->regexify('[A-Za-z0-9]{17}');
        }while(!is_null(Vehicle::query()->where('vin',$vin)->first()));

        return [
            'year_model_id' => $yearModel->id,
            'vin' => $vin,
            'mileage' => $this->faker->randomFloat(1,500,15000),
            'exterior_color_id' => $exteriorColor->id,
            'interior_color_id' => $interiorColor->id,
            'drivetrain_option_id' => $drivetrainOption->id,
            'location_id' => $location->id,
            //should be ~90% chance of being automatic
            'transmission' => rand(0,9) ? 'Automatic':'Manual',
            'out_of_service' => 0
        ];
    }
}
