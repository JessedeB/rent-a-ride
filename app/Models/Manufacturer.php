<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Manufacturer extends Model
{
    use HasFactory;

    public function yearModels(): BelongsToMany
    {
        return $this->belongsToMany(YearModel::class);
    }

    public function exteriorColors(): BelongsToMany
    {
        return $this->belongsToMany(ExteriorColor::class);
    }

    public function interiorColors(): BelongsToMany
    {
        return $this->belongsToMany(InteriorColor::class);
    }


}
