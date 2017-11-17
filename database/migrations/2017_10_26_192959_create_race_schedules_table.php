<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRaceSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('race_schedules', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date');
            $table->time('gate_open_time');
            $table->time('practice_start_time');
            $table->time('rider_meeting_time');
            $table->time('race_start_time');
            $table->string('title', 50);
            $table->string('description')->nullable();
            $table->string('directions', 50)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('race_schedules');
    }
}
