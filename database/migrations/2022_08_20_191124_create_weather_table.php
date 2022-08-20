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
        Schema::create('weather', function (Blueprint $table) {
            $table->id();
            $table->string('query')->index();
            $table->string('observation_time');
            $table->integer('temperature');
            $table->string('description');
            $table->integer('wind_speed');
            $table->integer('wind_degree');
            $table->string('wind_dir');
            $table->integer('pressure');
            $table->integer('precip');
            $table->integer('humidity');
            $table->integer('cloudcover');
            $table->float('feels_like');
            $table->integer('uv_index');
            $table->integer('visibility');
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
        Schema::dropIfExists('weather');
    }
};
