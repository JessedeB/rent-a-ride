<?php

namespace Database\Seeders\VehicleSeeders;

class ChevySeeder extends \Illuminate\Database\Seeder
{
    use ManufacturerSeeder;

    protected string $make = 'Chevrolet';

    //List of Chevy Models. One for each class in the RentalClassSeeder
    protected array $models = [
        ['model' => 'Spark', 'year'=> 2022, 'class' => 'Compact'],
        ['model' => 'Malibu','year'=> 2022, 'class' => 'Standard'],
        ['model' => 'Camaro', 'year'=> 2022,'class' => 'Sports Car'],
        ['model' => 'Silverado 1500', 'year'=> 2022, 'class' => 'Full Size Pickup'],
        ['model' => 'Corvette Stingray', 'year'=> 2022, 'class' => 'Luxury']
    ];
    //List of Exterior Colors that Chevy offers in 2022
    // ['name' => '', 'hex_code' => ''],
    protected array $exteriorColors = [
        ['name' => 'Silver Ice', 'hex_code' => 'DEE6E9'],
        ['name' => 'Summit White', 'hex_code' => 'DEE7EA'],
        ['name' => 'Mosaic Black', 'hex_code' => '111110'],
        ['name' => 'Crimson', 'hex_code' => '5F1614'],
        ['name' => 'Cayenne Orange', 'hex_code' => 'C44F31'],
        ['name' => 'Red Hot', 'hex_code' => 'DB3020'],
        ['name' => 'Blue Glow', 'hex_code' => '143362'],
        ['name' => 'Nitro Yellow', 'hex_code' => 'EACE5F'],
        ['name' => 'Nightfall Gray', 'hex_code' => '303333'],
        ['name' => 'Mystic Blue', 'hex_code' => '83d4f0'],
        ['name' => 'Cherry Red', 'hex_code' => 'aa232c'],
        ['name' => 'Satin Steel', 'hex_code' => '6A7076'],
        ['name' => 'Black', 'hex_code' => '030303'],
        ['name' => 'Vivid Orange', 'hex_code' => 'C25D24'],
        ['name' => 'Shadow Gray', 'hex_code' => '566874'],
        ['name' => 'Riverside Blue', 'hex_code' => '1e2f66'],
        ['name' => 'Rapid Blue', 'hex_code' => '4396f5'],
        ['name' => 'Wild Cherry', 'hex_code' => '9D2720'],
        ['name' => 'Northsky Blue', 'hex_code' => '243047'],
        ['name' => 'Oxford Brown', 'hex_code' => '413C3B'],
        ['name' => 'Arctic White', 'hex_code' => 'edf2f4'],
        ['name' => 'Torch Red', 'hex_code' => 'B9271A'],
        ['name' => 'Ceramic Matrix Gray', 'hex_code' => 'CCD6DE'],
        ['name' => 'Elkhart Lake Blue', 'hex_code' => '3577D3'],
        ['name' => 'Hypersonic Gray', 'hex_code' => '8B8F8B'],
        ['name' => 'Silver Flare', 'hex_code' => 'B2B9C0'],
        ['name' => 'Caffeine', 'hex_code' => '562D18'],
    ];

    //A list of interior colors that chevy offers in 2022
    // ['name' => '', 'hex_code' => ''],
    protected array $interiorColors = [
            ['name' => 'Jet Black', 'hex_code' => '1B1B1B'],
            ['name' => 'Sky Cool Gray', 'hex_code' => 'B3B1B2'],
            ['name' => 'Gideon', 'hex_code' => '68655e'],
            ['name' => 'Medium Ash Gray', 'hex_code' => '858384'],
            ['name' => 'Adrenaline Red', 'hex_code' => '983935'],
            ['name' => 'Ceramic White', 'hex_code' => 'D2D1CF']
        ];

    //An array that associates the models with their available options
    protected array $modelOptions = [
            [
                'model' => 'Spark',
                'interiorColors' => ['Jet Black'],
                'exteriorColors' => ['Silver Ice', 'Summit White', 'Mosaic Black', 'Crimson', 'Cayenne Orange', 'Red Hot', 'Blue Glow', 'Nitro Yellow', 'Nightfall Gray', 'Mystic Blue'],
                'drivetrainOptions' => ['FWD']
            ], [
            'model' => 'Malibu',
            'interiorColors' => ['Jet Black'],
            'exteriorColors' => ['Silver Ice', 'Summit White', 'Mosaic Black', 'Cherry Red'],
            'drivetrainOptions' => ['FWD']
        ], [
            'model' => 'Camaro',
            'interiorColors' => ['Jet Black', 'Medium Ash Gray', 'Ceramic White', 'Adrenaline Red'],
            'exteriorColors' => ['Red Hot', 'Satin Steel', 'Summit White', 'Black', 'Shadow Gray', 'Riverside Blue'],
            'drivetrainOptions' => ['RWD']
        ], [
            'model' => 'Silverado 1500',
            'interiorColors' => ['Jet Black', 'Gideon'],
            'exteriorColors' => ['Red Hot', 'Satin Steel', 'Northsky Blue', 'Silver Ice', 'Summit White', 'Black', 'Shadow Gray', 'Oxford Brown', 'Cherry Red'],
            'drivetrainOptions' => ['RWD', '4WD']
        ], [
                'model' => 'Corvette Stingray',
                'interiorColors' => ['Jet Black', 'Sky Cool Gray', 'Adrenaline Red'],
                'exteriorColors' => ['Arctic White', 'Black', 'Torch Red', 'Ceramic Matrix Gray', 'Elkhart Lake Blue', 'Hypersonic Gray', 'Silver Flare', 'Caffeine'],
                'drivetrainOptions' => ['RWD']
            ],
        ];
}
