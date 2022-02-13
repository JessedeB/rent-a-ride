<?php

namespace App\Models\Vehicles;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class DrivetrainOption extends Model
{
    use HasFactory;

    protected $fillable = ['year_model_id', 'drivetrain'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function yearModel(): BelongsTo
    {
        return $this->belongsTo(YearModel::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function vehicles(): HasMany
    {
        return $this->hasMany(Vehicle::class);
    }
}