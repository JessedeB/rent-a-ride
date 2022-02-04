<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\HasOne;

class InteriorColor extends Model
{
    use HasFactory;

    public function manufacturer(): HasOne
    {
        return $this->hasOne(Manufacturer::class);
    }

    public function yearModels(): HasManyThrough
    {
        return $this->hasManyThrough(YearModel::class,YearModelInteriorColor::class);
    }

    public function yearModeInteriorColors(): BelongsToMany
    {
        return $this->belongsToMany(YearModelInteriorColor::class);
    }

    public function vehicles(): BelongsToMany
    {
        return $this->belongsToMany(Vehicle::class);
    }
}
