<?php

namespace App\Http\Controllers\Vehicles;

use App\Models\InteriorColor;

class InteriorColorController extends ColorController
{
    public function __construct()
    {
        $this->type = ColorType::Exterior;
        $this->model = InteriorColor::class;
    }
}
