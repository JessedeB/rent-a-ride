<?php

namespace App\Http\Controllers\Vehicles;

use App\Models\ExteriorColor;
use Illuminate\Database\Eloquent\Model;

class ExteriorColorController extends ColorController
{
    function getType():ColorType{
        return ColorType::Exterior;
    }

    function getModel():string{
        return ExteriorColor::class;
    }
}
