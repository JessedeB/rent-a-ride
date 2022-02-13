<?php

namespace App\Http\Controllers\Vehicles;

use App\Models\Vehicles\ExteriorColor;
use App\Models\Vehicles\InteriorColor;

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
