<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class YearModelExteriorColor extends Model
{
    use HasFactory;

    protected $fillable = ['year_model_id', 'exterior_color_id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function yearModel(): BelongsTo
    {
        return $this->belongsTo(YearModel::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function exteriorColor(): BelongsTo
    {
        return $this->belongsTo(ExteriorColor::class);
    }
}
