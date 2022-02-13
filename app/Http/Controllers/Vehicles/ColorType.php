<?php

namespace App\Http\Controllers\Vehicles;

use App\Models\ExteriorColor;
use App\Models\InteriorColor;

enum ColorType : string {
    case Exterior = 'exterior';
    case Interior = 'interior';

    public function getModel():string{
        return match ($this){
            ColorType::Exterior => ExteriorColor::class,
            ColorType::Interior => InteriorColor::class
        };
    }
}
