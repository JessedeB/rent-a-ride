<?php

namespace App\Http\Controllers\Vehicles;


class ExteriorColorController extends ColorController
{
    protected ColorType $type = ColorType::Exterior;
}
