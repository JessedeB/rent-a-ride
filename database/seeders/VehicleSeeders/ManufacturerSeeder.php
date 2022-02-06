<?php

namespace Database\Seeders\VehicleSeeders;

use App\Models\DrivetrainOption;
use App\Models\ExteriorColor;
use App\Models\InteriorColor;
use App\Models\Manufacturer;
use App\Models\RentalClass;
use App\Models\YearModel;
use App\Models\YearModelExteriorColor;
use App\Models\YearModelInteriorColor;

trait ManufacturerSeeder {

    private int $manufacturerID;
    /***
     * @var string $make
     */
    protected string $make;
    /**
     * @var String[][]
     */
    protected array $models;
    /**
     * @var String[][]
     */
    protected array $exteriorColors;
    /**
     * @var String[][]
     */
    protected array $interiorColors;
    /**
     * @var String[][][]
     */
    protected array $modelOptions;

    public final function run()
    {
        $this->manufacturerID = Manufacturer::create(['make' => $this->make])->id;
        $this->createYearModels();
        $this->createExteriorColors();
        $this->createInteriorColors();
        $this->createModelOptionAssociations();
    }

    private function createYearModels(): void
    {
        $rentalClasses = RentalClass::all();
        foreach ($this->models as $model) {
            YearModel::create([
                'manufacturer_id' => $this->manufacturerID,
                'rental_class_id' => $rentalClasses->firstWhere('name', $model['class'])->id,
                'year' => $model['year'],
                'model' => $model['model'],
            ]);
        }
    }

    private function createExteriorColors(): void
    {
        foreach ($this->exteriorColors as $color) {
            $color['manufacturer_id'] = $this->manufacturerID;
            ExteriorColor::create($color);
        }
    }

    private function createInteriorColors(): void
    {
        foreach ($this->interiorColors as $color) {
            $color['manufacturer_id'] = $this->manufacturerID;
            InteriorColor::create($color);
        }
    }

    private function createModelOptionAssociations(): void
    {

        $models = YearModel::query()->where('manufacturer_id', $this->manufacturerID)->get();
        $exteriorColors = ExteriorColor::query()->where('manufacturer_id', $this->manufacturerID)->get();
        $interiorColors = InteriorColor::query()->where('manufacturer_id', $this->manufacturerID)->get();
        foreach ($this->modelOptions as $model) {
            $modelID = $models->firstWhere('model', $model['model'])->id;
            foreach ($model['exteriorColors'] as $color) {
                YearModelExteriorColor::create([
                    'year_model_id' => $modelID,
                    'exterior_color_id' => $exteriorColors->firstWhere('name', $color)->id
                ]);
            }
            foreach ($model['interiorColors'] as $color) {
                YearModelInteriorColor::create([
                    'year_model_id' => $modelID,
                    'interior_color_id' => $interiorColors->firstWhere('name', $color)->id
                ]);
            }
            foreach ($model['drivetrainOptions'] as $drivetrain) {
                DrivetrainOption::create([
                    'year_model_id' => $modelID,
                    'drivetrain' => $drivetrain
                ]);
            }
        }
    }
}
