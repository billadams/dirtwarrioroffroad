<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeysToRaceResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('race_results', function(Blueprint $table)
        {
            $table->foreign('race_classes_id', 'fk_race_results_race_classes_id')
            ->references('id')->on('race_classes');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('race_results', function(Blueprint $table)
        {
            $table->dropForeign('race_classes_id');
        });
    }
}
