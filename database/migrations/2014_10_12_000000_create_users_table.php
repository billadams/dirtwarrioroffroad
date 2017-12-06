<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('racer_id')->unsigned()->unique();
            $table->string('username', 50)->nullable();
            $table->string('password')->nullable();
            $table->string('first_name', 50);
            $table->string('last_name', 50);
            $table->integer('phone')->nullable();
            $table->string('email', 50)->nullable();
            $table->tinyInteger('user_permissions')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
