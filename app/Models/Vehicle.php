<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;

class Vehicle extends Model
{
    use HasFactory;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function yearModel(): HasOne
    {
        return $this->hasOne('YearModel');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOneThrough
     */
    public function manufacturer(): HasOneThrough
    {
        return $this->hasOneThrough(Manufacturer::class,YearModel::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOneThrough
     */
    public function rentalClass(): HasOneThrough
    {
        return $this->hasOneThrough(RentalClass::class,YearModel::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function drivetrainOption(): HasOne
    {
        return $this->hasOne(DrivetrainOption::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function exteriorColor(): HasOne
    {
        return $this->hasOne(ExteriorColor::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function interiorColor(): HasOne
    {
        return $this->hasOne(InteriorColor::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function location(): HasOne
    {
        return $this->hasOne(Location::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function rentals(): BelongsToMany
    {
        return $this->belongsToMany(Rental::class);
    }


}
