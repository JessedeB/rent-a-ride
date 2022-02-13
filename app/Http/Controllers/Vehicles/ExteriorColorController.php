<?php

namespace App\Http\Controllers\Vehicles;

use App\Models\ExteriorColor;
use Illuminate\Database\Eloquent\Model;

class ExteriorColorController extends ColorController
{
    protected ColorType $type = ColorType::Exterior;
}
