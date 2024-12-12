<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disease extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_disease');
    }

    public function articles()
    {
        return $this->hasMany(Article::class);
    }

    public function avoid()
    {
        return $this->hasMany(Avoid::class);
    }
}