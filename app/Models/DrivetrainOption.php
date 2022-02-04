<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class DrivetrainOption extends Model
{
    use HasFactory;

    public function yearModel() : HasOne
    {
        return $this->hasOne(YearModel::class);
    }

    public function vehicles() : BelongsToMany
    {
        return $this->belongsToMany(Vehicle::class);
    }

}
