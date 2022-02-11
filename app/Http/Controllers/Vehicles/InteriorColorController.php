<?php

namespace App\Http\Controllers\Vehicles;

use App\Models\InteriorColor;
use Illuminate\Database\Eloquent\Model;


class InteriorColorController extends ColorController
{
        function getType():ColorType{
            return ColorType::Interior;
        }

        function getModel():string{
            return InteriorColor::class;
        }
}
