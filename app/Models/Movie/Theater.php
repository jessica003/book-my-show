<?php

namespace App\Models\Movie;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Theater extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'address', 'total_seats'];

    public function movies()
    {
        return $this->belongsToMany(Movie::class)->withPivot('starts_at', 'ends_at');
    }

    public static function getAvailableSeats($input)
    {
        $theaterId = $input['theater_id'];
        $showTime = $input['show_time'];
        $showAt = $input['show_at'];

        $totalSeats = self::find($theaterId)->total_seats;

        $bookedSeats = BookMovieSeat::where([
            'theater_id' => $theaterId,
            'show_time' => $showTime,
            'show_at' => $showAt
        ])->sum('seats');

        return $totalSeats - ($bookedSeats + (int) $input['seats']);
    }
}
