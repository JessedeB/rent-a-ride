<?php

namespace App\Http\Controllers\Vehicles;

use App\Models\InteriorColor;
use Illuminate\Database\Eloquent\Model;


class InteriorColorController extends ColorController
{
    protected ColorType $type = ColorType::Interior;
}
