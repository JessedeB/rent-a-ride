<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class RentalClass extends Model
{
    use HasFactory;
    protected $fillable=['name','description','daily_rate','weekly_rate','monthly_rate'];
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function yearModels(): BelongsToMany
    {
        return $this->belongsToMany(YearModel::class);
    }
}
