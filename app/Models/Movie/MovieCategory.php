<?php

namespace App\Models\Movie;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MovieCategory extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name'];

    public function movies()
    {
        return $this->hasMany(Movie::class);
    }
}
