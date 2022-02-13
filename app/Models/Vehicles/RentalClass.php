<?php

namespace App\Models\Vehicles;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\HasMany;

class RentalClass extends Model
{
    use HasFactory;
    protected $fillable=['name','description','daily_rate','weekly_rate','monthly_rate'];
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function yearModels(): HasMany
    {
        return $this->hasMany(YearModel::class);
    }
}
