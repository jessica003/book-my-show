<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookMovieSeatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_movie_seats', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('seats')->default(1);
            $table->date('show_at', $precision = 0);
            $table->string('show_time')->nullable();
            $table->foreignId('movie_id')->constrained()
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('user_id')->constrained()
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('theater_id')->constrained()
                ->onUpdate('cascade')->onDelete('cascade');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('book_movie_seats');
    }
}
