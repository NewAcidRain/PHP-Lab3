<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Cities extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    public function dailyForecast(): HasMany
    {
        return $this->hasMany(DailyForecast::class, "city_id", "id");
    }
    public function hourlyForecast(): HasMany
    {
        return $this->hasMany(HourlyForecast::class, "city_id", "id");
    }
}
