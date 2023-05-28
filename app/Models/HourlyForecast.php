<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class HourlyForecast extends Model
{
    use HasFactory;

    protected $fillable = ['temperature', 'type', 'city_id', 'date'];

    public function cities(): BelongsTo
    {
        return $this->belongsTo(Cities::class, 'city_id', 'id');
    }
}
