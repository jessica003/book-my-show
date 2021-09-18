<?php

namespace App\Models\Movie;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BookMovieSeat extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['seats', 'show_at', 'show_time', 'movie_id', 'user_id', 'theater_id'];
}
