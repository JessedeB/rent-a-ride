<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manufacturer extends Model
{
    use HasFactory;

    public function yearModels()
    {
        return $this->belongsToMany(YearModel::class);
    }

    public function exteriorColors()
    {
        return $this->belongsToMany(ExteriorColor::class);
    }

    public function interiorColors()
    {
        return $this->belongsToMany(InteriorColor::class);
    }


}
