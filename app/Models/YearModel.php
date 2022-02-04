<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\HasOne;

class YearModel extends Model
{
    use HasFactory;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function manufacturer(): HasOne
    {
        return $this->hasOne(Manufacturer::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function rentalClass(): HasOne
    {
        return $this->hasOne(RentalClass::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function drivetrainOptions(): BelongsToMany
    {
        return $this->belongsToMany(DrivetrainOption::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function exteriorColors(): HasManyThrough
    {
        return $this->hasManyThrough(ExteriorColor::class,YearModelExteriorColor::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function interiorColors(): HasManyThrough
    {
        return $this->hasManyThrough(InteriorColor::class,YearModelInteriorColor::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function yearModelExteriorColors(): BelongsToMany
    {
        return $this->belongsToMany(YearModelExteriorColor::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function yearModelInteriorColors(): BelongsToMany
    {
        return $this->belongsToMany(YearModelInteriorColor::class);
    }
}
