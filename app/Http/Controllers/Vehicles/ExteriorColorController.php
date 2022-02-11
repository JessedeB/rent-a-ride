<?php

namespace App\Http\Controllers\Vehicles;

use App\Models\ExteriorColor;

class ExteriorColorController extends ColorController
{
    public function __construct()
    {
        $this->type = ColorType::Exterior;
        $this->model = ExteriorColor::class;
    }
}
