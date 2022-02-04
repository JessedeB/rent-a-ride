<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Manufacturer extends Model
{
    use HasFactory;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function yearModels(): BelongsToMany
    {
        return $this->belongsToMany(YearModel::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function exteriorColors(): BelongsToMany
    {
        return $this->belongsToMany(ExteriorColor::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function interiorColors(): BelongsToMany
    {
        return $this->belongsToMany(InteriorColor::class);
    }


}
