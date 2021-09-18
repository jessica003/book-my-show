<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMovieTheaterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movie_theater', function (Blueprint $table) {
            $now = now();
            $movieBeginAt = $now->format('H:i:s');
            $movieEndAt = $now->addHours(2.5)->format('H:i:s');

            $table->foreignId('movie_id')->constrained()
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('theater_id')->constrained()
                ->onUpdate('cascade')->onDelete('cascade');
            $table->time('starts_at', $precision = 0)->default($movieBeginAt);
            $table->time('ends_at', $precision = 0)->default($movieEndAt);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('movie_theater');
    }
}
