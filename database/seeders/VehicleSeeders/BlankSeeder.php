<?php

namespace Database\Seeders\VehicleSeeders;

/**
 * This is just to show how to use ManufacturerSeeder, do not use or extend this class
 */
class BlankSeeder extends \Illuminate\Database\Seeder
{
    use ManufacturerSeeder;

    //The name of the manufacturer. ie Chevrolet, Ford,BMW
    function make(): string
    {
        return '';
    }

    //A array of models that the manufacturer makes
    //ie, ['model' => 'Spark', 'year'=> 2022, 'class' => 'Compact'],
    //Available Classes are Compact, Standard, Sports Car, Full Size Pickup, Luxury
    //template: ['model' => '', 'year'=> 2022 , 'class' => ''],
    function models(): array
    {
        return [
            ['model' => '', 'year' => 2022, 'class' => ''],
        ];
    }

    //A list of Exterior Colors that the manufacturer offers
    //ie, ['name' => 'Silver Ice', 'hex_code' => 'DEE6E9'],
    //template: ['name' => '', 'hex_code' => ''],
    function exteriorColors(): array
    {
        return [
            ['name' => '', 'hex_code' => '']
        ];
    }

    //A list of Interior Colors that the manufacturer offers
    //ie, ['name' => 'Black', 'hex_code' => '000000'],
    //template: ['name' => '', 'hex_code' => ''],
    function interiorColors(): array
    {
        return [
            ['name' => '', 'hex_code' => '']
        ];
    }

    //An array that associates models with their available colors and drivetrains
    //ie,
    //  [
    //      'model' => 'Silverado 1500',
    //      'interiorColors' => ['Jet Black', 'Gideon'],
    //      'exteriorColors' => ['Red Hot', 'Satin Steel', 'Oxford Brown', 'Cherry Red'],
    //      'drivetrainOptions' => ['RWD', '4WD']
    //  ],
    //template:
    //  [
    //      'model' => '',
    //      'interiorColors' => [''],
    //      'exteriorColors' => [''],
    //      'drivetrainOptions' => ['']
    //  ],

    function modelOptions(): array
    {
        return [
            [
                'model' => '',
                'interiorColors' => [''],
                'exteriorColors' => [''],
                'drivetrainOptions' => ['']
            ],
        ];
    }
}
