<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRaceResultPositionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('race_result_positions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('racer_id')->unsigned();
            $table->integer('race_results_id')->unsigned();
            $table->integer('race_class_id')->unsigned();
            $table->foreign('racer_id', 'fk_race_result_positions_racer_id_user_racer_id')
                ->references('racer_id')->on('users');
            $table->foreign('race_results_id', 'fk_race_result_positions_race_results_id_race_results_id')
                ->references('id')->on('race_results');
            $table->foreign('race_class_id', 'fk_race_result_positions_race_class_id_race_classes_class_id')
                ->references('class_id')->on('race_classes');
            $table->smallInteger('moto_1')->unsigned();
            $table->smallInteger('moto_2')->unsigned();
            $table->smallInteger('overall')->unsigned();
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
        Schema::dropIfExists('race_result_positions');
    }
}
