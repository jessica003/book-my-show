<?php

namespace App\Models\Movie;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Movie extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'movie_category_id', 'poster_url'];

    public function movieCategory()
    {
        return $this->belongsTo(MovieCategory::class);
    }

    public function theaters()
    {
        return $this->belongsToMany(Theater::class)->withPivot('starts_at', 'ends_at');
    }
}
