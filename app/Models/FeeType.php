<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class FeeType extends Model
{
    use HasFactory;

    public function rentalFees() : BelongsToMany
    {
        return $this->belongsToMany(RentalFee::class);
    }
}
