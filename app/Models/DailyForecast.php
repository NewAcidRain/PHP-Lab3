<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DailyForecast extends Model
{
    use HasFactory;
    protected $fillable = ['temperature','humidity','wind','precipitation','type','date','city_id'];
    public function cities(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Cities::class,'city_id','id');
    }

}
