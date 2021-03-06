<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('band_genre', function (Blueprint $table) {
            $table->id();
            $table->foreignId('band_id')->constrained();
            $table->foreignId('genre_id')->constrained();
            $table->timestamps();

            $table->unique(['band_id', 'genre_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('band_genre');
    }
};
