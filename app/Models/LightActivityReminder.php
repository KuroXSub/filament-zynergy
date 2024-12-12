<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LightActivityReminder extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'activity_type',
        'activity_hour',
        'activity_minute',
        'activity_frequency',
        'toggle_value',
        'activity_time',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
