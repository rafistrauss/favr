<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });
        \App\Category::create(array('name' => 'laundry'));
        \App\Category::create(array('name' => 'printing'));
        \App\Category::create(array('name' => 'delivery'));
        \App\Category::create(array('name' => 'moving'));
        \App\Category::create(array('name' => 'other'));
        \App\Category::create(array('name' => 'all'));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('categories');
    }

}
