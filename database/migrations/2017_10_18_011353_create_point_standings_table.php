<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePointStandingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('point_standings', function (Blueprint $table) {
            $table->increments('id');
            $table->date('year');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id', 'fk_point_standings_user_id')
                ->references('id')
                ->on('users');
            $table->smallInteger('points')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('point_standings');
    }
}
