<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Manufacturer extends Model
{
    use HasFactory;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function yearModels(): HasMany
    {
        return $this->hasMany(YearModel::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function exteriorColors(): HasMany
    {
        return $this->hasMany(ExteriorColor::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function interiorColors(): HasMany
    {
        return $this->hasMany(InteriorColor::class);
    }
}
