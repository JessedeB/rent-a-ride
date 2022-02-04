<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Location extends Model
{
    use HasFactory;

    public function rentalPickups(): BelongsToMany
    {
        return $this->belongsToMany(Rental::class,'rentals','pickup_location','id');
    }

    public function rentalReturns(): BelongsToMany
    {
        return $this->belongsToMany(Rental::class,'rentals','return_location','id');
    }

    public function vehicles(): BelongsToMany
    {
        return $this->belongsToMany(Vehicle::class);
    }
}
