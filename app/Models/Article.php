<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;

class Article extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'content', 'thumbnail', 'image_url', 'interest_id', 'is_general'];

    public function interest()
    {
        return $this->belongsTo(Interest::class);
    }

    public function favorite()
    {
        return $this->belongsTo(Favorite::class);
    }

    public function disease()
    {
        return $this->belongsTo(Disease::class);
    }
}
