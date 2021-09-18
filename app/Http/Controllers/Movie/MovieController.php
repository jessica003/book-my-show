<?php

namespace App\Http\Controllers\Movie;

use Exception;
use App\Models\Movie\Movie;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Movie\Theater;
use Illuminate\Support\Facades\DB;
use App\Models\Movie\BookMovieSeat;
use App\Http\Controllers\Controller;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movies = Movie::paginate(9);

        return view('movies.index', compact('movies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function show(Movie $movie)
    {
        $movieTheaters = $movie->theaters()->whereNotNull('starts_at')->paginate(3);
        return view('movies.show', compact('movie', 'movieTheaters'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function edit(Movie $movie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Movie $movie)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Movie $movie)
    {
        //
    }

    public function bookMovieNow(Request $request)
    {
        DB::beginTransaction();
        try {
            $input = $request->all();
            $input['user_id'] = auth()->user()->id;

            $data = $this->prepareRequestInput($input);

            $isSeatAvailable = $this->isSeatAvailable($data);
            if ($isSeatAvailable) {
                $movieBooked = BookMovieSeat::create($data);
                DB::commit();

                $response = $movieBooked ? 'Movie ticket is booked successfully!' : 'Something went wrong!';
                $status = $movieBooked ? 'success' : 'error';
            } else {
                $response = 'No booking allowed! Seat isn\'t available for ' . date('h:i A', strtotime($data['show_time']));
                $status = 'error';
            }
        } catch (Exception $e) {
            DB::rollBack();
            $response = $e->getMessage();
            $status = 'error';
        }

        return redirect()->back()->with($status, $response);
    }

    public function prepareRequestInput($input)
    {
        $inputKey = $input['key'];
        $newInput = [];
        foreach ($input as $key => $in) {
            $contains = Str::contains($key, $inputKey);
            if ($contains)
                $key = str_replace($inputKey, "", $key);

            $keyValue = [$key => $in];

            $newInput = array_merge($newInput, $keyValue);
        }
        return $newInput;
    }

    public function isSeatAvailable($input)
    {
        $noOfSeatAvailable = Theater::getAvailableSeats($input);
        return $noOfSeatAvailable > 0 ? true : false;
    }
}
