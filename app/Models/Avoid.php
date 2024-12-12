<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Avoid extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'disease_id'];

    public function disease()
    {
        return $this->belongsTo(Disease::class);
    }
}
