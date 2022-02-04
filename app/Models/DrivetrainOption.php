<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DrivetrainOption extends Model
{
    use HasFactory;

    public function yearModel()
    {
        return $this->hasOne(YearModel::class);
    }

    public function vehicles()
    {
        return $this->belongsToMany(Vehicle::class);
    }

}
