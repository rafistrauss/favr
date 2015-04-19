<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserfavorrelTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('userfavorrel', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('favor_id');
            $table->unsignedInteger('doer_id')->nullable();
            $table->unsignedInteger('completed_by_user')->nullable();
            $table->timestamp('completion_time');
            $table->integer('in_progress')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('favor_id')->references('id')->on('favor');
            $table->foreign('doer_id')->references('id')->on('users');
            $table->foreign('completed_by_user')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('userfavorrel');
    }

}
