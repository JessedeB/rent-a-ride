<?php

namespace App\Models\Vehicles;

use App\Models\Location;
use App\Models\Rentals\Rental;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Vehicle extends Model
{
    use HasFactory;

    /**
     * @return
     */
    public function yearModel(): BelongsTo
    {
        return $this->belongsTo('YearModel');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function drivetrainOption(): BelongsTo
    {
        return $this->belongsTo(DrivetrainOption::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function exteriorColor(): BelongsTo
    {
        return $this->belongsTo(ExteriorColor::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function interiorColor(): BelongsTo
    {
        return $this->belongsTo(InteriorColor::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function location(): BelongsTo
    {
        return $this->belongsTo(Location::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function rentals(): HasMany
    {
        return $this->hasMany(Rental::class);
    }
}
